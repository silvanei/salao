<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 10:19
 */

namespace Profissional\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\I18n\Filter\Alnum;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class ProfissionalInputFilter extends InputFilter
{
    public function __construct()
    {

        $this->add([
            'name' => ProfissionalForm::NOME,
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
            'name' => ProfissionalForm::APELIDO,
            'required' => false,
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
            'name' => ProfissionalForm::TELEFONE,
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Alnum::class],
            ]
        ]);

        $this->add([
            'name' => ProfissionalForm::CELULAR,
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Alnum::class],
            ]
        ]);

    }
}