<?php

namespace AE\StoriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Manifestazione
 *
 * @ORM\Table(name="h_manifestazioni")
 * @ORM\Entity(repositoryClass="AE\StoriaBundle\Entity\ManifestazioneRepository")
 */
class Manifestazione {

    use Traits\Storia;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="prima_edizione", type="integer", nullable=true)
     * @Gedmo\SortableGroup
     */
    private $primaEdizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="ultima_edizione", type="integer", nullable=true)
     * @Gedmo\SortableGroup
     */
    private $ultimaEdizione;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo", type="string", length=64, nullable=true)
     */
    private $periodo;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $manifestazioni
     *
     * @ORM\OneToMany(targetEntity="Edizione", mappedBy="manifestazione", cascade={"all"})
     * @ORM\OrderBy({"inizio" = "DESC"}) 
     */
    private $edizioni;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->edizioni = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set primaEdizione
     *
     * @param integer $primaEdizione
     * @return Manifestazione
     */
    public function setPrimaEdizione($primaEdizione) {
        $this->primaEdizione = $primaEdizione;

        return $this;
    }

    /**
     * Get primaEdizione
     *
     * @return integer 
     */
    public function getPrimaEdizione() {
        return $this->primaEdizione;
    }

    /**
     * Set ultimaEdizione
     *
     * @param integer $ultimaEdizione
     * @return Manifestazione
     */
    public function setUltimaEdizione($ultimaEdizione) {
        $this->ultimaEdizione = $ultimaEdizione;

        return $this;
    }

    /**
     * Get ultimaEdizione
     *
     * @return integer 
     */
    public function getUltimaEdizione() {
        return $this->ultimaEdizione;
    }

    /**
     * Set periodo
     *
     * @param string $periodo
     * @return Manifestazione
     */
    public function setPeriodo($periodo) {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return string 
     */
    public function getPeriodo() {
        return $this->periodo;
    }

    /**
     * Add discipline
     *
     * @param \AE\StoriaBundle\Entity\Edizione $edizione
     * @return Manifestazione
     */
    public function addEdizioni(\AE\StoriaBundle\Entity\Edizione $edizione)
    {
        $this->edizioni[] = $edizione;
    
        return $this;
    }

    /**
     * Remove discipline
     *
     * @param \AE\StoriaBundle\Entity\Edizione $edizione
     */
    public function removeEdizioni(\AE\StoriaBundle\Entity\Edizione $edizione)
    {
        $this->edizioni->removeElement($edizione);
    }

    /**
     * Get discipline
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEdizioni()
    {
        return $this->edizioni;
    }

    //-----------------------------------------------------
    //
    //-----------------------------------------------------

}