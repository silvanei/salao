<?php

namespace Profissional;

use Profissional\Controller\ProfissionalController;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            ProfissionalController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/profissional[/:id]',
                    'defaults' => [
                        'controller' => ProfissionalController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            ProfissionalController::class => InvokableFactory::class,
        ],
    ],

    'navigation' => [
        'default' => [
            [
                'label' => 'Profissional',
                'route' => ProfissionalController::ROUTE_NAME,
                'ico'   => 'fa fa-user margin-r-5'
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
