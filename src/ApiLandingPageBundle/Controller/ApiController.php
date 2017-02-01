<?php

namespace ApiLandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function indexAction(Request $request)
    {
    	$content = json_decode($request->getContent(), true);    	

    }
}
