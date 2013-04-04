<?php

namespace intrepion\PhoneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use intrepion\PhoneBundle\Entity\ContactInfo;
use intrepion\PhoneBundle\Form\ContactInfoType;

/**
 * ContactInfo controller.
 *
 */
class ContactInfoController extends Controller
{
    /**
     * Lists all ContactInfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('intrepionPhoneBundle:ContactInfo')->findAll();

        return $this->render('intrepionPhoneBundle:ContactInfo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ContactInfo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ContactInfo();
        $form = $this->createForm(new ContactInfoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactinfo_show', array('id' => $entity->getId())));
        }

        return $this->render('intrepionPhoneBundle:ContactInfo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ContactInfo entity.
     *
     */
    public function newAction()
    {
        $entity = new ContactInfo();
        $entityManager = $this->getDoctrine()->getManager();
        $form   = $this->createForm(new ContactInfoType(), $entity, array('attr' => array('em' => $entityManager)));

        return $this->render('intrepionPhoneBundle:ContactInfo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'em'     => $entityManager,
        ));
    }

    /**
     * Finds and displays a ContactInfo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('intrepionPhoneBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('intrepionPhoneBundle:ContactInfo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ContactInfo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('intrepionPhoneBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $editForm = $this->createForm(new ContactInfoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('intrepionPhoneBundle:ContactInfo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ContactInfo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('intrepionPhoneBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContactInfoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactinfo_edit', array('id' => $id)));
        }

        return $this->render('intrepionPhoneBundle:ContactInfo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContactInfo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('intrepionPhoneBundle:ContactInfo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContactInfo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contactinfo'));
    }

    /**
     * Creates a form to delete a ContactInfo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
