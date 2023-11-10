<?php

namespace MyProject\Context\Shared\Infrastructure\Mailer;

interface Mailer
{
    public function send(string $to, string $subject, string $message): void;
}
