<?php namespace Test;

use PHPUnit\Framework\TestCase;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;
use Santore\Tactician\SayHelloCommand;
use Santore\Tactician\SayHelloCommandHandler;

class CommandBusTest extends TestCase
{
    /**
     * @test
     */
    public function create_a_simple_hello_world_command()
    {
        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new InMemoryLocator([
                SayHelloCommand::class => new SayHelloCommandHandler(),
            ]),
            new HandleInflector()
        );

        $command_bus = new CommandBus([
            new LockingMiddleware(),
            $handlerMiddleware,
        ]);

        $actual = $command_bus->handle(new SayHelloCommand('World'));

        $this->assertEquals($actual, 'Hello, World!');
    }
}
