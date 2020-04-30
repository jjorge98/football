$(document).ready(function () {
	$(".CPF").mask("999.999.999-99");
	$(".CEP").mask("99999-999");
	$(".CEL").mask("99 99999-9999");
	$("#parentNumber").mask("9999999");
	$(".birth").mask("99/99/9999");
	$(".height").mask("9.99");

	$("#logout").click(function (event) {
		event.preventDefault();
		$("#logout-form").submit();
	});

	$("#registerStudent").validate({
		rules: {
			studentName: "required",
			studentBirth: "required",
			studentRG: "required",
			studentCPF: "required",
			studentPosition: "required",
			studentWeight: "required",
			studentHeight: "required",
			studentSchool: "required",
			studentClass: "required",
			studentShift: "required",
			parentName: "required",
			parentBirth: "required",
			parentRG: "required",
			parentCPF: "required",
			parentCel: "required",
			parentCEP: "required",
			parentUF: "required",
			parentCity: "required",
			parentNeighbor: "required",
			parentAddress: "required",
			parentNumber: "required",
		}, messages: {
			studentName: "Por favor, preencha o nome do aluno",
			studentBirth: "Por favor, preencha a data de nascimento do aluno",
			studentRG: "Por favor, preencha o RG do aluno",
			studentCPF: "Por favor, preencha o CPF do aluno",
			studentPosition: "Por favor, preencha a posição do aluno",
			studentWeight: "Por favor, preencha o peso do aluno",
			studentHeight: "Por favor, preencha a altura do aluno",
			studentSchool: "Por favor, preencha a escola do aluno",
			studentClass: "Por favor, preencha a turma do aluno",
			studentShift: "Por favor, preencha o turno do aluno",
			parentName: "Por favor, preencha o nome do responsável",
			parentBirth: "Por favor, preencha a data de nascimento do responsável",
			parentRG: "Por favor, preencha o RG do responsável",
			parentCPF: "Por favor, preencha o CPF do responsável",
			parentCel: "Por favor, preencha o telefone do responsável",
			parentCEP: "Por favor, preencha o CEP do responsável",
			parentUF: "Por favor, preencha o estado",
			parentCity: "Por favor, preencha a cidade",
			parentNeighbor: "Por favor, preencha o bairro",
			parentAddress: "Por favor, preencha o endereço",
			parentNumber: "Por favor, preencha o número do endereço",
		}
	});

	$("#registerStudentButton").click(function (event) {
		event.preventDefault()

		var data = $("#registerStudent")
			.serializeArray()
			.reduce(function (obj, item) {
				obj[item.name] = item.value;
				return obj;
			}, {});

		$.ajax({
			url: "/studentForm",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
			},
			data: {
				data
			},
			type: "POST",
			dataType: "json",

			success: function (data) {
				if (data.resultado == "OK") {
					swal.fire({
						icon: "success",
						title: "Dados salvos com sucesso!",
						allowOutsideClick: true
					})
				} else {
					swal.fire({
						icon: "warning",
						title: "Erro",
						text: data.title,
						allowOutsideClick: true
					});
					console.log(data.error);
					return false;
				}
			},
			error: function (data) {

				swal.fire({
					icon: "warning",
					title: "Erro",
					text: data.title,
					allowOutsideClick: true
				});
				console.log(data.error);
				return false;
			}
		});
	});

	$("#parentCEP").blur(function () {
		pesquisacep($(this).val())
	});

	$('#mytable').DataTable();
});

/* Funções para validar CEP */
/* Função Pesquisa Cep */
function pesquisacep(valor) {
	//Nova variável "cep" somente com dígitos.
	var cep = valor.replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
	if (cep != "") {

		//Expressão regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;

		//Valida o formato do CEP.
		if (validacep.test(cep)) {
			//Preenche os campos com "..." enquanto consulta webservice.
			document.getElementById('parentAddress').value = "...";
			document.getElementById('parentNeighbor').value = "...";
			document.getElementById('parentCity').value = "...";
			document.getElementById('parentUF').value = "...";

			//Cria um elemento javascript.
			var script = document.createElement('script');

			//Sincroniza com o callback.
			script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

			//Insere script no documento e carrega o conteúdo.
			document.body.appendChild(script);
		} //end if.
		else {
			//cep é inválido.
			limpa_formulário_cep();
			Swal.fire({
				icon: "warning",
				title: "Formato de CEP inválido!"
			});
		}
	} //end if.
	else {
		//cep sem valor, limpa formulário.
		limpa_formulário_cep();
	}
};
/* Fim função Pesquisa Cep */

/* Função limpa formulario */
function limpa_formulário_cep() {
	//Limpa valores do formulário de cep.
	document.getElementById('parentAddress').value = ("");
	document.getElementById('parentNeighbor').value = ("");
	document.getElementById('parentCity').value = ("");
	document.getElementById('parentUF').value = ("");
}
/* Fim função limpa formulario */

/* Função callback */
function meu_callback(conteudo) {
	if (!("erro" in conteudo)) {
		//Atualiza os campos com os valores.
		document.getElementById('parentAddress').value = (conteudo.logradouro);
		document.getElementById('parentNeighbor').value = (conteudo.bairro);
		document.getElementById('parentCity').value = (conteudo.localidade);
		document.getElementById('parentUF').value = (conteudo.uf);
	} //end if.
	else {
		//CEP não Encontrado.
		limpa_formulário_cep();
		alert("CEP não encontrado.");
	}
}
/* Fim função callback */
/* Fim funções para validar CEP */

function showInfo(students) {
	console.log(students);
}