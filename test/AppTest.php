<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestWith;
use Valerialevenets94\ProxmoxLowBatteryShutdown\App;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ValueObject\Mode;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\Notifier;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;

class AppTest extends TestCase
{
    private App $sut;

    private MockObject $proxmox;
    private MockObject $batteryStatus;

    private MockObject $notifier;

    private string $nodeName;
    private int $threshold;
    private string $mode;
    public function setUp(): void
    {
        $this->sut = new App(
            $this->proxmox = $this->createMock(Proxmox::class),
            $this->batteryStatus = $this->createMock(BatteryStatus::class),
            $this->notifier = $this->createMock(Notifier::class),
            $this->mode = Mode::CRON,
            $this->threshold = rand(45, 80),
            $this->nodeName = 'NodeName'.uniqid()
        );
    }

    public function testRunShouldCallShutdownIfBatteryDischargingAndLevelIsLowerThanThreshold(): void
    {
        $this->proxmox->expects($this->once())->method('shutdownNode')
            ->with($this->nodeName);
        $this->batteryStatus->expects($this->once())->method('getChargeLevel')
            ->willReturn($this->threshold - 5);
        $this->batteryStatus->expects($this->once())->method('isDischarging')
            ->willReturn(true);

        $this->sut->run();
    }
    #[TestWith([85, true], 'test with discharging battery with higher than threshold level')]
    #[TestWith([20, false], 'test with charging battery with lower than threshold level')]
    public function testShutdownShouldNotBeCalledIfBatteryIsChargingOrAboveThreshold(int $chargeLevel, bool $discharging): void
    {
        $this->proxmox->expects($this->never())->method('shutdownNode')
            ->with($this->nodeName);
        $this->batteryStatus->expects($this->once())->method('getChargeLevel')
            ->willReturn($chargeLevel);
        $this->batteryStatus->method('isDischarging')
            ->willReturn($discharging);
        $this->sut->run();
    }
    //TODO: test standalone mode
}