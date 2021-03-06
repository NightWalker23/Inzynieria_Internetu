<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Rental;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rental controller.
 *
 * @Route("rental")
 */
class RentalController extends Controller
{
    /**
     * Lists all rental entities.
     *
     * @Route("/", name="rental_index")
     * @Method({"GET" , "POST"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rentals = $em->getRepository('AppBundle:Rental')->findAll();

        return $this->render('rental/index.html.twig', array(
            'rentals' => $rentals,
        ));
    }

    /**
     * Creates a new rental entity.
     *
     * @Route("/new", name="rental_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rental = new Rental();
        $form = $this->createForm('AppBundle\Form\RentalType', $rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rental);
            $em->flush();

            return $this->redirectToRoute('rental_show', array('id' => $rental->getId()));
        }

        return $this->render('rental/new.html.twig', array(
            'rental' => $rental,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a rental entity.
     *
     * @Route("/{id}", name="rental_show")
     * @Method("GET")
     */
    public function showAction(Rental $rental)
    {
        $deleteForm = $this->createDeleteForm($rental);

        return $this->render('rental/show.html.twig', array(
            'rental' => $rental,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rental entity.
     *
     * @Route("/{id}/edit", name="rental_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rental $rental)
    {
        $deleteForm = $this->createDeleteForm($rental);
        $editForm = $this->createForm('AppBundle\Form\RentalType', $rental);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rental_edit', array('id' => $rental->getId()));
        }

        return $this->render('rental/edit.html.twig', array(
            'rental' => $rental,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rental entity.
     *
     * @Route("/{id}", name="rental_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rental $rental)
    {
        $form = $this->createDeleteForm($rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rental);
            $em->flush();
        }

        return $this->redirectToRoute('rental_index');
    }

    /**
     * @Route("/wypozyczone/{id}", name="wypozyczone")
     */
    public function userRentalAction(Request $request){

        $rental = new Rental();
        $form = $this->createForm('AppBundle\Form\RentalType', $rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rental);
            $em->flush();

            return $this->redirectToRoute('rental_show', array('id' => $rental->getId()));
        }

        return $this->render('rental/new.html.twig', array(
            'rental' => $rental,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to delete a rental entity.
     *
     * @param Rental $rental The rental entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rental $rental)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rental_delete', array('id' => $rental->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
