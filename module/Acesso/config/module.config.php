<?php

namespace Acesso;

use Acesso\Controller\CadastroControllerFactory;
use Acesso\Form\CadastroForm;
use Acesso\Form\CadastroFormFactory;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'acesso-login' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'acesso-cadastro' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/cadastro',
                    'defaults' => [
                        'controller' => Controller\CadastroController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => InvokableFactory::class,
            Controller\CadastroController::class => CadastroControllerFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            CadastroForm::class => CadastroFormFactory::class
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'acesso/layout' => __DIR__ . '/../view/layout/admin-lte.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'module_layouts' => [
        'Acesso' => 'acesso/layout',
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