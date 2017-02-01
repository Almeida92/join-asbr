<?php

namespace LandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$routes = [
    		'api' => $this->generateUrl('api_landing_page_homepage'),
    	];

        return $this->render('LandingPageBundle:Default:index.html.twig',[
        	'routes' => json_encode($routes)
        ]);
    }
}
