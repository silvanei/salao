<?php

namespace Cliente;

use Cliente\Controller\ClienteController;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            ClienteController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/cliente[/:id]',
                    'defaults' => [
                        'controller' => ClienteController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            ClienteController::class => InvokableFactory::class,
        ],
    ],

    'navigation' => [
        'default' => [
            [
                'label' => 'Cliente',
                'route' => ClienteController::ROUTE_NAME,
                'ico'   => 'fa fa-users margin-r-5'
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
