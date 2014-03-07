<?php

namespace AE\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ephp\BlogBundle\Entity\Post;
use Ephp\BlogBundle\Form\PostType;

/**
 * Post controller.
 *
 * @Route("/blog")
 */
class PostController extends \Ephp\BlogBundle\Controller\PostController {

    /**
     * @Route("/pag/{pag}", name="blog", defaults={"pag": 1})
     * @Route("/", name="blog_index", defaults={"pag": 1})
     * @Template()
     */
    public function indexAction($pag) {
        $out = parent::indexAction($pag);
        return array_merge($out, array(
            'menu_active' => 'social',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Blog' => array(),
                'Blog di ARTEesistenza' => array('route' => 'blog'),
            ),
        ));
    }
    /**
     * Lists all Post entities.
     *
     * @Route("-archive/{month}/{year}/{pag}", name="blog_archive", defaults={"pag": 1})
     * @Method("GET")
     * @Template("EphpBlogBundle:Post:index.html.twig")
     */
    public function archiveAction($month, $year, $pag) {
        $out = parent::archiveAction($month, $year, $pag);
        return array_merge($out, array(
            'menu_active' => 'social',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Blog' => array(),
                'Blog di ARTEesistenza' => array('route' => 'blog_index'),
                'Archivio _mese_ _anno_' => array('route' => 'blog', 'replace' => array('_mese_' => $this->getTranslator()->trans('month.m'.$month, array(), 'EphpBlogBundle'), '_anno_' => $year)),
            ),
        ));
    }

    /**
     * Lists all Post entities.
     *
     * @Route("-category/{name}/{pag}", name="blog_category", defaults={"pag": 1})
     * @Method("GET")
     * @Template("EphpBlogBundle:Post:index.html.twig")
     */
    public function categoryAction($name, $pag) {
        $out = parent::categoryAction($name, $pag);
        return array_merge($out, array(
            'menu_active' => 'social',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Blog' => array(),
                'Blog di ARTEesistenza' => array('route' => 'blog_index'),
                'Categoria '.$name => array('route' => 'blog'),
            ),
        ));
    }

    /**
     * Displays a form to create a new Post entity.
     *
     * @Route("/new", name="blog_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $out = parent::newAction();
        return array_merge($out, array(
            'menu_active' => 'social',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Blog' => array(),
                'Blog di ARTEesistenza' => array('route' => 'blog'),
                'Nuovo articolo' => array('route' => 'blog_new'),
            ),
        ));
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/{slug}", name="blog_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($slug) {
        $out = parent::showAction($slug);
        return array_merge($out, array(
            'menu_active' => 'social',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Blog' => array(),
                'Blog di ARTEesistenza' => array('route' => 'blog'),
                $out['entity']->getTitle() => array('route' => 'blog_show', 'params' => array('slug' => $slug)),
            ),
        ));
    }
    
    /**
     * Creates a new Post entity.
     *
     * @Route("-create/", name="blog_create")
     * @Method("POST")
     * @Template("EphpBlogBundle:Post:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Post();
        $form = $this->createForm(new PostType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            if ($entity->getPicture()) {
                $entity->setPicture($this->find('EphpDragDropBundle:File', $entity->getPicture()));
            }
            $entity->setUser($this->getUser());
            $entity->addCategorie($this->findOneBy('EphpBlogBundle:Category', array('name' => 'ARTEesistenza', 'show' => false)));
            $this->persist($entity);

            return $this->redirect($this->generateUrl('blog'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

}