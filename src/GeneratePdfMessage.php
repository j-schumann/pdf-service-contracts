<?php

declare(strict_types=1);

namespace Vrok\PdfService\Contracts;

use Vrok\MessengerReply\TaskIdentifierMessageInterface;
use Vrok\MessengerReply\TaskIdentifierMessageTrait;

class GeneratePdfMessage implements TaskIdentifierMessageInterface
{
    use TaskIdentifierMessageTrait;

    private string $latex;

    public function __construct(string $latex)
    {
        $this->latex = $latex;
    }

    public function getLatex(): string
    {
        return $this->latex;
    }
}
