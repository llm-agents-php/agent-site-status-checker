<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker;

use Spiral\JsonSchemaGenerator\Attribute\Field;

final readonly class PerformPingTestInput
{
    public function __construct(
        #[Field(title: 'Host', description: 'The hostname or IP address to ping')]
        public string $host,
        #[Field(title: 'Steps', description: 'The number of times to ping the host')]
        public int $steps = 3
    ) {}
}
