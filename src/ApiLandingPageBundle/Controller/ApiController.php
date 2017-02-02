<?php

namespace ApiLandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ApiLandingPageBundle\Entity\Cliente;

class ApiController extends Controller
{
    public function indexAction(Request $request)
    {
    	// Entidade Doctrine para manipulação do Bando de dados
    	$em = $this->getDoctrine()->getManager();
    	$content = json_decode($request->getContent(), true);    	

		$parts = explode("/", $content['data']);

   		$cliente = (new Cliente())
   			->setNome($content['nome'])
   			->setEmail($content['email'])
   			->setTelefone($content['telefone'])
   			->setRegiao($content['regiao'])
   			->setDataNasc($parts[2].'-'.$parts[1].'-'.$parts[0])
   			->setUnidade($content['unidade'])
   		;   		

   		// Pontuação
   		$score = 10;

   		switch ($cliente->getRegiao()) {
   			case 'Sul':

   				$score -= 2;
   				break;
   			case 'Sudeste':

   				if ($cliente->getUnidade() != 'São Paulo') {
   					$score--;
   				}
   				
   				break;
   			case 'Centro-Oeste':

   				$score -= 3;
   				break;
   			case 'Nordeste':

   				$score -= 4;
   				break;
   			default:

   				$score -= 5;
   				break;
   		}
   		
   		$dataAtual = new \DateTime('2016-11-01');
   		$idade = $dataAtual->diff(new \DateTime($cliente->getDataNasc()))->y;

   		if ($idade >= 100 || $idade < 18) {
   			$score -= 5;
   		}

   		if ($idade >= 40 && $idade <= 99) {
   			$score -= 3;	
   		}

   		dump($idade);
    	die();
    }
}
