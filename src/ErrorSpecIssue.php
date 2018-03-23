<?php

namespace PandaLeague\ErrorCatalog;

class ErrorSpecIssue
{
    /**
     * @var string $id The ID for the issue.
     */
    protected $id;
    /**
     * @var string $issue Use String Formatter syntax to format the issue as a parameterized string. Localize the string.
     */
    protected $issue;

    public function __construct($id, $issue)
    {
        $this->id = $id;
        $this->issue = $issue;
    }
}