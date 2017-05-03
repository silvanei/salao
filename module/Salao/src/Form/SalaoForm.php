<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 02/05/17
 * Time: 20:22
 */

namespace Salao\Form;


use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class SalaoForm extends Form
{

    const NOME = 'nome';
    const DIAS_FUNCIONAMENTO = 'dias_funcionamento';

    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $nomeSalao = new Text(self::NOME);
        $nomeSalao->setAttributes([
            'id' => self::NOME,
            'placeholder' => 'Nome do salão',
            'minlength' => '5',
            'maxlength' => '255'
        ]);
        $this->add($nomeSalao);

        $diasFuncionamento = new MultiCheckbox(self::DIAS_FUNCIONAMENTO);
        $diasFuncionamento->setValueOptions([
            '0' => 'Domingo',
            '1' => 'Segunda',
            '2' => 'Terça',
            '3' => 'Quarta',
            '4' => 'Quinta',
            '5' => 'Sexta',
            '6' => 'Sábado',
        ]);
        $this->add($diasFuncionamento);
    }
}