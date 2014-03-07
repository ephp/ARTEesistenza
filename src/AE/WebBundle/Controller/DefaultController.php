<?php

namespace AE\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {
    use \Ephp\UtilityBundle\Controller\Traits\BaseController;

    /**
     * @Route("/", name="index", options={"stats":{"area": {"index"}}})
     * @Template()
     */
    public function indexAction() {
        $this->countSql('
                  SELECT COUNT(*) 
                    FROM blog_posts p, 
                         blog_posts_categories pc
                   WHERE pc.post_id = p.id
                     AND pc.category_id = :cat
            ', array('cat' => 4));
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
            'menu_active' => 'progetto',
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
            'menu_active' => 'progetto',
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
            'menu_active' => 'progetto',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Progetto' => array(),
                "Dichiarazione d'intenti" => array('route' => 'dichiarazione_intenti'),
            ),
        );
    }

}
