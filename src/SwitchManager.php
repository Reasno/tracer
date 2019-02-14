<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://hyperf.org
 * @document https://wiki.hyperf.org
 * @contact  group@hyperf.org
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Tracer;

class SwitchManager
{
    /**
     * @var array
     */
    private $config
        = [
            'guzzle' => true,
            'redis' => true,
            'db' => true,
        ];

    /**
     * Apply the configuration to SwitchManager.
     */
    public function apply(array $config): void
    {
        $this->config = array_replace($this->config, $config);
    }

    /**
     * Determire if the tracer is enable ?
     */
    public function isEnable(string $identifier): bool
    {
        if (! isset($this->config[$identifier])) {
            return false;
        }
        return $this->config[$identifier];
    }
}
