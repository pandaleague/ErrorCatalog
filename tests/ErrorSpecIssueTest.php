<?php

declare(strict_types=1);

use PandaLeague\ErrorCatalog\ErrorSpecIssue;
use PHPUnit\Framework\TestCase;

class ErrorSpecIssueTest extends TestCase
{
    public function testNewIssue(): void
    {
        $id = "a";
        $reference = "b";
        $issueMessage = "{a} hello";
        $parameters = ['a' => 'b'];

        $issue = (new ErrorSpecIssue($id, $reference, $issueMessage))
            ->setParameters($parameters);

        $this->assertSame($id, $issue->getId());
        $this->assertSame($reference, $issue->getReference());
        $this->assertSame("b hello", $issue->getIssue());
    }

    public function testIssueWithoutMessageParameters(): void
    {
        $issue = (new ErrorSpecIssue("a", "b", "{c}"));

        $this->assertSame("{c}", $issue->getIssue());
    }
}