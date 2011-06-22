<?php $this->load->helper('form'); ?>

<?php doctype() ?>
<html>
<head>
	<?php meta() ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"> </script>
	<script type="text/javascript">
	var i = 2;
	function addEmail() {
		var email = $("#email1").clone();
		email.find("#email1").attr("id", "email"+i);
		email.find("a").attr("style", "");
		email.find("label").html('Email '+i+':'); 
		$("#emails").append("<div id='email"+i+"'>"+email.html()+"</div>");
		i++;
	}
	function removeEmail(instance) {
		if (instance.parent().attr("id") != "email1") {
			instance.parent().remove();
			i--;
		}
	}

	var j = 2;
	function addTelefone() {
		var telefone = $("#telefone1").clone();
		telefone.find("#telefone1").attr("id", "telefone"+j);
		telefone.find("a").attr("style", "");
		telefone.find("label").html('Telefone Fixo '+j+':'); 
		$("#telefones").append("<div id='telefone"+j+"'>"+telefone.html()+"</div>");
		j++;
	}
	function removeTelefone(instance) {
		if (instance.parent().attr("id") != "telefone1") {
			instance.parent().remove();
			j--;
		}
	}

	var k = 2;
	function addTitulacao() {
		var titulacao = $("#titulacao1").clone();
		titulacao.find("#titulacao1").attr("id", "titulacao"+k);
		titulacao.find("a").attr("style", "");
		titulacao.find("label[for='titulacao']").html('Titulacao '+k+':'); 
		$("#titulacoes").append("<div id='titulacao"+k+"'>"+titulacao.html()+"</div>");
		k++;
	}
	function removeTitulacao(instance) {
		if (instance.parent().attr("id") != "titulacao1") {
			instance.parent().remove();
			k--;
		}
	}
	
	</script>
</head>

<body>
	
	<h1>Cadastrar nova pessoa</h1>
	
	<?=form_open('pessoa/alterando');?>
		<?php if ($pessoas) echo form_hidden('id', $pessoas[0]->id)	?>
	
		<div>
			<?=form_label('Nome: ', 'nome')?>
			<?=form_input('nome', $pessoas ? $pessoas[0]->nome : '', '')?>
		</div>
		<div>
			<?=form_label('Estado Civil: ', 'estado_civil')?>
			<?=form_radio('estado_civil', 1, $pessoas ? ($pessoas[0]->estado_civil == 1 ? TRUE : '') : '')?> <?=form_label('Solteiro(a)', 'ec_solteiro')?>
			<?=form_radio('estado_civil', 2, $pessoas ? ($pessoas[0]->estado_civil == 2 ? TRUE : '') : '')?> <?=form_label('Casado(a)', 'ec_casado')?>
			<?=form_radio('estado_civil', 3, $pessoas ? ($pessoas[0]->estado_civil == 3 ? TRUE : '') : '')?> <?=form_label('Divorciado(a)', 'ec_divorciado')?>
			<?=form_radio('estado_civil', 4, $pessoas ? ($pessoas[0]->estado_civil == 4 ? TRUE : '') : '')?> <?=form_label('Viúvo(a)', 'ec_viuvo')?>
		</div>
		<div>
			<?=form_label('Sexo: ', 'sexo')?>
			<?=form_radio('sexo', 1, $pessoas ? ($pessoas[0]->sexo == 1 ? TRUE : '') : '')?> <?=form_label('Masculino', 'sexo')?>
			<?=form_radio('sexo', 2, $pessoas ? ($pessoas[0]->sexo == 2 ? TRUE : '') : '')?> <?=form_label('Feminino', 'sexo')?>
		</div>
		<div>
			<?=form_label('Cargo: ', 'tipo')?>
			<?=form_radio('tipo', 1, $pessoas ? ($pessoas[0]->tipo == 1 ? TRUE : '') : '')?> <?=form_label('Técnico', 'tipo')?>
			<?=form_radio('tipo', 2, $pessoas ? ($pessoas[0]->tipo == 2 ? TRUE : '') : '')?> <?=form_label('Gestor', 'tipo')?>
		</div>
		<div>
			<?=form_label('Site: ', 'site')?>
			<?=form_input('site', $pessoas ? $pessoas[0]->site : '', '')?>
		</div>
		<div>
			<?=form_label('Blog: ', 'blog')?>
			<?=form_input('blog', $pessoas ? $pessoas[0]->blog : '', '')?>
		</div>
		<div>
			<?=form_label('Twitter: ', 'twitter')?>
			<?=form_input('twitter', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div id="emails">
			<div id="email1">
				<?=form_label('Email 1: ', 'email1')?>
				<?=form_input('email1', $pessoas ? $pessoas[0]->twitter : '', '')?>
				<a onclick="removeEmail($(this));" href="javascript:void(0);" style="display:none;"> Remover </a>
			</div>
		</div>
		<div>
			<a onclick="addEmail();" href="javascript:void(0);"> Novo email </a>
		</div>
		<div id="telefones">
			<div id="telefone1">
				<?=form_label('Telefone Fixo 1: ', 'telefone1')?>
				<?=form_input('telefone1', $pessoas ? $pessoas[0]->twitter : '', '')?>
				<a onclick="removeTelefone($(this));" href="javascript:void(0);" style="display:none;"> Remover </a>
			</div>
		</div>
		<div>
			<a onclick="addTelefone();" href="javascript:void(0);"> Novo telefone </a>
		</div>
		<div>
			<?=form_label('Telefone Celular: ', 'tel_cel')?>
			<?=form_input('tel_cel', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Endereço Institucional: ', 'end_institucional')?>
			<?=form_input('end_institucional', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('CV Lates (Link): ', 'cv_lates')?>
			<?=form_input('cv_lates', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div id="titulacoes">
			<div id="titulacao1">
				<?=form_label('Titulação: ', 'titulacao')?>
				<br/>
				<?=form_radio('titulacao', 1, $pessoas ? ($pessoas[0]->estado_civil == 1 ? TRUE : '') : '')?> Graduação
				<?=form_radio('titulacao', 2, $pessoas ? ($pessoas[0]->estado_civil == 2 ? TRUE : '') : '')?> Aperfeiçoamento
				<?=form_radio('titulacao', 3, $pessoas ? ($pessoas[0]->estado_civil == 3 ? TRUE : '') : '')?> Especialização
				<?=form_radio('titulacao', 4, $pessoas ? ($pessoas[0]->estado_civil == 4 ? TRUE : '') : '')?> Mestrado
				<?=form_radio('titulacao', 5, $pessoas ? ($pessoas[0]->estado_civil == 5 ? TRUE : '') : '')?> Doutorado
				<?=form_radio('pos-titulacao', 6, $pessoas ? ($pessoas[0]->estado_civil == 6 ? TRUE : '') : '')?> Pós-Doutorado  ---    
				Data: <?=form_input('data_pos-doutorado', '', '')?>
				<a onclick="removeTitulacao($(this));" href="javascript:void(0);" style="display:none;"> Remover </a>
			</div>
		</div>
		<div>
			<a onclick="addTitulacao();" href="javascript:void(0);"> Nova titulação </a>
		</div>
		<div>
			<?=form_label('Graduação: ', 'graduacao')?>
			<?=form_input('graduacao', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Data de Admissão: ', 'data_admissao')?>
			<?=form_input('data_admissao', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Data de Saída: ', 'data_saida')?>
			<?=form_input('data_saida', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<br/>
	
	<?=form_submit('submit_button', 'Enviar')?>
	
	<?=form_close()?>
	


</body>
</html>