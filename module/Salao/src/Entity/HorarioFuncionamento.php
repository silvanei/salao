<?php declare(strict_types=1);

namespace Salao\Entity;

/**
 * HorarioFuncionamento
 */
class HorarioFuncionamento
{
    /**
     * @var \DateTime
     */
    private $horaInicio;

    /**
     * @var \DateTime
     */
    private $horaFim;

    /**
     * @var boolean
     */
    private $segunda;

    /**
     * @var boolean
     */
    private $terca;

    /**
     * @var boolean
     */
    private $quarta;

    /**
     * @var boolean
     */
    private $quinta;

    /**
     * @var boolean
     */
    private $sexta;

    /**
     * @var boolean
     */
    private $sabado;

    /**
     * @var boolean
     */
    private $domingo;

    /**
     * @var integer
     */
    private $id;

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     *
     * @return HorarioFuncionamento
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFim
     *
     * @param \DateTime $horaFim
     *
     * @return HorarioFuncionamento
     */
    public function setHoraFim($horaFim)
    {
        $this->horaFim = $horaFim;

        return $this;
    }

    /**
     * Get horaFim
     *
     * @return \DateTime
     */
    public function getHoraFim()
    {
        return $this->horaFim;
    }

    /**
     * Set segunda
     *
     * @param boolean $segunda
     *
     * @return HorarioFuncionamento
     */
    public function setSegunda($segunda)
    {
        $this->segunda = $segunda;

        return $this;
    }

    /**
     * Get segunda
     *
     * @return boolean
     */
    public function getSegunda()
    {
        return $this->segunda;
    }

    /**
     * Set terca
     *
     * @param boolean $terca
     *
     * @return HorarioFuncionamento
     */
    public function setTerca($terca)
    {
        $this->terca = $terca;

        return $this;
    }

    /**
     * Get terca
     *
     * @return boolean
     */
    public function getTerca()
    {
        return $this->terca;
    }

    /**
     * Set quarta
     *
     * @param boolean $quarta
     *
     * @return HorarioFuncionamento
     */
    public function setQuarta($quarta)
    {
        $this->quarta = $quarta;

        return $this;
    }

    /**
     * Get quarta
     *
     * @return boolean
     */
    public function getQuarta()
    {
        return $this->quarta;
    }

    /**
     * Set quinta
     *
     * @param boolean $quinta
     *
     * @return HorarioFuncionamento
     */
    public function setQuinta($quinta)
    {
        $this->quinta = $quinta;

        return $this;
    }

    /**
     * Get quinta
     *
     * @return boolean
     */
    public function getQuinta()
    {
        return $this->quinta;
    }

    /**
     * Set sexta
     *
     * @param boolean $sexta
     *
     * @return HorarioFuncionamento
     */
    public function setSexta($sexta)
    {
        $this->sexta = $sexta;

        return $this;
    }

    /**
     * Get sexta
     *
     * @return boolean
     */
    public function getSexta()
    {
        return $this->sexta;
    }

    /**
     * Set sabado
     *
     * @param boolean $sabado
     *
     * @return HorarioFuncionamento
     */
    public function setSabado($sabado)
    {
        $this->sabado = $sabado;

        return $this;
    }

    /**
     * Get sabado
     *
     * @return boolean
     */
    public function getSabado()
    {
        return $this->sabado;
    }

    /**
     * Set domingo
     *
     * @param boolean $domingo
     *
     * @return HorarioFuncionamento
     */
    public function setDomingo($domingo)
    {
        $this->domingo = $domingo;

        return $this;
    }

    /**
     * Get domingo
     *
     * @return boolean
     */
    public function getDomingo()
    {
        return $this->domingo;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return HorarioFuncionamento
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
}

