<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 09:19
 */

namespace Site\Form;

use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class CadastroForm extends Form
{

    const NOME_SALAO = 'nomeSalao';
    const TELEFONE_SALAO = 'telefoneSalao';
    const NOME_ADMINISTRADOR_SALAO = 'nomeAdministradorSalao';
    const EMAIL_ADMINISTRADOR_SALAO = 'emailAdministradorSalao';
    const SENHA_ADMINISTRADOR_SALAO = 'senhaAdministradorSalao';

    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $nomeSalao = new Text(self::NOME_SALAO);
        $nomeSalao->setAttributes([
            'id' => self::NOME_SALAO,
            'placeholder' => 'Nome do salão',
            'required' => 'required',
            'minlength' => '5',
            'maxlength' => '255'
        ]);
        $this->add($nomeSalao);

        $telefoneSalao = new Text(self::TELEFONE_SALAO);
        $telefoneSalao->setAttributes([
            'id' => self::TELEFONE_SALAO,
            'placeholder' => 'Telefone',
            'required' => 'required'
        ]);
        $this->add($telefoneSalao);

        $nomeAdministradorSalao = new Text(self::NOME_ADMINISTRADOR_SALAO);
        $nomeAdministradorSalao->setAttributes([
            'id' => self::NOME_ADMINISTRADOR_SALAO,
            'placeholder' => 'Responsável pelo salão',
            'required' => 'required',
            'minlength' => '5',
            'maxlength' => '255'
        ]);
        $this->add($nomeAdministradorSalao);

        $emailAdministradorSalao = new Text(self::EMAIL_ADMINISTRADOR_SALAO);
        $emailAdministradorSalao->setAttributes([
            'id' => self::EMAIL_ADMINISTRADOR_SALAO,
            'placeholder' => 'E-mail',
            'required' => 'required'
        ]);
        $this->add($emailAdministradorSalao);

        $senhaAdministradorSalao = new Password(self::SENHA_ADMINISTRADOR_SALAO);
        $senhaAdministradorSalao->setAttributes([
            'id' => self::SENHA_ADMINISTRADOR_SALAO,
            'placeholder' => 'Senha',
            'required' => 'required',
            'minlength' => '5',
            'maxlength' => '10'
        ]);
        $this->add($senhaAdministradorSalao);

    }


}