<?php

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
     * @var array|ErrorCatalogItem[]
     */
    protected $catalog = [];

    /**
     * ErrorCatalog constructor.
     * @param string $namespace
     * @param string $language
     */
    public function __construct($namespace, $language = 'en-US')
    {
        $this->namespace = $namespace;
        $this->language = $language;
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

    /**
     * @param $name
     * @return ErrorCatalogItem
     */
    public function getItem($name)
    {
        foreach ($this->catalog as $error) {
            if ($name == $error->getName()) {
                return $error;
            }
        }
    }
}
