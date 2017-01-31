var actual = angular.module('actual',[]);

actual.controller('landingPageController', function($scope){

	$scope.formDataOne = {
		nome: 'feripe',
		email: 'feripe@mail.com',
		data : '10/10/2010',
		telefone : '(11) 9999-9999'
	};

	$scope.formOne = true;
	$scope.formTwo = false;
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

	$scope.enviar = function(form) {
		console.log(form);
	};
});


