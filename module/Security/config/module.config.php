<?php

namespace Security;

use Security\Authentication\AuthenticationAdapterFactory;
use Security\Authentication\AuthenticationServiceFactory;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationServiceInterface;

return [
    'service_manager' => [
        'factories' => [
            AuthenticationServiceInterface::class => AuthenticationServiceFactory::class,
            AbstractAdapter::class => AuthenticationAdapterFactory::class
        ]
    ],
];
