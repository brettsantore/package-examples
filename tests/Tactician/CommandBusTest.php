<?php namespace Test;

use PHPUnit\Framework\TestCase;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;
use Santore\Tactician\Exceptions\DomainException;
use Santore\Tactician\Commands\InvalidLogicCommand;
use Santore\Tactician\Handlers\InvalidLogicCommandHandler;
use Santore\Tactician\Commands\SayHelloCommand;
use Santore\Tactician\Handlers\SayHelloCommandHandler;

class CommandBusTest extends TestCase
{
    /**
     * @test
     */
    public function create_a_simple_hello_world_command()
    {
        $command_bus = $this->createBus([
            SayHelloCommand::class => new SayHelloCommandHandler(),
        ]);

        $actual = $command_bus->handle(new SayHelloCommand('World'));

        $this->assertEquals($actual, 'Hello, World!');
    }

    /**
     * @test
     *
     * @expectedException \Santore\Tactician\Exceptions\DomainException
     * @expectedExceptionMessage There has been a problem
     */
    public function commands_successfully_throw_exceptions()
    {
        $this->createBus([
            InvalidLogicCommand::class => new InvalidLogicCommandHandler(),
        ])->handle(new InvalidLogicCommand());
    }

    /**
     * @test
     */
    public function handle_thrown_exception()
    {
        try {
            $this->createBus([
                InvalidLogicCommand::class => new InvalidLogicCommandHandler(),
            ])->handle(new InvalidLogicCommand());
        } catch (DomainException $exception) {
            // continue with script execution
            $this->assertTrue(true);
        }
    }

    /**
     * @param array $command_class_to_handler_map
     *
     * @return CommandBus
     */
    protected function createBus(array $command_class_to_handler_map): CommandBus
    {
        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new InMemoryLocator($command_class_to_handler_map),
            new HandleInflector()
        );

        $command_bus = new CommandBus([
            new LockingMiddleware(),
            $handlerMiddleware,
        ]);

        return $command_bus;
    }
}
