<?php

namespace Extensions\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExtensionsUserBundle:Default:index.html.twig');
    }
}
