<?php

namespace AE\StoriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Luogo
 *
 * @ORM\Table(name="h_luoghi")
 * @ORM\Entity(repositoryClass="AE\StoriaBundle\Entity\LuogoRepository")
 */
class Luogo {

    use Traits\Storia, \Ephp\GeoBundle\Model\Traits\BaseGeo;

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
     * @ORM\Column(name="inizio_attivita", type="integer", nullable=true)
     */
    private $inizioAttivita;

    /**
     * @var integer
     *
     * @ORM\Column(name="fine_attivita", type="integer", nullable=true)
     */
    private $fineAttivita;

    /**
     * @var string
     *
     * @ORM\Column(name="gestori", type="text", nullable=true)
     */
    private $gestori;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $discipline
     * 
     * @ORM\ManyToMany(targetEntity="Disciplina", cascade={"all"})
     * @ORM\JoinTable(name="h_luoghi_discipline",
     *      joinColumns={@ORM\JoinColumn(name="luogo_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="disciplina_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"nome" = "ASC"}) 
     */
    private $discipline;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $manifestazioni
     *
     * @ORM\ManyToMany(targetEntity="Manifestazione", mappedBy="luoghi", cascade={"all"})
     */
    private $gruppi;

    /**
     * Constructor
     */
    public function __construct() {
        $this->discipline = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gruppi = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set persone
     *
     * @param string $persone
     * @return Luogo
     */
    public function setPersone($persone) {
        $this->persone = $persone;

        return $this;
    }

    /**
     * Get persone
     *
     * @return string 
     */
    public function getPersone() {
        return $this->persone;
    }

    /**
     * Set inizioAttivita
     *
     * @param integer $inizioAttivita
     * @return Luogo
     */
    public function setInizioAttivita($inizioAttivita) {
        $this->inizioAttivita = $inizioAttivita;

        return $this;
    }

    /**
     * Get inizioAttivita
     *
     * @return integer 
     */
    public function getInizioAttivita() {
        return $this->inizioAttivita;
    }

    /**
     * Set fineAttivita
     *
     * @param integer $fineAttivita
     * @return Luogo
     */
    public function setFineAttivita($fineAttivita) {
        $this->fineAttivita = $fineAttivita;

        return $this;
    }

    /**
     * Get fineAttivita
     *
     * @return integer 
     */
    public function getFineAttivita() {
        return $this->fineAttivita;
    }

    /**
     * Set gestori
     *
     * @param string $gestori
     * @return Luogo
     */
    public function setGestori($gestori) {
        $this->gestori = $gestori;

        return $this;
    }

    /**
     * Get gestori
     *
     * @return string 
     */
    public function getGestori() {
        return $this->gestori;
    }

    /**
     * Add discipline
     *
     * @param \AE\StoriaBundle\Entity\Disciplina $discipline
     * @return Luogo
     */
    public function addDiscipline(\AE\StoriaBundle\Entity\Disciplina $discipline) {
        $this->discipline[] = $discipline;

        return $this;
    }

    /**
     * Remove discipline
     *
     * @param \AE\StoriaBundle\Entity\Disciplina $discipline
     */
    public function removeDiscipline(\AE\StoriaBundle\Entity\Disciplina $discipline) {
        $this->discipline->removeElement($discipline);
    }

    /**
     * Get discipline
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscipline() {
        return $this->discipline;
    }

    /**
     * Add gruppi
     *
     * @param \AE\StoriaBundle\Entity\Manifestazione $gruppi
     * @return Luogo
     */
    public function addGruppi(\AE\StoriaBundle\Entity\Manifestazione $gruppi) {
        $this->gruppi[] = $gruppi;

        return $this;
    }

    /**
     * Remove gruppi
     *
     * @param \AE\StoriaBundle\Entity\Manifestazione $gruppi
     */
    public function removeGruppi(\AE\StoriaBundle\Entity\Manifestazione $gruppi) {
        $this->gruppi->removeElement($gruppi);
    }

    /**
     * Get gruppi
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGruppi() {
        return $this->gruppi;
    }

    //-----------------------------------------------------
    //
    //-----------------------------------------------------
}