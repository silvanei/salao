<?php

namespace Salao\Entity;

/**
 * Salao
 */
class Salao
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var boolean
     */
    private $visivelNoApp = '0';

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var string
     */
    private $image;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var HorarioFuncionamento
     */
    private $horario;

    /**
     * @var Endereco
     */
    private $endereco;

    /**
     * @var
     */
    private $servicos;

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Salao
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set visivelNoApp
     *
     * @param boolean $visivelNoApp
     *
     * @return Salao
     */
    public function setVisivelNoApp($visivelNoApp)
    {
        $this->visivelNoApp = $visivelNoApp;

        return $this;
    }

    /**
     * Get visivelNoApp
     *
     * @return boolean
     */
    public function getVisivelNoApp()
    {
        return $this->visivelNoApp;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Salao
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Salao
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return HorarioFuncionamento
     */
    public function getHorario(): HorarioFuncionamento
    {
        return $this->horario;
    }

    /**
     * @param HorarioFuncionamento $horario
     */
    public function setHorario(HorarioFuncionamento $horario): void
    {
        $this->horario = $horario;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {

        if (empty($this->image)) {
            $this->image = 'http://res.cloudinary.com/dqdfcpk0x/image/upload/v1494982228/imagem-nao-disponivel.jpg';
        }

        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return Endereco
     */
    public function getEndereco() : Endereco
    {

        if (empty($this->endereco)) {
            $this->endereco = new Endereco();
        }

        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     */
    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getServicos()
    {
        return $this->servicos;
    }

    /**
     * @param mixed $servicos
     */
    public function setServicos($servicos)
    {
        $this->servicos = $servicos;
    }


}

