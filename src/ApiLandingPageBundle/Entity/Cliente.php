<?php

namespace ApiLandingPageBundle\Entity;

/**
 * Cliente
 */
class Cliente
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $dataNasc;
    /**
     * @var string
     */
    private $telefone;

    /**
     * @vartring
     */
    private $regiao;

    /**
     * @var string
     */
    private $unidade;


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
     * Set nome
     *
     * @param string $nome
     *
     * @return Cliente
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
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dataNasc
     *
     * @param \DateTime $dataNasc
     *
     * @return Cliente
     */
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;

        return $this;
    }

    /**
     * Get dataNasc
     *
     * @return \DateTime
     */
    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Cliente
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
     * Set regiao
     *
     * @param string $regiao
     *
     * @return Cliente
     */
    public function setRegiao($regiao)
    {
        $this->regiao = $regiao;

        return $this;
    }

    /**
     * Get regiao
     *
     * @return string
     */
    public function getRegiao()
    {
        return $this->regiao;
    }

    /**
     * Set unidade
     *
     * @param string $unidade
     *
     * @return Cliente
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return string
     */
    public function getUnidade()
    {
        return $this->unidade;
    }
}
