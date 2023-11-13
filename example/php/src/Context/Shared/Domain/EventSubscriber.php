<?php

namespace MyProject\Context\Shared\Domain;

interface EventSubscriber
{
    public static function subscribedTo(): array;
}
