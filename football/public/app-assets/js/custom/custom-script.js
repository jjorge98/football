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
				if (data.result == "OK") {
					swal.fire({
						icon: "success",
						title: "Dados salvos com sucesso!",
						allowOutsideClick: true
					}).then(() => {
						window.location.reload();
					});
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
					text: "Ocorreu um erro. Por favor, contate o adm do sistema!",
					allowOutsideClick: true
				});
				console.log(data);
				return false;
			}
		});
	});

	$("#parentCEP").blur(function () {
		pesquisacep($(this).val())
	});

	$('#paymentTable').DataTable({
		"columnDefs": [
			{ "width": "500px", "targets": 0 }
		],
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
		},
	});

	$("#showYearPayment").click(function (event) {
		event.preventDefault();
		var year = $("#yearPayment").val();

		$.ajax({
			url: "/user/yearPayment",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
			},
			data: {
				year
			},
			type: "POST",
			dataType: "json",

			success: function (data) {
				if (data.result == "OK") {
					if (typeof $('tbody').html() != 'undefined') {
						$('tbody').children().remove();
						var table = $('#paymentTable').DataTable();
						table.clear();
						table.destroy();
					};

					var toAppend = '';

					data.students.forEach(element => {
						var name = element.name.split(' ')

						toAppend += '<tr id="' + element.id + '">' +
							'<td class="center-align">' + name[0] + ' ' + name[name.length - 1] + '</td>';

						if (element.months.indexOf('Jan') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Fev') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Mar') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Abr') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Mai') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Jun') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Jul') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Ago') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Set') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Out') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Nov') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td>'
						}

						if (element.months.indexOf('Dez') != -1) {
							toAppend += '<td class="center-align"><i style="color: green" class="material-icons">check</i></td>';
						} else {
							toAppend += '<td class="center-align"><i style="color: red" class="material-icons">clear</i></td></tr>'
						}
					});
					$('tbody').append(toAppend);
				}
				$('#paymentTable').DataTable({
					"columnDefs": [
						{ "width": "500px", "targets": 0 }
					],
					language: {
						url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
					},
				});
			},
			error: function (data) {
				swal.fire({
					icon: "warning",
					title: "Erro",
					text: "Ocorreu um erro. Por favor, contate o adm do sistema!",
					allowOutsideClick: true
				});
				console.log(data);
				return false;
			}
		});
	})
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

function showInfo(id) {
	$.ajax({
		url: "/user/studentInfo",
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		},
		data: {
			id
		},
		type: "POST",
		dataType: "json",

		success: function (data) {
			if (data.result == "OK") {
				swal.fire({
					title: "Dados do aluno:",
					html: '<div style="height: 3px; background-color:#2c3a59;margin-bottom:30px;" class="divider"></div>' +
						'<h5>CPF: ' + data.student.cpfAluno + '</h5>' +
						'<h5>RG: ' + data.student.rgAluno + '</h5>' +
						'<h5>Data de nascimento: ' + data.student.dataNascimentoAluno + '</h5>' +
						'<h5>Telefone: ' + data.student.telefoneAluno + '</h5>' +
						'<h5>Escola: ' + data.student.escola + '</h5>' +
						'<h5>Sala: ' + data.student.sala + '</h5>' +
						'<h5>Turno: ' + data.student.turno + '</h5>'

					,
					allowOutsideClick: true
				})
			}
		},
		error: function (data) {

			swal.fire({
				icon: "warning",
				title: "Erro",
				text: "Ocorreu um erro. Por favor, contate o adm do sistema!",
				allowOutsideClick: true
			});
			console.log(data);
			return false;
		}
	});
}

function showInfoParent(id) {
	$.ajax({
		url: "/user/parentInfo",
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		},
		data: {
			id
		},
		type: "POST",
		dataType: "json",

		success: function (data) {
			if (data.result == "OK") {
				swal.fire({
					title: "Dados do responsável:",
					html: '<div style="height: 3px; background-color:#2c3a59;margin-bottom:30px;" class="divider"></div>' +
						'<h5>Nome: ' + data.parent.nomeResp + '</h5>' +
						'<h5>CPF: ' + data.parent.cpfResp + '</h5>' +
						'<h5>RG: ' + data.parent.rgResp + '</h5>' +
						'<h5>Data de nascimento: ' + data.parent.dataNascimentoResp + '</h5>' +
						'<h5>Telefone: ' + data.parent.telefoneResp + '</h5>'
					,
					allowOutsideClick: true
				})
			}
		},
		error: function (data) {

			swal.fire({
				icon: "warning",
				title: "Erro",
				text: "Ocorreu um erro. Por favor, contate o adm do sistema!",
				allowOutsideClick: true
			});
			console.log(data);
			return false;
		}
	});
}

function showInfoAddress(id) {
	$.ajax({
		url: "/user/addressInfo",
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		},
		data: {
			id
		},
		type: "POST",
		dataType: "json",

		success: function (data) {
			if (data.result == "OK") {
				swal.fire({
					title: "Endereço do aluno:",
					html: '<div style="height: 3px; background-color:#2c3a59;margin-bottom:30px;" class="divider"></div>' +
						'<h5>Endereço: ' + data.address.logradouro + '</h5>' +
						'<h5>Número: ' + data.address.numero + '</h5>' +
						'<h5>Complemento: ' + data.address.complemento + '</h5>' +
						'<h5>Cidade: ' + data.address.nomeCidade + '</h5>' +
						'<h5>Bairro: ' + data.address.bairro + '</h5>' +
						'<h5>CEP: ' + data.address.cep + '</h5>' +
						'<h5>Estado: ' + data.address.nomeEstado + '</h5>'
					,
					allowOutsideClick: true
				})
			}
		},
		error: function (data) {

			swal.fire({
				icon: "warning",
				title: "Erro",
				text: "Ocorreu um erro. Por favor, contate o adm do sistema!",
				allowOutsideClick: true
			});
			console.log(data);
			return false;
		}
	});
}
