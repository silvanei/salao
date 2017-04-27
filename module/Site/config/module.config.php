<?php

namespace Site;

use Site\Controller\CadastroController;
use Site\Controller\CadastroControllerFactory;
use Site\Controller\LoginController;
use Site\Controller\LoginControllerFactory;
use Site\Form\CadastroForm;
use Site\Form\CadastroFormFactory;
use Site\Service\CadastroService;
use Site\Service\CadastroServiceFactory;
use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'site-login' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => LoginController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'site-cadastro' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/cadastro',
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
            LoginController::class => LoginControllerFactory::class,
            CadastroController::class => CadastroControllerFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            // Cadastro
            CadastroForm::class => CadastroFormFactory::class,
            CadastroService::class => CadastroServiceFactory::class,
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'site/layout' => __DIR__ . '/../view/layout/admin-lte.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'module_layouts' => [
        'Site' => 'site/layout',
    ]
];
