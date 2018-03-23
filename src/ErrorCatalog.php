<?php

namespace PandaLeague\ErrorCatalog;

class ErrorCatalog
{
    protected $namespace;
    protected $language;
    protected $catalog = [];

    /**
     * ErrorCatalog constructor.
     * @param $namespace
     * @param string $language
     */
    public function __construct($namespace, $language = 'en-US')
    {
        $this->namespace = $namespace;
    }

    /**
     * @param ErrorCatalogItem $error
     * @return $this
     */
    public function addItem(ErrorCatalogItem $error)
    {
        $this->catalog[] = $error;
        return $this;
    }
}