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
         * PLEASE NOTE:
         * This test completely removes the added benefits of this package because it exposes the what we were trying
         * to hide. This test is solely to demonstrate how the package works
         */
        $example_file   = '.env_example';

        (new Dotenv(__DIR__, $example_file))->load();

        $this->assertEquals('World', getenv('HELLO'));
    }
}