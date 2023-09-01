<?php

declare(strict_types=1);

use PandaLeague\ErrorCatalog\ErrorCatalog;
use PandaLeague\ErrorCatalog\ErrorCatalogItem;
use PHPUnit\Framework\TestCase;

class ErrorCatalogTest extends TestCase
{
    public function testErrorCatalog(): void
    {
        $errorCatalog = new ErrorCatalog("namespace");

        $errorCatalog->addItem(new ErrorCatalogItem("name", "message", [200]))
            ->addItem(new ErrorCatalogItem("name2", "message2", [500]));

        $this->assertSame("name", $errorCatalog->getItem("name")->getName());
        $this->assertSame("name2", $errorCatalog->getItem("name2")->getName());

        $this->assertNull($errorCatalog->getItem("iDoNotExist"));
    }
}