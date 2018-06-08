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


        /**
         * This file would never be committed to you VCS
         */
        $example_file = '.env';

        (new Dotenv(__DIR__, $example_file))->load();

        $this->assertEquals('my_super_secret_password', getenv('DB_PASSWORD'));
    }
}