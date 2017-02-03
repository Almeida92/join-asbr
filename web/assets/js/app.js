var actual = angular.module('actual',[]);
actual.value('routes', JSON.parse(window.routes));

actual.controller('landingPageController', function($scope, routes, $http){

	$scope.formOne = true;
	$scope.formTwo = false;
	$scope.unidades = [];
	$scope.regioes = [
		{id:1,nome:'Sul'},
	    {id:2,nome:'Sudeste'},
	    {id:3,nome:'Centro-Oeste'},
	    {id:4,nome:'Nordeste'},
	    {id:5,nome:'Norte'}
	];

	// Regex para validações 
	var validationTel = /^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$/;
	var validationNome = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{2,}\s([a-z]{2,}\s)?[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{2,}((\s[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{2,}){1,})?/;
	var validationEmail = /\w{3,}@\w{3,}.com([\.][a-z]{2,})?$/;

	$scope.proxEtapa = function(form) {
		$scope.errors = null;

		if (!validationTel.test(form.telefone)) {
			$scope.errors = {telefone: 'O telefone informado não é válido'};
		}

		if (!validationNome.test(form.nome)) {
			$scope.errors = {nome: 'O nome informado não é válido, é necessário nome e sobrenome.'};
		}

		if (!validationEmail.test(form.email)) {
			$scope.errors = {nome: 'O email informado não é válido'};
		}
		
		if (!$scope.errors) {
			$scope.formOne = false;
			$scope.formTwo = true;
		}
	};

	$scope.change = function(model) {
		switch(model) {
		    case 'Sul':

		        $scope.unidades =[
		        	{id:1,nome:'Porto Alegre'},
				    {id:2,nome:'Curitiba'}
		        ];
		        break;

		    case 'Sudeste':
		        
		        $scope.unidades =[
		        	{id:3, nome:'São Paulo'},
				    {id:4, nome:'Rio de Janeiro'},
				    {id:5, nome:'Belo Horizonte'}
		        ];
		        break;
			case 'Centro-Oeste':

				$scope.unidades = [{id:6, nome:'Brasília'}];
		        break;
		    case 'Nordeste':

		    	$scope.unidades =[
		        	{id:7, nome:'Salvador'},
				    {id:8, nome:'Recife'},
		        ];
		        break;
		    case 'Norte':

		    	$scope.unidades =[
		        	{id:9, nome:'Não possui disponibilidade'},
		        ];
		        break;	        
		}
	}

	$scope.enviar = function(form) {
		$http({
			method: 'POST',
			data: {
				'nome': form.nome,
				'email': form.email,
				'data': form.data,
				'telefone': form.telefone,
				'regiao': form.regiao,
				'unidade': form.unidade
			},
			url: routes.api
		}).then(function success(response) {
		    $scope.sucesso = response.data.message;
		}, function error(response) {
		    $scope.errors = response.data.message;
		});
	};
});


