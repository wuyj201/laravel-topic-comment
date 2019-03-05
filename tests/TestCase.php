<?php
namespace Tests;


use Illuminate\Contracts\Console\Kernel;
use Wuyj\LaravelComment\CommentServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Load package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [CommentServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__ . '/databases/migrations');
        $this->loadMigrationsFrom(dirname(__DIR__) . '/databases/migrations');
    }
}
