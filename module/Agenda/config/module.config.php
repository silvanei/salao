<?php

namespace Agenda;

use Agenda\Controller\AgendaController;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            AgendaController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/agenda[/:id]',
                    'defaults' => [
                        'controller' => AgendaController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            AgendaController::class => InvokableFactory::class,
        ],
    ],

    'navigation' => [
        'default' => [
            [
                'label' => 'Agenda',
                'route' => AgendaController::ROUTE_NAME,
                'ico'   => 'fa fa-calendar margin-r-5'
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
