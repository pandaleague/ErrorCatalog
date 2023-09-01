<?php

declare(strict_types=1);

namespace PandaLeague\ErrorCatalog;

class ErrorCatalog
{
    /**
     * @var string
     */
    protected $namespace;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var ErrorCatalogItem[]
     */
    protected $catalog = [];

    public function __construct(string $namespace, string $language = 'en-US')
    {
        $this->namespace = $namespace;
        $this->language = $language;
    }

    public function addItem(ErrorCatalogItem $error): ErrorCatalog
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
