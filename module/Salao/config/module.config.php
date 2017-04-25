<?php

namespace Salao;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Salao\Infra\Repository\AcessoRepositoryFactory;
use Salao\Infra\Repository\ProfissionalRepositoryFactory;
use Salao\Infra\Repository\SalaoRepositoryFactory;
use Salao\Repository\AcessoRepositoryInterface;
use Salao\Repository\ProfissionalRepositoryInterface;
use Salao\Repository\SalaoRepositoryInterface;

return [
    'service_manager' => [
        'factories' => [
            AcessoRepositoryInterface::class => AcessoRepositoryFactory::class,
            ProfissionalRepositoryInterface::class => ProfissionalRepositoryFactory::class,
            SalaoRepositoryInterface::class => SalaoRepositoryFactory::class,
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
