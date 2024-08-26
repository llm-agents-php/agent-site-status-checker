<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker;

use Spiral\JsonSchemaGenerator\Attribute\Field;

final readonly class CheckSiteAvailabilityInput
{
    public function __construct(
        #[Field(title: 'URL', description: 'The full URL of the website to check')]
        public string $url,
    ) {}
}
