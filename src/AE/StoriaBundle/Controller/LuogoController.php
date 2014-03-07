<?php

namespace AE\StoriaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AE\StoriaBundle\Entity\Luogo;
use AE\StoriaBundle\Form\LuogoType;

/**
 * Luogo controller.
 *
 * @Route("/luoghi")
 */
class LuogoController extends Controller {

    use \Ephp\UtilityBundle\Controller\Traits\BaseController,
        \Ephp\GeoBundle\Controller\Traits\BaseGeoController;

    /**
     * Lists all Luogo entities.
     *
     * @Route("/", name="luoghi")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $aperti = $this->findBy('AEStoriaBundle:Luogo', array('aperto' => true));
        $chiusi = $this->findBy('AEStoriaBundle:Luogo', array('aperto' => false));

        return array(
            'menu_active' => 'luoghi',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Luoghi e Eventi' => array(),
                "Luoghi" => array('route' => 'luoghi'),
            ),
            'aperti' => $aperti,
            'chiusi' => $chiusi,
        );
    }

    /**
     * Creates a new Luogo entity.
     *
     * @Route("/", name="luoghi_create")
     * @Method("POST")
     * @Template("AEStoriaBundle:Luogo:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Luogo();
        $form = $this->createForm(new LuogoType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('luoghi_show', array('id' => $entity->getId())));
        }

        return array(
            'menu_active' => 'luoghi',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Luoghi e Eventi' => array(),
                "Luoghi" => array('route' => 'luoghi'),
            ),
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Luogo entity.
     *
     * @Route("/new", name="luoghi_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Luogo();
        $form = $this->createForm(new LuogoType(), $entity);

        return array(
            'menu_active' => 'luoghi',
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Luoghi e Eventi' => array(),
                "Luoghi" => array('route' => 'luoghi'),
            ),
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Luogo entity.
     *
     * @Route("/{slug}", name="luoghi_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($slug) {
        $entity = $this->findOneBy('AEStoriaBundle:Luogo', array('slug' => $slug));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Luogo entity.');
        }

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Luogo entity.
     *
     * @Route("/{id}/edit", name="luoghi_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEStoriaBundle:Luogo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Luogo entity.');
        }

        $editForm = $this->createForm(new LuogoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Luogo entity.
     *
     * @Route("/{id}", name="luoghi_update")
     * @Method("PUT")
     * @Template("AEStoriaBundle:Luogo:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEStoriaBundle:Luogo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Luogo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LuogoType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('luoghi_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Luogo entity.
     *
     * @Route("/{id}", name="luoghi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AEStoriaBundle:Luogo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Luogo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('luoghi'));
    }

    /**
     * Creates a form to delete a Luogo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

}
