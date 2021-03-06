<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Ark.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Lark;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

class LarkServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ark.php' => config_path('ark.php'),
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ark.php', 'ark');

        $this->registerFactory();

        $this->registerManager();

        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'lark',
            'lark.factory',
            'lark.connection',
        ];
    }

    /**
     * Register the factory class.
     */
    protected function registerFactory()
    {
        $this->app->singleton('lark.factory', function () {
            return new LarkFactory();
        });

        $this->app->alias('lark.factory', LarkFactory::class);
    }

    /**
     * Register the manager class.
     */
    protected function registerManager()
    {
        $this->app->singleton('lark', function (Container $app) {
            $config = $app['config'];
            $factory = $app['lark.factory'];

            return new LarkManager($config, $factory);
        });

        $this->app->alias('lark', LarkManager::class);
    }

    /**
     * Register the bindings.
     */
    protected function registerBindings()
    {
        $this->app->bind('lark.connection', function (Container $app) {
            $manager = $app['lark'];

            return $manager->connection();
        });

        $this->app->alias('lark.connection', Lark::class);
    }
}
