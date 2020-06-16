<?php

declare(strict_types=1);

namespace Vrok\PdfService\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\PhpSerializer;
use Vrok\PdfService\Contracts\GeneratePdfMessage;

class GeneratePdfMessageTest extends TestCase
{
    public function testGetLatex()
    {
        $tex = 'this is the test';
        $message = new GeneratePdfMessage($tex);
        $this->assertEquals($tex, $message->getLatex());
    }

    public function testCanBeSerialized()
    {
        $tex = 'this is the test';
        $message = new GeneratePdfMessage($tex);

        $serializer = new PhpSerializer();
        $res = $serializer->encode(new Envelope($message));
        $this->assertIsArray($res);
        $this->assertArrayHasKey('body', $res);
        $this->assertStringContainsString('Vrok\\\\PdfService\\\\Contracts\\\\GeneratePdfMessage', $res['body']);
    }
}
