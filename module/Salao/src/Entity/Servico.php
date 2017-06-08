<?php declare(strict_types=1);

namespace Salao\Entity;

/**
 * Servico
 */
class Servico
{
    /**
     * @var string
     */
    private $descricao;

    /**
     * @var integer
     */
    private $duracao;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var boolean
     */
    private $deletado = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Salao\Entity\Salao
     */
    private $salao;

    public function setDescricao(string $descricao): Servico
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDuracao(int $duracao): Servico
    {
        $this->duracao = $duracao;

        return $this;
    }

    public function getDuracao(): int
    {
        return $this->duracao;
    }

    public function setValor(float $valor): Servico
    {
        $this->valor = $valor;

        return $this;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setDeletado(bool $deletado): Servico
    {
        $this->deletado = $deletado;

        return $this;
    }

    public function getDeletado(): bool
    {
        return $this->deletado;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function setSalao(Salao $salao = null): Servico
    {
        $this->salao = $salao;

        return $this;
    }

    public function getSalao(): ?Salao
    {
        return $this->salao;
    }
}

