<?php namespace Santore\Tactician\Commands;

class InvalidLogicCommand
{
    protected $failed = true;

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return $this->failed;
    }

}