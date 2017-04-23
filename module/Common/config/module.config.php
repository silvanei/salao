<?php

namespace Common;

use Common\View\Helper\FormElementErrorsCustom;
use Zend\Navigation\Service\DefaultNavigationFactory;

return [

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/admin-lte.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'formElementErrors' => FormElementErrorsCustom::class,
        ],
    ],

    'navigation' => [
        'default' => []
    ],

    'service_manager' => [
        'factories' => [
            'navigation' => DefaultNavigationFactory::class,
        ],
    ],
];