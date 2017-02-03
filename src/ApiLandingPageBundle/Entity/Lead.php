<?php

namespace ApiLandingPageBundle\Entity;

/**
 * Lead
 */
class Lead
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $score;

    /**
     * @var \ApiLandingPageBundle\Entity\Cliente
     */
    private $cliente;

    /**
     * @var string
     */
    private $token;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return Lead
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set cliente
     *
     * @param \ApiLandingPageBundle\Entity\Cliente $cliente
     *
     * @return Lead
     */
    public function setCliente(\ApiLandingPageBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \ApiLandingPageBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Lead
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
