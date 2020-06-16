<?php

declare(strict_types=1);

namespace Vrok\PdfService\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\PhpSerializer;
use Vrok\PdfService\Contracts\PdfResultMessage;

class PdfResultMessageTest extends TestCase
{
    public function testGetPdfContent()
    {
        $pdf = 'this is the test';
        $message = new PdfResultMessage($pdf);
        $this->assertEquals($pdf, $message->getPdfContent());
    }

    public function testCanBeSerialized()
    {
        $pdf = 'this is the test';
        $message = new PdfResultMessage($pdf);

        $serializer = new PhpSerializer();
        $res = $serializer->encode(new Envelope($message));
        $this->assertIsArray($res);
        $this->assertArrayHasKey('body', $res);
        $this->assertStringContainsString('Vrok\\\\PdfService\\\\Contracts\\\\PdfResultMessage', $res['body']);
    }
}
