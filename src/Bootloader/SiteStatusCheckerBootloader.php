<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker\Bootloader;

use LLM\Agents\Agent\AgentRegistryInterface;
use LLM\Agents\Agent\SiteStatusChecker\CheckSiteAvailabilityTool;
use LLM\Agents\Agent\SiteStatusChecker\GetDNSInfoTool;
use LLM\Agents\Agent\SiteStatusChecker\PerformPingTestTool;
use LLM\Agents\Agent\SiteStatusChecker\SiteStatusCheckerAgentFactory;
use LLM\Agents\Tool\ToolRegistryInterface;
use Spiral\Boot\Bootloader\Bootloader;

final class SiteStatusCheckerBootloader extends Bootloader
{
    public function boot(
        AgentRegistryInterface $agents,
        ToolRegistryInterface $tools,
        SiteStatusCheckerAgentFactory $siteStatusCheckerAgentFactory,
    ): void {
        $agents->register($siteStatusCheckerAgentFactory->create());

        $tools->register(
            new CheckSiteAvailabilityTool(),
            new GetDNSInfoTool(),
            new PerformPingTestTool()
        );
    }
}