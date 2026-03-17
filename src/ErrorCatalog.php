<?php

declare(strict_types=1);

namespace PandaLeague\ErrorCatalog;

class ErrorCatalog
{
    /** @var ErrorCatalogItem[] */
    protected array $catalog = [];

    public function __construct(
        protected readonly string $namespace,
        protected readonly string $language = 'en-US',
    ) {
    }

    public function addItem(ErrorCatalogItem $error): static
    {
        $this->catalog[] = $error;
        return $this;
    }

    public function getItem(string $name): ?ErrorCatalogItem
    {
        foreach ($this->catalog as $error) {
            if ($name === $error->getName()) {
                return $error;
            }
        }

        return null;
    }
}
