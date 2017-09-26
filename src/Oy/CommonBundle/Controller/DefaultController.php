<?php

namespace Oy\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OyCommonBundle:Default:index.html.twig');
    }
}
