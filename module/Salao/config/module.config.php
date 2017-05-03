<?php

namespace Salao;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Salao\Controller\CadastroController;
use Salao\Controller\CadastroControllerFactory;
use Salao\Form\SalaoForm;
use Salao\Form\SalaoFormFactory;
use Salao\Infra\Repository\AcessoRepositoryFactory;
use Salao\Infra\Repository\ProfissionalRepositoryFactory;
use Salao\Infra\Repository\SalaoRepositoryFactory;
use Salao\Repository\AcessoRepositoryInterface;
use Salao\Repository\ProfissionalRepositoryInterface;
use Salao\Repository\SalaoRepositoryInterface;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            CadastroController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/salao[/:id]',
                    'defaults' => [
                        'controller' => CadastroController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            CadastroController::class => CadastroControllerFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [
            [
                'label' => 'Salão',
                'route' => CadastroController::ROUTE_NAME,
                'ico'   => 'fa fa-cogs margin-r-5',
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            SalaoForm::class => SalaoFormFactory::class,
            AcessoRepositoryInterface::class => AcessoRepositoryFactory::class,
            ProfissionalRepositoryInterface::class => ProfissionalRepositoryFactory::class,
            SalaoRepositoryInterface::class => SalaoRepositoryFactory::class,
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
    ]
];
