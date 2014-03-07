<?php

namespace AE\StoriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Luogo
 *
 * @ORM\Table(name="h_edizione")
 * @ORM\Entity(repositoryClass="AE\StoriaBundle\Entity\EdizioneRepository")
 */
class Edizione {

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
     * @ORM\Column(name="prima_edizione", type="date", nullable=true)
     * @Gedmo\SortableGroup
     */
    private $inizio;

    /**
     * @var integer
     *
     * @ORM\Column(name="ultima_edizione", type="date", nullable=true)
     * @Gedmo\SortableGroup
     */
    private $fine;

    /**
     * @var string
     *
     * @ORM\Column(name="organizzatori", type="text", nullable=true)
     */
    private $organizzatori;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $manifestazioni
     * 
     * @ORM\ManyToMany(targetEntity="Luogo", inversedBy="manifestazioni", cascade={"all"})
     * @ORM\JoinTable(name="h_manifestazioni_luoghi",
     *      joinColumns={@ORM\JoinColumn(name="manifestazione_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="luogo_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"nome" = "ASC"}) 
     */
    private $luoghi;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $manifestazioni
     *
     * @ORM\ManyToMany(targetEntity="Disciplina", cascade={"all"})
     * @ORM\JoinTable(name="h_manifestazioni_discipline",
     *      joinColumns={@ORM\JoinColumn(name="manifestazione_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="disciplina_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"nome" = "ASC"}) 
     */
    private $discipline;
    
    /**
     * @ORM\ManyToOne(targetEntity="Manifestazione", inversedBy="edizioni")
     * @ORM\JoinColumn(name="manifestazione_id", referencedColumnName="id")
     * */
    private $manifestazione;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->luoghi = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discipline = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set inizio
     *
     * @param integer $inizio
     * @return Manifestazione
     */
    public function setInizio($inizio) {
        $this->inizio = $inizio;

        return $this;
    }

    /**
     * Get inizio
     *
     * @return integer 
     */
    public function getInizio() {
        return $this->inizio;
    }

    /**
     * Set fine
     *
     * @param integer $fine
     * @return Manifestazione
     */
    public function setFine($fine) {
        $this->fine = $fine;

        return $this;
    }

    /**
     * Get fine
     *
     * @return integer 
     */
    public function getFine() {
        return $this->fine;
    }

    /**
     * Set organizzatori
     *
     * @param string $organizzatori
     * @return Manifestazione
     */
    public function setOrganizzatori($organizzatori) {
        $this->organizzatori = $organizzatori;

        return $this;
    }

    /**
     * Get organizzatori
     *
     * @return string 
     */
    public function getOrganizzatori() {
        return $this->organizzatori;
    }

    /**
     * Add luoghi
     *
     * @param \AE\StoriaBundle\Entity\Luogo $luoghi
     * @return Manifestazione
     */
    public function addLuoghi(\AE\StoriaBundle\Entity\Luogo $luoghi)
    {
        $this->luoghi[] = $luoghi;
    
        return $this;
    }

    /**
     * Remove luoghi
     *
     * @param \AE\StoriaBundle\Entity\Luogo $luoghi
     */
    public function removeLuoghi(\AE\StoriaBundle\Entity\Luogo $luoghi)
    {
        $this->luoghi->removeElement($luoghi);
    }

    /**
     * Get luoghi
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLuoghi()
    {
        return $this->luoghi;
    }

    /**
     * Add discipline
     *
     * @param \AE\StoriaBundle\Entity\Disciplina $discipline
     * @return Manifestazione
     */
    public function addDiscipline(\AE\StoriaBundle\Entity\Disciplina $discipline)
    {
        $this->discipline[] = $discipline;
    
        return $this;
    }

    /**
     * Remove discipline
     *
     * @param \AE\StoriaBundle\Entity\Disciplina $discipline
     */
    public function removeDiscipline(\AE\StoriaBundle\Entity\Disciplina $discipline)
    {
        $this->discipline->removeElement($discipline);
    }

    /**
     * Get discipline
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }
    
    /**
     * Set manifestazione
     * 
     * @param \AE\StoriaBundle\Entity\Manifestazione $manifestazione
     * @return \AE\StoriaBundle\Entity\Edizione
     */
    public function setManifestazione($manifestazione) {
        $this->manifestazione = $manifestazione;
        
        return $this;
    }

    /**
     * Get manifestazione
     * 
     * @return \AE\StoriaBundle\Entity\Manifestazione
     */
    public function getManifestazione() {
        return $this->manifestazione;
    }

    //-----------------------------------------------------
    //
    //-----------------------------------------------------
}