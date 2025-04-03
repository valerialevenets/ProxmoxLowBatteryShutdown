<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\App;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;

class AppTest extends TestCase
{
    private App $sut;

    private MockObject $proxmox;
    private MockObject $batteryStatus;

    private string $nodeName;
    private int $threshold;
    public function setUp(): void
    {
        $this->sut = new App(
            $this->proxmox = $this->createMock(Proxmox::class),
            $this->batteryStatus = $this->createMock(BatteryStatus::class),
            $this->threshold = rand(45, 80),
            $this->nodeName = 'NodeName'.uniqid()
        );
    }

    public function testRunShouldCallShutdownIfBatteryLevelIsLowerThanThreshold(): void
    {
        $this->proxmox->expects($this->once())->method('shutdownNode')
            ->with($this->nodeName);
        $this->batteryStatus->expects($this->once())->method('getChargeLevel')
            ->willReturn($this->threshold - 5);

        $this->sut->run();
    }

    //TODO figure out what to do in that case, because "run" sleeps, therefore test never ends
//    public function testRunShouldNotCallShutdownIfBatteryLevelIsLowerThanThreshold(): void
//    {
//        $this->proxmox->expects($this->once())->method('shutdownNode')
//            ->with($this->nodeName);
//        $this->batteryStatus->expects($this->once())->method('getChargeLevel')
//            ->willReturn($this->threshold + 5);
//        $this->sut->run();
//    }
}