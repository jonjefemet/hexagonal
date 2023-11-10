<?php

namespace MyProject\Context\Shared\Infrastructure\Mailer;

class GmailMailer implements Mailer
{
    public function send(string $to, string $subject, string $message): void
    {
        echo "Sending Gmail to $to with subject $subject and message $message";
    }
}
