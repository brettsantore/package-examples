<?php namespace Santore\Tactician;

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