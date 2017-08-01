<?php

namespace Profissional;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Profissional\Controller\ProfissionalController;
use Profissional\Controller\ProfissionalControllerFactory;
use Profissional\Controller\ProfissionalServicoController;
use Profissional\Controller\ProfissionalServicoControllerFactory;
use Profissional\Infra\Repository\AcessoRepositoryFactory;
use Profissional\Infra\Repository\ProfissionalRepositoryFactory;
use Profissional\Repository\AcessoRepositoryInterface;
use Profissional\Repository\ProfissionalRepositoryInterface;
use Profissional\Service\ProfissionalService;
use Profissional\Service\ProfissionalServiceFactory;
use Zend\Router\Http\Segment;

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
            ProfissionalServicoController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/profissional-servico[/:profissional][/:action][/:id]',
                    'defaults' => [
                        'controller' => ProfissionalServicoController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            AcessoRepositoryInterface::class => AcessoRepositoryFactory::class,
            ProfissionalRepositoryInterface::class => ProfissionalRepositoryFactory::class,
            ProfissionalService::class => ProfissionalServiceFactory::class,
        ]
    ],

    'controllers' => [
        'factories' => [
            ProfissionalController::class => ProfissionalControllerFactory::class,
            ProfissionalServicoController::class => ProfissionalServicoControllerFactory::class,
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
