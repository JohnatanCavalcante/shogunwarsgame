<?php

namespace AppBundle\Entity;

/**
 * Personagem
 */
class Personagem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $level;

    /**
     * @var integer
     */
    private $hpmax;

    /**
     * @var integer
     */
    private $hpcurrent;

    /**
     * @var integer
     */
    private $strength;

    /**
     * @var integer
     */
    private $defence;

    /**
     * @var integer
     */
    private $resistence;


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
     * Set name
     *
     * @param string $name
     *
     * @return Personagem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Personagem
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set hpmax
     *
     * @param integer $hpmax
     *
     * @return Personagem
     */
    public function setHpmax($hpmax)
    {
        $this->hpmax = $hpmax;

        return $this;
    }

    /**
     * Get hpmax
     *
     * @return integer
     */
    public function getHpmax()
    {
        return $this->hpmax;
    }

    /**
     * Set hpcurrent
     *
     * @param integer $hpcurrent
     *
     * @return Personagem
     */
    public function setHpcurrent($hpcurrent)
    {
        $this->hpcurrent = $hpcurrent;

        return $this;
    }

    /**
     * Get hpcurrent
     *
     * @return integer
     */
    public function getHpcurrent()
    {
        return $this->hpcurrent;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     *
     * @return Personagem
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set defence
     *
     * @param integer $defence
     *
     * @return Personagem
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * Get defence
     *
     * @return integer
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * Set resistence
     *
     * @param integer $resistence
     *
     * @return Personagem
     */
    public function setResistence($resistence)
    {
        $this->resistence = $resistence;

        return $this;
    }

    /**
     * Get resistence
     *
     * @return integer
     */
    public function getResistence()
    {
        return $this->resistence;
    }
}

