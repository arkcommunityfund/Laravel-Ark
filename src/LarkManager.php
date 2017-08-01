<?php

/*
 * This file is part of Laravel Ark.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Lark;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class LarkManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \BrianFaust\Lark\LarkFactory
     */
    private $factory;

    /**
     * Create a new Lark manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \BrianFaust\Lark\LarkFactory              $factory
     */
    public function __construct(Repository $config, LarkFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Get the factory instance.
     *
     * @return \BrianFaust\Lark\LarkFactory
     */
    public function getFactory(): LarkFactory
    {
        return $this->factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config): Lark
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'laravel-lark';
    }
}
