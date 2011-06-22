<?php $this->load->helper('form'); ?>

<h1>Cadastrar nova pessoa</h1>
<br/>
<?=form_open('pessoa/alterando');?>

<?=form_label('Nome: ', 'nome')?>
<?=form_input('nome', '', '')?>
<br/>
<?=form_label('Estado Civil: ', 'estado_civil')?>

<?=form_radio('estado_civil', 1)?> <?=form_label('Solteiro(a)', 'ec_solteiro')?>
<?=form_radio('estado_civil', 2)?> <?=form_label('Casado(a)', 'ec_casado')?>
<?=form_radio('estado_civil', 3)?> <?=form_label('Divorciado(a)', 'ec_divorciado')?>
<?=form_radio('estado_civil', 4)?> <?=form_label('Viúvo(a)', 'ec_viuvo')?>
<br/>
<?=form_label('Sexo: ', 'sexo')?>
<?=form_radio('sexo', 'Masculino')?> <?=form_label('Masculino', 'sexo')?>
<?=form_radio('sexo', 'Feminino')?> <?=form_label('Feminino', 'sexo')?>

<br/>

<?=form_submit('submit_button', 'Enviar')?>