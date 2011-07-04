<?php $this->load->helper('form'); ?>
<?=doctype('html5') ?>
<html>
<head>
	<?=meta('Content-type', 'text/html; charset=utf-8', 'equiv');?>
	<title>Viualizar Dados de um Técnico/Gestor</title> 
	<link rel="stylesheet" href="<?=base_url()?>public/css/corpo/default.css" type="text/css" />
	
</head>

<body>

<!-- start header -->
<div id="logo">
	<h1><?=anchor('#', 'Visualizar Técnico/Gestor', '')?></h1>
	<h2> &raquo;&nbsp;&nbsp;&nbsp;Técnico/Gestor</h2>
</div>
<div id="header">
	<div id="menu">
		<ul>
			<li class="current_page_item"><?=anchor('tecnicogestor/alterar', 'Cadastrar novo técnico/gestor', 'Novo registro')?></li>
		</ul>
	</div>
</div>
<!-- end header -->

<div id="wrapper">
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
	
				<div>
					<?=form_label('Nome: ', 'nome')?>
					<?=$pessoas[0]->nome?>
				</div>
				<div>
					<?=form_label('Estado Civil: ', 'estado_civil')?> 
					<?php
						if ($pessoas[0]->estado_civil == 1) {
							echo $pessoas[0]->sexo == 1 ? "Solteiro" : "Solteira";
						} elseif ($pessoas[0]->estado_civil == 2) {
							echo $pessoas[0]->sexo == 1 ? "Casado" : "Casada";
						} elseif ($pessoas[0]->estado_civil == 3) {
							echo $pessoas[0]->sexo == 1 ? "Divorciado" : "Divorciada";
						} elseif ($pessoas[0]->estado_civil == 4) {
							echo $pessoas[0]->sexo == 1 ? "Viúvo" : "Viúva";
						}
					?>
				</div>
				<div>
					<?=form_label('Sexo: ', 'sexo')?>
					<?php
						if ($pessoas[0]->sexo == 1) {
							echo "Masculino";
						} elseif ($pessoas[0]->sexo == 2) {
							echo "Feminino";
						}
					?>
				</div>
				<div>
					<?=form_label('Cargo: ', 'tipo')?>
					<?php
						if ($tecnicogestor[0]->perfil == 1) {
							echo "Técnico";
						} elseif ($tecnicogestor[0]->perfil == 2) {
							echo "Gestor";
						}
					?>
				</div>
				<div>
					<?=form_label('Site: ', 'site')?>
					<?=$tecnicogestor[0]->site?>
				</div>
				<div>
					<?=form_label('Blog: ', 'blog')?>
					<?=$tecnicogestor[0]->blog?>
				</div>
				<div>
					<?=form_label('Twitter: ', 'twitter')?>
					<?=$tecnicogestor[0]->twitter?>
				</div>
				<div id="emails">
					<?php $i = 1;?>
					<?php foreach ($emails as $email):?>
						<div id="email<?php echo $i?>">
							Email <?=$i?>: 
							<?=$email->email?>
						</div>
						<?php $i++;?>
					<?php endforeach;?>
				</div>
				<div id="telefones">
					<?php $i = 1;?>
					<?php foreach ($telefones as $telefone):?>
						<div id="telefone<?php echo $i?>">
							Telefone <?=$i?> <?=($telefone->tipo == 1 ? '(Fixo)' : '(Celular)')?>: 
							<?=$telefone->telefone?>
						</div>
						<?php $i++;?>
					<?php endforeach;?>
				</div>
				<div>
					<?=form_label('Endereço Institucional: ', 'end_institucional')?>
					<?=$tecnicogestor[0]->end_institucional ?>
				</div>
				<div>
					<?=form_label('CV Lates (Link): ', 'cv_lates')?>
					<?=$tecnicogestor[0]->cv_lattes ?>
				</div>
				<div id="titulacoes">
					<?php $i = 1;?>
					<?php foreach ($titulacoes as $titulacao):?>
						<div id="titulacao<?php echo $i?>">
							Titulacao <?=$i?>:
							<?=$titulacao->data?> - <?=$titulacao->nome?>
						</div>
						<?php $i++;?>
					<?php endforeach;?>
				</div>
				<div>
					<?=form_label('Graduação: ', 'graduacao')?>
					<?=$tecnicogestor[0]->graduacao?>
				</div>
				<div>
					<?=form_label('Data de Admissão: ', 'data_admissao')?>
					<?=$tecnicogestor[0]->data_admissao?>
				</div>
				<div>
					<?=form_label('Data de Saída: ', 'data_saida')?>
					<?=$tecnicogestor[0]->data_saida != null ? $tecnicogestor[0]->data_saida : '----------'?>
				</div>
		</div>
		</div>
	</div>
	<!-- end content -->
	<div style="clear: both;">&nbsp;</div>
</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal">( c ) 2008. All Rights Reserved. <a href="http://www.freecsstemplates.org/">Bestfriends</a> designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
<!-- end footer -->
	
	
</body>
</html>