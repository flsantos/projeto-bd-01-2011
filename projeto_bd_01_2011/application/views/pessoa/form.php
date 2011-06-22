<?php $this->load->helper('form'); ?>

<?php doctype() ?>
<html>
<head>
	<?php meta() ?>
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
		<div>
			<?=form_label('Email 1: ', 'email1')?>
			<?=form_input('email1', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Email 2: ', 'email2')?>
			<?=form_input('email2', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Email 3: ', 'email3')?>
			<?=form_input('email3', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Telefone Fixo 1: ', 'tel_fixo1')?>
			<?=form_input('tel_fixo1', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<div>
			<?=form_label('Telefone Fixo 2: ', 'tel_fixo2')?>
			<?=form_input('tel_fixo2', $pessoas ? $pessoas[0]->twitter : '', '')?>
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
		<div>
			<?=form_label('Titulação: ', 'titulacao')?>
			<br/>
			<?=form_checkbox('graduacao', 1, $pessoas ? ($pessoas[0]->estado_civil == 1 ? TRUE : '') : '')?> <?=form_label('Graduação - ', 'graduacao')?>  Data: <?=form_input('data_graduacao', '', '')?> <br/>
			<?=form_checkbox('aperfeicoamento', 2, $pessoas ? ($pessoas[0]->estado_civil == 2 ? TRUE : '') : '')?> <?=form_label('Aperfeiçoamento: ', 'aperfeicoamento')?>  Data: <?=form_input('data_aperfeicoamento', '', '')?> <br/>
			<?=form_checkbox('especializacao', 3, $pessoas ? ($pessoas[0]->estado_civil == 3 ? TRUE : '') : '')?> <?=form_label('Especialização: ', 'especializacao')?>   Data: <?=form_input('data_especializacao', '', '')?> <br/>
			<?=form_checkbox('mestrado', 4, $pessoas ? ($pessoas[0]->estado_civil == 4 ? TRUE : '') : '')?> <?=form_label('Mestrado: ', 'mestrado')?>  Data: <?=form_input('data_mestrado', '', '')?> <br/>
			<?=form_checkbox('doutorado', 5, $pessoas ? ($pessoas[0]->estado_civil == 5 ? TRUE : '') : '')?> <?=form_label('Doutorado: ', 'doutorado')?>  Data: <?=form_input('data_doutorado', '', '')?> <br/>
			<?=form_checkbox('pos-doutorado', 6, $pessoas ? ($pessoas[0]->estado_civil == 6 ? TRUE : '') : '')?> <?=form_label('Pós-Doutorado: ', 'pos-doutorado')?>  Data: <?=form_input('data_pos-doutorado', '', '')?> <br/>
		</div>
		<div>
			<?=form_label('Graduação: ', 'graduacao')?>
			<?=form_input('graduacao', $pessoas ? $pessoas[0]->twitter : '', '')?>
		</div>
		<br/>
	
	<?=form_submit('submit_button', 'Enviar')?>
	
	<?=form_close()?>
	


</body>
</html>