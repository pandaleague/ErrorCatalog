<?php

declare(strict_types=1);

namespace PandaLeague\ErrorCatalog;

class ErrorSpecIssue
{
    /**
     * @var string $id The ID for the issue.
     */
    protected $id;

    /**
     * @var string A reference to identify the issue by. Can be used to retrieve the issue but normally not shown in the catalog
     */
    protected $reference;

    /**
     * @var string $issue Use String Formatter syntax to format the issue as a parameterized string. Localize the string.
     */
    protected $issue;

    /** @var array an array of parameters to be replaced in the issue message */
    protected $parameters = [];

    public function __construct(string $id, string $reference, string $issue)
    {
        $this->id = $id;
        $this->reference = $reference;
        $this->issue = $issue;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setParameters(array $parameters): ErrorSpecIssue
    {
        $this->parameters = $parameters;
        
        return $this;
    }

    private function getParameters(): array
    {
        return $this->parameters;
    }

    public function getIssue(): string
    {
        // If parameters have been provided, then ensure that each of the keys are wrapped
        // with curly braces, and prepare it before passing it through strtr()
        if (!empty($this->getParameters())) {
            $parsed = [];

            foreach ($this->getParameters() as $key => $value) {
                $parsed['{' . $key . '}'] = $value;
            }

            return strtr($this->issue, $parsed);
        }

        return $this->issue;
    }
}
