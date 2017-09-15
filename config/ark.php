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

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'ip'      => 'your-mainnet-ip',
            'port'    => 'your-mainnet-port',
            'nethash' => 'your-mainnet-nethash',
            'version' => 'your-mainnet-version',
            'path'    => '/usr/bin',
        ],

        'test' => [
            'ip'      => 'your-testnet-ip',
            'port'    => 'your-testnet-port',
            'nethash' => 'your-testnet-nethash',
            'version' => 'your-testnet-version',
            'path'    => '/usr/bin',
        ],

        'dev' => [
            'ip'      => 'your-devnet-ip',
            'port'    => 'your-devnet-port',
            'nethash' => 'your-devnet-nethash',
            'version' => 'your-devnet-version',
            'path'    => '/usr/bin',
        ],

    ],

];
