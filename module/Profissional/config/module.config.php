<?php

namespace Profissional;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Profissional\Controller\ProfissionalController;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            ProfissionalController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/profissional[/:action][/:id]',
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

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => XmlDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/doctrine']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
];
