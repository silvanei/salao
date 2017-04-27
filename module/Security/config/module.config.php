<?php

namespace Security;

use Security\Authentication\AuthenticationServiceFactory;
use Zend\Authentication\AuthenticationServiceInterface;

return [
    'service_manager' => [
        'factories' => [
            AuthenticationServiceInterface::class => AuthenticationServiceFactory::class
        ]
    ],
];
