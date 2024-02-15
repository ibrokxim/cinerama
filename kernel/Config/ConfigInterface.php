<?php

namespace App\Kernel\Config;

interface ConfigInterface
{
    // $config->get('database.driver');
    public function get(string $key, $default = null): mixed;

}