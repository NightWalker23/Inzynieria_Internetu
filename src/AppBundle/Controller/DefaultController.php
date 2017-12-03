<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Project:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Project:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/userpanel", name="userpanel")
     */
    public function userpanelAction()
    {
        return $this->render('AppBundle:Project:userpanel.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/adminpanel", name="adminpanel")
     */
    public function adminpanelAction()
    {
        return $this->render('AppBundle:Project:adminpanel.html.twig', array(
            // ...
        ));
    }

}
