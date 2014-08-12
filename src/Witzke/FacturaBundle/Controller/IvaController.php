<?php

namespace Witzke\FacturaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Witzke\FacturaBundle\Entity\Iva;
use Witzke\FacturaBundle\Form\IvaType;

/**
 * Iva controller.
 *
 */
class IvaController extends Controller
{

    /**
     * Lists all Iva entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturaBundle:Iva')->findAll();

        return $this->render('FacturaBundle:Iva:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Iva entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Iva();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('iva_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturaBundle:Iva:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Iva entity.
     *
     * @param Iva $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Iva $entity)
    {
        $form = $this->createForm(new IvaType(), $entity, array(
            'action' => $this->generateUrl('iva_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Iva entity.
     *
     */
    public function newAction()
    {
        $entity = new Iva();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturaBundle:Iva:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Iva entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:Iva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Iva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturaBundle:Iva:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Iva entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:Iva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Iva entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturaBundle:Iva:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Iva entity.
    *
    * @param Iva $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Iva $entity)
    {
        $form = $this->createForm(new IvaType(), $entity, array(
            'action' => $this->generateUrl('iva_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Iva entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:Iva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Iva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('iva_edit', array('id' => $id)));
        }

        return $this->render('FacturaBundle:Iva:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Iva entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturaBundle:Iva')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Iva entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('iva'));
    }

    /**
     * Creates a form to delete a Iva entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('iva_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
