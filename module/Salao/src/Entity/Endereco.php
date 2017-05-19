<?php

namespace Salao\Entity;

/**
 * Endereco
 */
class Endereco
{
    /**
     * @var string
     */
    private $endereco;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var Salao
     */
    private $salao;

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Endereco
     */
    public function setLat(float $lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     *
     * @return Endereco
     */
    public function setLng(float $lng): Endereco
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
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
     * @return Salao
     */
    public function getSalao(): Salao
    {
        return $this->salao;
    }

    /**
     * @param Salao $salao
     */
    public function setSalao(Salao $salao)
    {
        $this->salao = $salao;
    }
}

