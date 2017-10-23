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
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        return $this->render('AppBundle:Project:login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        return $this->render('AppBundle:Project:register.html.twig', array(
            // ...
        ));
    }
}
