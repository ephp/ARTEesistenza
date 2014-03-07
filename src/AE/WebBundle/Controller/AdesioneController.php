<?php

namespace AE\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AE\WebBundle\Entity\Adesione;
use AE\WebBundle\Form\AdesioneType;

/**
 * Adesione controller.
 *
 * @Route("/progetto/adesioni")
 */
class AdesioneController extends Controller {

    use \Ephp\UtilityBundle\Controller\Traits\BaseController;

    /**
     * Lists all Adesione entities.
     *
     * @Route("/", name="progetto_adesioni", options={"stats":{"area": {"progetto"}}})
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $associazioni = $this->findBy('AEWebBundle:Adesione', array('associazione' => true), array('nome' => 'ASC'));
        $cittadini = $this->findBy('AEWebBundle:Adesione', array('associazione' => false), array('nome' => 'ASC'));

        return array(
            'associazioni' => $associazioni,
            'cittadini' => $cittadini,
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Progetto' => array(),
                'Adesioni' => array('route' => 'progetto_adesioni'),
            ),
        );
    }

    /**
     * Creates a new Adesione entity.
     *
     * @Route("/", name="progetto_adesioni_create")
     * @Method("POST")
     * @Template("AEWebBundle:Adesione:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Adesione();
        $form = $this->createForm(new AdesioneType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('progetto_adesioni'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Adesione entity.
     *
     * @Route("/new", name="progetto_adesioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Adesione();
        $form = $this->createForm(new AdesioneType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'breadcrumbs' => array(
                'Home' => array('route' => 'index'),
                'Progetto' => array(),
                'Adesioni' => array('route' => 'progetto_adesioni'),
                'Aderisci al Manifesto di ARTEesistenza' => array('route' => 'progetto_adesioni_new'),
            ),
        );
    }

    /**
     * Deletes a Adesione entity.
     *
     * @Route("/{id}", name="progetto_adesioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AEWebBundle:Adesione')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Adesione entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('progetto_adesioni'));
    }

    /**
     * Creates a form to delete a Adesione entity by id.
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
