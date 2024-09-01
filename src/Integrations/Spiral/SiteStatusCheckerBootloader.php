<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker\Integrations\Spiral;

use LLM\Agents\Agent\AgentRegistryInterface;
use LLM\Agents\Agent\SiteStatusChecker\CheckSiteAvailabilityTool;
use LLM\Agents\Agent\SiteStatusChecker\GetDNSInfoTool;
use LLM\Agents\Agent\SiteStatusChecker\PerformPingTestTool;
use LLM\Agents\Agent\SiteStatusChecker\SiteStatusCheckerAgent;
use LLM\Agents\Agent\SiteStatusChecker\SiteStatusCheckerAgentFactory;
use LLM\Agents\Tool\ToolRegistryInterface;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Boot\EnvironmentInterface;

final class SiteStatusCheckerBootloader extends Bootloader
{
    public function boot(
        AgentRegistryInterface $agents,
        ToolRegistryInterface $tools,
        SiteStatusCheckerAgentFactory $siteStatusCheckerAgentFactory,
        EnvironmentInterface $env,
    ): void {
        $agents->register(
            $siteStatusCheckerAgentFactory->create(
                $env->get('SITE_STATUS_CHECKER_MODEL', SiteStatusCheckerAgent::DEFAULT_MODEL),
            ),
        );

        $tools->register(
            new CheckSiteAvailabilityTool(),
            new GetDNSInfoTool(),
            new PerformPingTestTool(),
        );
    }
}