<?php

namespace ApiLandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ApiLandingPageBundle\Entity\Cliente;
use ApiLandingPageBundle\Entity\Lead;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends Controller
{
    public function indexAction(Request $request)
    {
    	$content = json_decode($request->getContent(), true);    	

		$parts = explode("/", $content['data']);

   		$cliente = (new Cliente())
   			->setNome($content['nome'])
   			->setEmail($content['email'])
   			->setTelefone($content['telefone'])
   			->setRegiao($content['regiao'])
   			->setDataNasc($parts[2].'-'.$parts[1].'-'.$parts[0])
   		;   		

   		if ($cliente->getRegiao() == 'Norte') {
   			$cliente->setUnidade('INDIPONÍVEL');
   		} else {
   			$cliente->setUnidade($content['unidade']);
   		}

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

   		$result = $this->generateLead($cliente, $score);

   		return new Response($result);
    }

    private function generateLead($cliente, $score)
    {	
    	// Entidade Doctrine para manipulação do Bando de dados
    	$em = $this->getDoctrine()->getManager();

    	$lead = (new Lead())
    		->setScore($score)
    		->setCliente($cliente)
    		->setToken('e4aec8bb88b8c56727bffa82cbe40b73')
    	;

    	/* Persistindo Lead na base 
    	 O persist esta configurado em cascata, logo o cliente será
    	 salvo recursivamente */
    	$em->persist($lead);
    	$em->flush();

  //   	$data = http_build_query([
  //   		'nome' => $lead->getCliente()->getNome(),
  //   		'email' => $lead->getCliente()->getEmail(),
  //   		'telefone' => $lead->getCliente()->getTelefone(),
  //   		'regiao' => [$lead->getCliente()->getRegiao()],
  //   		'unidade' => [$lead->getCliente()->getUnidade()],
  //   		'data_nascimento' => $lead->getCliente()->getDataNasc(),
  //   		'score' => $lead->getScore(),
  //   		'token' => $lead->getToken(),
  //   	]);

  //   	$content = stream_context_create([
  //   		'http' => [
  //   			'method' => 'POST',
  //   			'header' => "Content-type: application/x-www-form-urlencoded\r\n".
  //   				"Content-Length: ".strlen($data)."\r\n",
  //   			'content' => $data
  //   		]
  //   	]);

  //   	$fp = fopen('http://api.actualsales.com.br/join-asbr/ti/lead', 'r', false, $content);
		// fpassthru($fp);
		// fclose($fp);

		$postfields = [
			'nome' => $lead->getCliente()->getNome(),
    		'email' => $lead->getCliente()->getEmail(),
    		'telefone' => $lead->getCliente()->getTelefone(),
    		'regiao' => $lead->getCliente()->getRegiao(),
    		'unidade' => $lead->getCliente()->getUnidade(),
    		'data_nascimento' => $lead->getCliente()->getDataNasc(),
    		'score' => $lead->getScore(),
    		'token' => $lead->getToken(),
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://api.actualsales.com.br/join-asbr/ti/lead');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		// Edit: prior variable $postFields should be $postfields;
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!
		$result = curl_exec($ch);

		return $result;
    }
}
