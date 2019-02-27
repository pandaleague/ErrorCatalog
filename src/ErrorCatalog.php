<?php

namespace PandaLeague\ErrorCatalog;

class ErrorCatalog
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $language;

    /**
     * @var array|ErrorCatalogItem[]
     */
    private $catalog = [];

    /**
     * ErrorCatalog constructor.
     * @param string $namespace
     * @param string $language
     */
    public function __construct($namespace, $language = 'en-US')
    {
    	// ? not used anywhere?
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
     * @return ErrorCatalogItem|null
     */
    public function getItem($name)
    {
        foreach ($this->catalog as $error) {
            if ($name == $error->getName()) {
                return $error;
            }
        }

        return null;
    }
}
