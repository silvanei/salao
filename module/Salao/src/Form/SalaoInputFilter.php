<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 10:19
 */

namespace Salao\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\I18n\Filter\NumberFormat;
use Zend\I18n\Validator\IsFloat;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class SalaoInputFilter extends InputFilter
{
    public function __construct()
    {

        $this->add([
            'name' => SalaoForm::NOME,
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
            'name' => SalaoForm::ENDERECO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ]
        ]);

        $this->add([
            'name' => SalaoForm::LAT,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => NumberFormat::class],
            ],
            'validators' => [
                ['name' => IsFloat::class]
            ]
        ]);

        $this->add([
            'name' => SalaoForm::LNG,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => NumberFormat::class],
            ],
            'validators' => [
                ['name' => IsFloat::class]
            ]
        ]);
    }
}