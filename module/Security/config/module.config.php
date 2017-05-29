<?php

namespace Security;

use Cliente\Controller\ClienteController;
use DoctrineORMModule\Yuml\YumlController;
use Salao\Controller\ServicoController;
use Security\Authentication\AuthenticationAdapterFactory;
use Security\Authentication\AuthenticationServiceFactory;
use Security\Authorization\AclBuilder;
use Security\Authorization\AclBuilderFactory;
use Security\Authorization\Role;
use Site\Controller\CadastroController;
use Site\Controller\LoginController;
use Site\Controller\LogoutController;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationServiceInterface;

return [
    'service_manager' => [
        'factories' => [
            AuthenticationServiceInterface::class => AuthenticationServiceFactory::class,
            AbstractAdapter::class => AuthenticationAdapterFactory::class,

            AclBuilder::class => AclBuilderFactory::class
        ]
    ],

    'acl' => [
        'roles' => [
            Role::GUEST => null,
            Role::SALAO_PROFISSIONAL => Role::GUEST,
            Role::SALAO_ADMIN => Role::SALAO_PROFISSIONAL
        ],
        // Recurso formado pelo <controller>::<action>
        'resources' => [
            sprintf(Role::RESOURCE_FORMAT, LoginController::class, 'index'),
            sprintf(Role::RESOURCE_FORMAT, CadastroController::class, 'index'),
            sprintf(Role::RESOURCE_FORMAT, LogoutController::class, 'index'),
            sprintf(Role::RESOURCE_FORMAT, \Salao\Controller\CadastroController::class, 'index'),
            sprintf(Role::RESOURCE_FORMAT, \Salao\Controller\CadastroController::class, 'delete-image'),
            sprintf(Role::RESOURCE_FORMAT, ClienteController::class, 'index'),
            sprintf(Role::RESOURCE_FORMAT, ServicoController::class, 'index'),

            // Gerador de grafico Doctrine
            sprintf(Role::RESOURCE_FORMAT, YumlController::class, 'index')
        ],
        'privilege' => [
            Role::GUEST => [
                'allow' => [
                    sprintf(Role::RESOURCE_FORMAT, LoginController::class, 'index'),
                    sprintf(Role::RESOURCE_FORMAT, CadastroController::class, 'index'),
                    sprintf(Role::RESOURCE_FORMAT, LogoutController::class, 'index'),

                    // Gerador de grafico Doctrine
                    sprintf(Role::RESOURCE_FORMAT, YumlController::class, 'index')
                ]
            ],
            Role::SALAO_ADMIN => [
                'allow' => [
                    sprintf(Role::RESOURCE_FORMAT, \Salao\Controller\CadastroController::class, 'index'),
                    sprintf(Role::RESOURCE_FORMAT, \Salao\Controller\CadastroController::class, 'delete-image'),
                    sprintf(Role::RESOURCE_FORMAT, ClienteController::class, 'index'),
                    sprintf(Role::RESOURCE_FORMAT, ServicoController::class, 'index'),
                ]
            ]
        ]
    ]
];
