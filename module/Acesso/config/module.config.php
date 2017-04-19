<?php

namespace Acesso;

use Acesso\Controller\CadastroControllerFactory;
use Acesso\Form\CadastroForm;
use Acesso\Form\CadastroFormFactory;
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

];