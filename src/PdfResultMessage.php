<?php
declare(strict_types=1);

namespace Vrok\PdfService\Contracts;

use Vrok\MessengerReply\TaskIdentifierMessageInterface;
use Vrok\MessengerReply\TaskIdentifierMessageTrait;

class PdfResultMessage implements TaskIdentifierMessageInterface
{
    use TaskIdentifierMessageTrait;

    private string $pdfContent;

    public function __construct(string $pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    /**
     * @return string
     */
    public function getPdfContent(): string
    {
        return $this->pdfContent;
    }
}
