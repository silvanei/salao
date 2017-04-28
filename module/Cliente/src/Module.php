<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 12:32
 */

namespace Cliente;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{


    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}