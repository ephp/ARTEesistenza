<?php

namespace AE\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

    /**
     * @Route("/", name="index", options={"stats":{"area": {"index"}}})
     * @Template()
     */
    public function indexAction() {
        return array(
            'slide_foto' => array('logo', 'video'),
            'theme_panel' => false,
        );
    }

    /**
     * @Route("/progetto/come-nasce-arteesistenza", name="come_nasce", options={"stats":{"area": {"progetto"}}})
     * @Template()
     */
    public function progettoAction() {
        return array(
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Progetto' => array(),
                'Come nasce ARTEesistenza' => array('route' => 'come_nasce'),
            ),
        );
    }

    /**
     * @Route("/progetto/il-manifesto", name="manifesto", options={"stats":{"area": {"progetto"}}})
     * @Template()
     */
    public function manifestoAction() {
        return array(
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Progetto' => array(),
                'Il manifesto' => array('route' => 'manifesto'),
            ),
        );
    }
    
    /**
     * @Route("/progetto/dichiarazione-d-intenti", name="dichiarazione_intenti", options={"stats":{"area": {"progetto"}}})
     * @Template()
     */
    public function dichiarazioneAction() {
        return array(
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Progetto' => array(),
                "Dichiarazione d'intenti" => array('route' => 'dichiarazione_intenti'),
            ),
        );
    }

}
