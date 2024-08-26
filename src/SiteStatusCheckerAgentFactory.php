<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker;

use LLM\Agents\Agent\AgentFactoryInterface;
use LLM\Agents\Agent\AgentInterface;
use Spiral\Boot\EnvironmentInterface;

final readonly class SiteStatusCheckerAgentFactory implements AgentFactoryInterface
{
    public function __construct(
        private EnvironmentInterface $env,
    ) {}

    public function create(): AgentInterface
    {
        return SiteStatusCheckerAgent::create(
            model: $this->env->get('SITE_STATUS_CHECKER_MODEL', SiteStatusCheckerAgent::DEFAULT_MODEL),
        );
    }
}
