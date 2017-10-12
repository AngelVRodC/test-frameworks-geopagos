<?php

namespace GeopagosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GeopagosBundle:Default:index.html.twig');
    }
}
