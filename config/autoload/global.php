<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'doctrine' => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'host' => 'mysql',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => 'root',
                    'dbname' => 'agenda',
                    'charset'  => 'utf8',
                    'driverOptions' => array(
                        1002 => 'SET NAMES utf8'
                    )
                ],
            ],
        ],
    ],


    'translator' => [
        'locale' => 'pt_BR',
        'translation_file_patterns' => [
            [
                'type' => \Zend\I18n\Translator\Loader\Gettext::class,
                'base_dir' => getcwd() . '/data/language',
                'pattern' => '%s.mo',
            ],
            [
                'type' => \Zend\I18n\Translator\Loader\PhpArray::class,
                'base_dir' => getcwd() . '/data/language',
                'pattern' => 'pt_BR.php',
                'text_domain' => 'default'
            ],
        ],
    ],
];
