<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Form\FormElementErrorsCustom;
use Zend\Navigation\Service\DefaultNavigationFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/admin-lte.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'formElementErrors' => FormElementErrorsCustom::class,
        ],
    ],

    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                __DIR__ . '/../assets',
            ],
        ],
    ],

    'navigation' => [
        'default' => [
            [
                'label' => 'Agenda',
                'route' => 'home',
                'ico'   => 'fa fa-calendar margin-r-5'
            ],
            [
                'label' => 'Salão',
                'route' => 'home',
                'ico'   => 'fa fa-cogs margin-r-5',
            ],
            [
                'label' => 'Profissional',
                'route' => 'home',
                'ico'   => 'fa fa-user margin-r-5',
            ],
            [
                'label' => 'Clientes',
                'route' => 'home',
                'ico'   => 'fa fa-users margin-r-5',
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'navigation' => DefaultNavigationFactory::class,
        ],
    ],
];
