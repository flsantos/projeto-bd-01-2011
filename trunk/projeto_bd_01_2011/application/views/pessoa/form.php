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
		<br/>
	
	<?=form_submit('submit_button', 'Enviar')?>
	
	<?=form_close()?>
	


</body>
</html>