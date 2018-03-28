<?php

namespace PandaLeague\ErrorCatalog;

class ErrorCatalogItem
{
    protected $name;
    protected $message;
    protected $httpStatusCodes;
    protected $logLevel;
    protected $suggestedApplicationActions = [];
    protected $suggestedUserActions = [];
    protected $issues = [];

    public function __construct($name, $message, array $httpStatusCodes)
    {
        $this->name = $name;
        $this->message = $message;
        $this->httpStatusCodes = $httpStatusCodes;
    }

    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    public function addSuggestedApplicationAction($action)
    {
        $this->suggestedApplicationActions[] = $action;
        return $this;
    }

    public function addSuggestedUserAction($action)
    {
        $this->suggestedUserActions[] = $action;
        return $this;
    }

    public function addIssue(ErrorSpecIssue $issue)
    {
        $this->issues[] = $issue;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIssueById($id)
    {
        $return = [];
        foreach ($this->issues as $issue) {
            if ($issue->getId() == $id) {
                $return[] = $issue;
            }
        }

        return $return;
    }

    public function getIssueByJsonPointer($jsonPointer)
    {
        $return = [];
        foreach ($this->issues as $issue) {
            if ($issue->getJsonPointer() == $jsonPointer) {
                $return[] = $issue;
            }
        }

        return $return;
    }
}
