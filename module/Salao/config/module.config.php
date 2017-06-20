<?php

namespace Salao;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Salao\Controller\AcessoController;
use Salao\Controller\CadastroController;
use Salao\Controller\CadastroControllerFactory;
use Salao\Controller\ServicoController;
use Salao\Controller\ServicoControllerFactory;
use Salao\Form\SalaoForm;
use Salao\Form\SalaoFormFactory;
use Salao\Infra\Repository\AcessoRepositoryFactory;
use Salao\Infra\Repository\ProfissionalRepositoryFactory;
use Salao\Infra\Repository\SalaoRepositoryFactory;
use Salao\Infra\Repository\ServicoRepositoryFactory;
use Salao\Repository\AcessoRepositoryInterface;
use Salao\Repository\ProfissionalRepositoryInterface;
use Salao\Repository\SalaoRepositoryInterface;
use Salao\Repository\ServicoRepositoryInterface;
use Salao\Service\SalaoService;
use Salao\Service\SalaoServiceFactory;
use Salao\Service\ServicoService;
use Salao\Service\ServicoServiceFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            CadastroController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/salao[/:action][/:id]',
                    'defaults' => [
                        'controller' => CadastroController::class,
                        'action' => 'index',
                    ],
                ],
            ],

            ServicoController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/salao/servico[/:action][/:id]',
                    'defaults' => [
                        'controller' => ServicoController::class,
                        'action' => 'index',
                    ],
                ],
            ],

            AcessoController::ROUTE_NAME => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/salao/acesso[/:action][/:id]',
                    'defaults' => [
                        'controller' => AcessoController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            CadastroController::class => CadastroControllerFactory::class,
            ServicoController::class => ServicoControllerFactory::class,
            AcessoController::class => InvokableFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [
            [
                'label' => 'Salão',
                'route' => CadastroController::ROUTE_NAME,
                'ico'   => 'fa fa-cogs',
                'pages' => [
                    [
                        'label' => 'Dados do Salão',
                        'route' => CadastroController::ROUTE_NAME
                    ],
                    [
                        'label' => 'Serviços',
                        'route' => ServicoController::ROUTE_NAME,
                        'action' => 'index',
                        'useRouteMatch' => false,
                        'pages' => [
                            [
                                'label' => 'Criar serviço',
                                'route' => ServicoController::ROUTE_NAME,
                                'action' => 'criar',
                                'useRouteMatch' => true
                            ],
                            [
                                'label' => 'Editar serviço',
                                'route' => ServicoController::ROUTE_NAME,
                                'action' => 'editar',
                                'useRouteMatch' => true
                            ],
                            [
                                'label' => 'Excluir serviço',
                                'route' => ServicoController::ROUTE_NAME,
                                'action' => 'excluir',
                                'useRouteMatch' => true
                            ]
                        ]
                    ],
                    [
                        'label' => 'Acessos',
                        'route' => AcessoController::ROUTE_NAME
                    ]
                ]
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            SalaoForm::class => SalaoFormFactory::class,
            AcessoRepositoryInterface::class => AcessoRepositoryFactory::class,
            ProfissionalRepositoryInterface::class => ProfissionalRepositoryFactory::class,
            SalaoRepositoryInterface::class => SalaoRepositoryFactory::class,
            SalaoService::class => SalaoServiceFactory::class,

            ServicoRepositoryInterface::class => ServicoRepositoryFactory::class,
            ServicoService::class => ServicoServiceFactory::class,
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

    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                __DIR__ . '/../assets',
            ],
        ],
    ],
];
