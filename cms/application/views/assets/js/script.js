$(document).ready(function(){
	
	$('#login form').validate({
		rules: {
			'passwordConfirm': {
				equalTo: "#password"
			}
		}
	});
	$('form').validate();
	
	$('input.datepicker').datepicker({
		dateFormat: "dd/mm/yy"
	});
	
	$('a.delete').click(function(){
		if(!confirm("Deseja realmente excluir este registro?"))
			return false;
	});
	
});

/*
 * Translated default messages for the jQuery validation plugin.
 */
jQuery.extend(jQuery.validator.messages, {
	required: "Este campo é obrigatório.",
	remote: "Por favor, corrija este campo.",
	email: "Por favor, forneça um e-mail válido.",
	url: "Por favor, forneça uma URL válida.",
	date: "Por favor, forneça uma data válida.",
	dateISO: "Por favor, forneça uma data válida (ISO).",
	number: "Por favor, forneça um número válido.",
	digits: "Por favor, forneça somente dí­gitos.",
	creditcard: "Por favor, forneça um cartão de crédito válido.",
	equalTo: "Por favor, forneça o mesmo valor novamente.",
	accept: "Por favor, forneça um valor com uma extensão válida.",
	maxlength: jQuery.validator.format("Por favor, forneça não mais que {0} caracteres."),
	minlength: jQuery.validator.format("Por favor, forneça ao menos {0} caracteres."),
	rangelength: jQuery.validator.format("Por favor, forneça um valor entre {0} e {1} caracteres de comprimento."),
	range: jQuery.validator.format("Por favor, forneça um valor entre {0} e {1}."),
	max: jQuery.validator.format("Por favor, forneça um valor menor ou igual a {0}."),
	min: jQuery.validator.format("Por favor, forneça um valor maior ou igual a {0}."),
	maxWords: "Por favor, insira {0} palavras ou menos.",
	minWords: "Por favor, insira pelo menos {0} palavras.",
	rangeWords: "Por favor, insira entre {0} e {1} palavras.",
	letterswithbasicpunc: "Por favor, insira letras ou pontuação.",
	alphanumeric: "Por favor, insira apenas letras, números, espaços ou sublinhados.",
	lettersonly: "Por favor, somente letras.",
	nowhitespace: "Por favor, não insira espaços em branco.",
	integer: "Por favor, insira um número positivo ou negativo não-decimal.",
	dateITA: "Por favor, insira uma data correta.",
	time: "Por favor, insira um horário válido entre 00:00 e 23:59.",
	time12h: "Por favor, insira um horário válido entre 00:00 am e 12:00 pm.",
	strippedminlength: "Por favor, insira pelo menos {0} caracteres.",
	creditcardtypes: "Por favor, insira um número válido de cartão de crédito.",
	ipv4: "Por favor, insira um endereço IP v4 válido.",
	ipv6: "Por favor, insira um endereço IP v6 válido.",
	pattern: "Por favor, insira um formato válido.",
	verificaCPF: "Por favor, insira um CPF válido.",
	verificaCNPJ: "Por favor, insira um CNPJ válido.",
	phone: "O campo telefone é inválido."
});