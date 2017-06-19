<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 02/05/17
 * Time: 20:22
 */

namespace Salao\Form;

use Zend\Form\Element\Number;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Hydrator\ClassMethods;

class ServicoForm extends Form
{

    const DESCRICAO = 'descricao';
    const DURACAO = 'duracao';
    const VALOR = 'valor';
    const DELETADO = 'deletado';

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->setHydrator(new ClassMethods());

        $descricao = new Text(self::DESCRICAO);
        $descricao->setAttributes([
            'id' => self::DESCRICAO,
            'required' => 'required'
        ]);
        $this->add($descricao);

        $duracao = new Number(self::DURACAO);
        $duracao->setAttributes([
            'id' => self::DURACAO,
            'required' => 'required',
            'min' => 1,
            'max' => 1439,
            'step' => 1,
            'value' => 0
        ]);
        $this->add($duracao);

        $valor = new Text(self::VALOR);
        $valor->setAttributes([
            'id' => self::VALOR,
            'required' => 'required'
        ]);
        $this->add($valor);
    }
}