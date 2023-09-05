<?php

declare(strict_types=1);

use PandaLeague\ErrorCatalog\ErrorCatalogItem;
use PandaLeague\ErrorCatalog\ErrorSpecIssue;
use PHPUnit\Framework\TestCase;

class ErrorCatalogItemTest extends TestCase
{
    public function testBasicSettersAndGetters(): void
    {
        $name = "Hey";
        $message = "What's up";
        $httpStatusCodes = [200, 201];
        $logLevel = "error";

        $suggestedApplicationActions = [
            "die",
            "don't die"
        ];

        $suggestedUserActions = [
            "give up",
            "don't give up"
        ];

        $errorCatalog = (new ErrorCatalogItem($name, $message, $httpStatusCodes))
            ->setLogLevel($logLevel);

        foreach ($suggestedApplicationActions as $suggestedApplicationAction) {
            $errorCatalog->addSuggestedApplicationAction($suggestedApplicationAction);
        }

        foreach ($suggestedUserActions as $suggestedUserAction) {
            $errorCatalog->addSuggestedUserAction($suggestedUserAction);
        }

        $this->assertSame($name, $errorCatalog->getName());
        $this->assertSame($message, $errorCatalog->getMessage());
        $this->assertSame($httpStatusCodes, $errorCatalog->getHttpStatusCodes());
        $this->assertSame($logLevel, $errorCatalog->getLogLevel());
        $this->assertSame($suggestedApplicationActions, $errorCatalog->getSuggestedApplicationActions());
        $this->assertSame($suggestedUserActions, $errorCatalog->getSuggestedUserActions());
    }

    public function testErrorSpecIssues()
    {
        $errorSpecIssues = [
            new ErrorSpecIssue("one", "oneone", "Houston, we have a problem"),
            new ErrorSpecIssue("two", "twotwo", "It's a small step for a man")
        ];

        $errorCatalog = new ErrorCatalogItem("name", "message", [200]);

        foreach ($errorSpecIssues as $errorSpecIssue)
        {
            $errorCatalog->addIssue($errorSpecIssue);
        }

        $this->assertSame("one", $errorCatalog->getIssueById("one")[0]->getId());
        $this->assertSame("two", $errorCatalog->getIssueById("two")[0]->getId());

        $this->assertSame("one", $errorCatalog->getFirstIssueById("one")->getId());
        $this->assertSame("two", $errorCatalog->getFirstIssueById("two")->getId());

        $this->assertSame("oneone", $errorCatalog->getIssueByReference("oneone")[0]->getReference());
        $this->assertSame("twotwo", $errorCatalog->getIssueByReference("twotwo")[0]->getReference());

        $this->assertSame("oneone", $errorCatalog->getFirstIssueByReference("oneone")->getReference());
        $this->assertSame("twotwo", $errorCatalog->getFirstIssueByReference("twotwo")->getReference());

        $this->assertNull($errorCatalog->getFirstIssueById("nope"));
        $this->assertNull($errorCatalog->getFirstIssueByReference("nopeAgain"));

        $this->assertCount(0, $errorCatalog->getIssueById("nothing"));
        $this->assertCount(0, $errorCatalog->getIssueByReference("nothingAsWell"));


    }
}