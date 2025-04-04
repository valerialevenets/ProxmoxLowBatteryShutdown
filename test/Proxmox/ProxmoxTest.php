<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Proxmox;
use Corsinvest\ProxmoxVE\Api;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxNodeStatusProvider;

class ProxmoxTest extends TestCase
{
    private Proxmox $sut;
    private MockObject $statusProvider;

    protected function setUp(): void
    {
        $this->statusProvider = $this
            ->createMock(ProxmoxNodeStatusProvider::class);
        $this->sut = new Proxmox($this->statusProvider);
    }

    #[TestWith(['pve123', 'shutdown'])]
    public function testSutShutdownNodeShouldExecuteCommandShutdown(string $nodeName, string $command)
    {
        $this->createMock(Api\PveClient::class);
        $status = $this->createMock(Api\PVENodeNodesStatus::class);
        $status->expects($this->once())->method('nodeCmd')
            ->with($command);

        $this->statusProvider->expects($this->once())->method('getNodeStatus')
            ->with($nodeName)->willReturn($status);

        $this->sut->shutdownNode($nodeName);
    }
}