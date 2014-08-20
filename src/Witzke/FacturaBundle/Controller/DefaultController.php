<?php

namespace Witzke\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FacturaBundle:Default:index.html.twig');
    }
}
