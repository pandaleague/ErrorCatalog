<?php

namespace PandaLeague\ErrorCatalog;

class ErrorSpecIssue
{
    /**
     * @var string $id The ID for the issue.
     */
    protected $id;

    /**
     * @var string The JSON pointer to identify the issue
     */
    protected $jsonPointer;

    /**
     * @var string $issue Use String Formatter syntax to format the issue as a parameterized string. Localize the string.
     */
    protected $issue;

    public function __construct($id, $jsonPointer, $issue)
    {
        $this->id = $id;
        $this->jsonPointer = $jsonPointer;
        $this->issue = $issue;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getJsonPointer()
    {
        return $this->jsonPointer;
    }

    public function getIssue()
    {
        return $this->issue;
    }
}
