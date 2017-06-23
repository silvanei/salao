<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 02/05/17
 * Time: 20:22
 */

namespace Profissional\Form;

use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Hydrator\ClassMethods;

class ProfissionalForm extends Form
{

    const NOME = 'nome';
    const APELIDO = 'apelido';
    const TELEFONE = 'telefone';
    const CELULAR = 'celular';
    const DELETADO = 'deletado';

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->setHydrator(new ClassMethods());

        $descricao = new Text(self::NOME);
        $descricao->setAttributes([
            'id' => self::NOME,
            'required' => 'required'
        ]);
        $this->add($descricao);

        $apelido = new Text(self::APELIDO);
        $apelido->setAttributes([
            'id' => self::APELIDO
        ]);
        $this->add($apelido);
    }
}