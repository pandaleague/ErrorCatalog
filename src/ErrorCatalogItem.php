<?php

declare(strict_types=1);

namespace PandaLeague\ErrorCatalog;

class ErrorCatalogItem
{
    /** @var string  */
    protected $name;

    /** @var string  */
    protected $message;

    /** @var array  */
    protected $httpStatusCodes;

    /** @var string */
    protected $logLevel;

    protected $suggestedApplicationActions = [];
    protected $suggestedUserActions = [];
    protected $issues = [];

    public function __construct(string $name, string $message, array $httpStatusCodes)
    {
        $this->name = $name;
        $this->message = $message;
        $this->httpStatusCodes = $httpStatusCodes;
    }

    public function setLogLevel(string $logLevel): ErrorCatalogItem
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    public function getLogLevel(): ?string
    {
        return $this->logLevel;
    }

    public function addSuggestedApplicationAction(string $action): ErrorCatalogItem
    {
        $this->suggestedApplicationActions[] = $action;
        return $this;
    }

    public function getSuggestedApplicationActions(): array
    {
        return $this->suggestedApplicationActions;
    }

    public function addSuggestedUserAction(string $action): ErrorCatalogItem
    {
        $this->suggestedUserActions[] = $action;
        return $this;
    }

    public function getSuggestedUserActions(): array
    {
        return $this->suggestedUserActions;
    }

    public function addIssue(ErrorSpecIssue $issue): ErrorCatalogItem
    {
        $this->issues[] = $issue;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getHttpStatusCodes(): array
    {
        return $this->httpStatusCodes;
    }

    /**
     * @param string $id
     * @return array|ErrorSpecIssue[]
     */
    public function getIssueById(string $id): array
    {
        $issues = [];
        foreach ($this->issues as $issue) {
            if ($issue->getId() === $id) {
                $issues[] = $issue;
            }
        }

        return $issues;
    }

    public function getFirstIssueById(string $id): ?ErrorSpecIssue
    {
        return $this->getIssueById($id)[0] ?? null;
    }

    /**
     * @param string $reference
     * @return array|ErrorSpecIssue[]
     */
    public function getIssueByReference(string $reference): array
    {
        $issues = [];
        foreach ($this->issues as $issue) {
            if ($issue->getReference() === $reference) {
                $issues[] = $issue;
            }
        }

        return $issues;
    }

    public function getFirstIssueByReference(string $reference): ?ErrorSpecIssue
    {
        return $this->getIssueByReference($reference)[0] ?? null;
    }
}
