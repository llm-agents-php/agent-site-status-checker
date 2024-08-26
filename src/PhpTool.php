<?php

declare(strict_types=1);

namespace LLM\Agents\Agent\SiteStatusChecker;

use LLM\Agents\Tool\Tool;
use LLM\Agents\Tool\ToolLanguage;

abstract class PhpTool extends Tool
{
    public function getLanguage(): ToolLanguage
    {
        return ToolLanguage::PHP;
    }
}