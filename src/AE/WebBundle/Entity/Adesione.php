<?php

namespace AE\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Adesione
 *
 * @ORM\Table(name="ae_adesioni")
 * @ORM\Entity(repositoryClass="AE\WebBundle\Entity\AdesioneRepository")
 */
class Adesione
{
    use \Gedmo\Timestampable\Traits\TimestampableEntity;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=128)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=16, nullable=true)
     */
    private $telefono;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sito", type="string", length=255, nullable=true)
     */
    private $sito;

    /**
     * @var boolean
     *
     * @ORM\Column(name="associazione", type="boolean")
     */
    private $associazione;

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
     * Set nome
     *
     * @param string $nome
     * @return Adesione
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
     * @return Adesione
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
     * Set telefono
     *
     * @param string $telefono
     * @return Adesione
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set associazione
     *
     * @param boolean $associazione
     * @return Adesione
     */
    public function setAssociazione($associazione)
    {
        $this->associazione = $associazione;
    
        return $this;
    }

    /**
     * Get associazione
     *
     * @return boolean 
     */
    public function getAssociazione()
    {
        return $this->associazione;
    }
    
    public function getSito() {
        return $this->sito;
    }

    public function setSito($sito) {
        $this->sito = $sito;
    }


}
