<?php

namespace PandaLeague\ErrorCatalog;

class ErrorCatalogItem
{
    private $name;
    private $message;
    private $httpStatusCodes;

    private $logLevel;
    private $suggestedApplicationActions = [];
    private $suggestedUserActions = [];

    /**
     * @var ErrorSpecIssue[]
     */
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

    public function getMessage()
    {
        return $this->message;
    }

    public function getHttpStatusCodes()
    {
        return $this->httpStatusCodes;
    }

    /**
     * @param $id
     * @return ErrorSpecIssue[]
     */
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

    /**
     * @param $reference
     * @return ErrorSpecIssue[]
     */
    public function getIssueByReference($reference)
    {
        $return = [];
        foreach ($this->issues as $issue) {
            if ($issue->getReference() == $reference) {
                $return[] = $issue;
            }
        }

        return $return;
    }
}
