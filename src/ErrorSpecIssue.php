<?php

declare(strict_types=1);

namespace PandaLeague\ErrorCatalog;

class ErrorSpecIssue
{
    /** @var array<string, string> */
    private array $parameters = [];

    public function __construct(
        protected readonly string $id,
        protected readonly string $reference,
        protected readonly string $issue,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setParameters(array $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function getIssue(): string
    {
        if (!empty($this->parameters)) {
            $parsed = [];

            foreach ($this->parameters as $key => $value) {
                $parsed['{' . $key . '}'] = $value;
            }

            return strtr($this->issue, $parsed);
        }

        return $this->issue;
    }
}
