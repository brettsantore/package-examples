<?php namespace Santore\Tactician;

use Santore\Tactician\Exceptions\DomainException;

class InvalidLogicCommandHandler
{
    public function handle(InvalidLogicCommand $command)
    {
        if ($command->isFailed()) {
            throw new DomainException('There has been a problem');
        }

        throw new \DomainException('Never get here');
        // Should not reach
    }
}