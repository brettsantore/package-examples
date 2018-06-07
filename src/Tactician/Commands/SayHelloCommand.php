<?php namespace Santore\Tactician\Commands;

class SayHelloCommand
{
    /**
     * @var string
     */
    protected $name;

    /**
     * SayHelloCommand constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
