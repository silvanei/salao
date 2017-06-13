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
use Zend\Filter\ToInt;
use Zend\I18n\Validator\IsFloat;
use Zend\I18n\Validator\IsInt;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Between;
use Zend\Validator\StringLength;

class ServicoInputFilter extends InputFilter
{
    public function __construct()
    {

        $this->add([
            'name' => ServicoForm::DESCRICAO,
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
            'name' => ServicoForm::DURACAO,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => ToInt::class],
            ],
            'validators' => [
                ['name' => IsInt::class],
                [
                    'name' => Between::class,
                    'options' => [
                        'min' => 1,
                        'max' => 1439
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => ServicoForm::VALOR,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                ['name' => IsFloat::class]
            ]
        ]);
    }
}