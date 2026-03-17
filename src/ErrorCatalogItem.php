<?php

declare(strict_types=1);

namespace PandaLeague\ErrorCatalog;

class ErrorCatalogItem
{
    protected ?string $logLevel = null;

    /** @var string[] */
    protected array $suggestedApplicationActions = [];

    /** @var string[] */
    protected array $suggestedUserActions = [];

    /** @var ErrorSpecIssue[] */
    protected array $issues = [];

    /**
     * @param int[] $httpStatusCodes
     */
    public function __construct(
        protected readonly string $name,
        protected readonly string $message,
        protected readonly array $httpStatusCodes,
    ) {
    }

    public function setLogLevel(string $logLevel): static
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    public function getLogLevel(): ?string
    {
        return $this->logLevel;
    }

    public function addSuggestedApplicationAction(string $action): static
    {
        $this->suggestedApplicationActions[] = $action;
        return $this;
    }

    public function getSuggestedApplicationActions(): array
    {
        return $this->suggestedApplicationActions;
    }

    public function addSuggestedUserAction(string $action): static
    {
        $this->suggestedUserActions[] = $action;
        return $this;
    }

    public function getSuggestedUserActions(): array
    {
        return $this->suggestedUserActions;
    }

    public function addIssue(ErrorSpecIssue $issue): static
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

    /** @return ErrorSpecIssue[] */
    public function getIssueById(string $id): array
    {
        return array_values(array_filter(
            $this->issues,
            static fn(ErrorSpecIssue $issue): bool => $issue->getId() === $id,
        ));
    }

    public function getFirstIssueById(string $id): ?ErrorSpecIssue
    {
        return $this->getIssueById($id)[0] ?? null;
    }

    /** @return ErrorSpecIssue[] */
    public function getIssueByReference(string $reference): array
    {
        return array_values(array_filter(
            $this->issues,
            static fn(ErrorSpecIssue $issue): bool => $issue->getReference() === $reference,
        ));
    }

    public function getFirstIssueByReference(string $reference): ?ErrorSpecIssue
    {
        return $this->getIssueByReference($reference)[0] ?? null;
    }
}
