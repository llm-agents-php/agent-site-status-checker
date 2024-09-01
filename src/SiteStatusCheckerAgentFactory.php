<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker;

use LLM\Agents\Agent\AgentFactoryInterface;
use LLM\Agents\Agent\AgentInterface;

final readonly class SiteStatusCheckerAgentFactory implements AgentFactoryInterface
{
    public function create(string $model = SiteStatusCheckerAgent::DEFAULT_MODEL): AgentInterface
    {
        return SiteStatusCheckerAgent::create(
            model: $model,
        );
    }
}
