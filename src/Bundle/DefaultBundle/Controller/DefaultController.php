<?php

namespace Bundle\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation as JMS;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @JMS\Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function indexAction()
    {
        return $this->render('DefaultBundle:Default:index.html.twig');
    }
}
