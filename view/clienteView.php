<?php

class clienteView{

	private function cabecalho(){

	echo "<html>
	<head>
	<title>
	</title>
	</head>
	<body>";
}
	private function rodape(){
		echo "</body>
		</html>";
	}

	private function cadastraCliente(){
		$this->cabecalho();
		echo "
		<table align="center">
			<tr><td>Nome:</td>
			<td>Profissao: </td>
			<td>Endereco: </td>
			<td>RG:</td></tr>

			<tr><td><input type="text" name="nome"></td>
			<td><input type="text" name="profissao"></td>
			<td><input type="text" name="endereco"></td>
			<td><input type="text" name="rg"></td></tr>

			<tr><td>Filiacao:</td>
			<td>Naturalidade:</td>
			<td>Data de nascimento:</td>
			<td>Nome conjugue:</td></tr>

			<tr><td><input type="text" name="filiacao"></td>
			<td><input type="text" name="naturalidade"></td>
			<td><input type="text" name="data_nasc"></td>
			<td><input type="text" name="nome_conj"></td></tr>

			<tr><td>Profissao do conjugue: </td>
			<td>Referencia: </td>
			<td>Telefone referencia: </td>
			<td>CPF: </td></tr>

			<tr><td><input type="text" name="prof_conj"></td>
			<td><input type="text" name="referencia"></td>
			<td><input type="text" name="tel_ref"></td>
			<td><input type="text" name="cpf"></td></tr>

			<tr><td colspan="4" align="right"><input type="button" name="cadastrar" value="Cadastrar" ></td></tr>		
		</table>";
		$this->rodape();
	}
	}
