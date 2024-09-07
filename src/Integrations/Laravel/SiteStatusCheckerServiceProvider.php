<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker\Integrations\Laravel;

use Illuminate\Support\ServiceProvider;
use LLM\Agents\Agent\AgentRegistryInterface;
use LLM\Agents\Agent\SiteStatusChecker\CheckSiteAvailabilityTool;
use LLM\Agents\Agent\SiteStatusChecker\GetDNSInfoTool;
use LLM\Agents\Agent\SiteStatusChecker\PerformPingTestTool;
use LLM\Agents\Agent\SiteStatusChecker\SiteStatusCheckerAgentFactory;
use LLM\Agents\Tool\ToolRegistryInterface;

final class SiteStatusCheckerServiceProvider extends ServiceProvider
{
    public function boot(
        AgentRegistryInterface $agents,
        ToolRegistryInterface $tools,
        SiteStatusCheckerAgentFactory $siteStatusCheckerAgentFactory,
    ): void {
        $agents->register(
            $siteStatusCheckerAgentFactory->create(),
        );

        $tools->register(
            new CheckSiteAvailabilityTool(),
            new GetDNSInfoTool(),
            new PerformPingTestTool(),
        );
    }
}