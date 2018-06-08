<?php namespace Test\PHPDotEnv;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class EnvVariablesTest extends TestCase
{

    /**
     * @test
     */
    public function initialization_enables_access_to_environment_variables()
    {
        /**
         * This file is would typically be .env, and would never be committed to you VCS
         */
        $example_file   = '.env_example';

        (new Dotenv(__DIR__, $example_file))->load();

        $this->assertEquals('World', getenv('HELLO'));
    }
}