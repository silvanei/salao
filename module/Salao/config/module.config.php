<?php

namespace Salao;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Salao\Infra\Repository\AcessoRepositoryFactory;
use Salao\Infra\Repository\ProfissionalRepositoryFactory;
use Salao\Infra\Repository\SalaoRepositoryFactory;
use Salao\Repository\AcessoRepository;
use Salao\Repository\ProfissionalRepository;
use Salao\Repository\SalaoRepository;

return [
    'service_manager' => [
        'factories' => [
            AcessoRepository::class => AcessoRepositoryFactory::class,
            ProfissionalRepository::class => ProfissionalRepositoryFactory::class,
            SalaoRepository::class => SalaoRepositoryFactory::class,
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
