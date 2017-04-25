<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 10:19
 */

namespace Site\Form;

use DoctrineModule\Validator\NoObjectExists;
use Zend\Filter\Digits;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;

class CadastroInputFilter extends InputFilter
{
    public function __construct($repository)
    {

        $this->add([
            'name' => CadastroForm::NOME_SALAO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 5,
                        'max' => 255,
                    ],
                ]
            ]
        ]);

        $this->add([
            'name' => CadastroForm::TELEFONE_SALAO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Digits::class],
            ]
        ]);

        $this->add([
            'name' => CadastroForm::NOME_ADMINISTRADOR_SALAO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 5,
                        'max' => 255,
                    ],
                ]
            ]
        ]);

        $this->add([
            'name' => CadastroForm::EMAIL_ADMINISTRADOR_SALAO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                ['name' => EmailAddress::class],
                [
                    'name' => NoObjectExists::class,
                    'options' => [
                        'object_repository' => $repository,
                        'fields' => 'email',
                        'messages' => [
                            NoObjectExists::ERROR_OBJECT_FOUND => "Já existe um usuário com o e-mail '%value%' ",
                        ],
                    ],
                ],
            ]
        ]);

        $this->add([
            'name' => CadastroForm::SENHA_ADMINISTRADOR_SALAO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 5,
                        'max' => 10,
                    ],
                ]
            ]
        ]);
    }
}