<?php namespace Santore\Tactician;

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
