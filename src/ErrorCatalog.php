<?php

namespace PandaLeague\ErrorCatalog;

class ErrorCatalog
{
    protected $namespace;
    protected $defaultLanguage;
    protected $catalog = [];

    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    public function addItem($language, ErrorCatalogItem $error)
    {
        if (!isset($this->catalog[$language])) {
            $this->catalog[$language] = [];
        }

        $this->catalog[$language][] = $error;
        return $this;
    }
}