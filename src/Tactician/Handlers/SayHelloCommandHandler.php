<?php namespace Santore\Tactician\Handlers;

use Santore\Tactician\Commands\SayHelloCommand;

class SayHelloCommandHandler
{
    public function handle(SayHelloCommand $command)
    {
        return sprintf(
            'Hello, %s!',
            $command->getName()
        );
    }
}
