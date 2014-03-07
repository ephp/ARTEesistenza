<?php

namespace AE\StoriaBundle\Entity\Traits;

trait Storia {

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=128)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="storia", type="text", nullable=true)
     */
    private $storia;

    /**
     * @var string
     *
     * @ORM\Column(name="chiusura", type="text", nullable=true)
     */
    private $chiusura;

    /**
     * @var string
     *
     * @ORM\Column(name="artisti", type="text", nullable=true)
     */
    private $artisti;

    /**
     * @var string
     *
     * @ORM\Column(name="contatti", type="text", nullable=true)
     */
    private $contatti;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pubblico", type="boolean", nullable=true)
     */
    private $pubblico;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aperto", type="boolean", nullable=true)
     */
    private $aperto;

    /**
     * @Gedmo\Slug(fields={"nome"})
     * @ORM\Column(name="slug", type="string", length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * Set nome
     *
     * @param string $nome
     * @return Manifestazione|Luogo|Luogo
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set storia
     *
     * @param string $storia
     * @return Manifestazione|Luogo
     */
    public function setStoria($storia) {
        $this->storia = $storia;

        return $this;
    }

    /**
     * Get storia
     *
     * @return string 
     */
    public function getStoria() {
        return $this->storia;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Manifestazione|Luogo
     */
    public function setLogo($logo) {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo() {
        return $this->logo;
    }

    /**
     * Set chiusura
     *
     * @param string $chiusura
     * @return Manifestazione|Luogo
     */
    public function setChiusura($chiusura) {
        $this->chiusura = $chiusura;

        return $this;
    }

    /**
     * Get chiusura
     *
     * @return string 
     */
    public function getChiusura() {
        return $this->chiusura;
    }

    /**
     * Set artisti
     *
     * @param string $artisti
     * @return Manifestazione|Luogo
     */
    public function setArtisti($artisti) {
        $this->artisti = $artisti;

        return $this;
    }

    /**
     * Get artisti
     *
     * @return string 
     */
    public function getArtisti() {
        return $this->artisti;
    }

    /**
     * Set contatti
     *
     * @param string $contatti
     * @return Manifestazione|Luogo
     */
    public function setContatti($contatti) {
        $this->contatti = $contatti;

        return $this;
    }

    /**
     * Get contatti
     *
     * @return string 
     */
    public function getContatti() {
        return $this->contatti;
    }

    /**
     * Set pubblico
     *
     * @param boolean $pubblico
     * @return Manifestazione|Luogo
     */
    public function setPubblico($pubblico) {
        $this->pubblico = $pubblico;

        return $this;
    }

    /**
     * Get pubblico
     *
     * @return boolean 
     */
    public function getPubblico() {
        return $this->pubblico;
    }

    /**
     * Set aperto
     *
     * @param boolean $aperto
     * @return Manifestazione|Luogo
     */
    public function setAperto($aperto) {
        $this->aperto = $aperto;

        return $this;
    }

    /**
     * Get aperto
     *
     * @return boolean 
     */
    public function getAperto() {
        return $this->aperto;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Manifestazione|Luogo
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set position
     *
     * @param integer $slug
     * @return Manifestazione|Luogo
     */
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition() {
        return $this->position;
    }

}
