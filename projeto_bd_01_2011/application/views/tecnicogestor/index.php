<?=doctype('html5') ?>

<html>
<head>

	<?=meta('Content-type', 'text/html; charset=utf-8', 'equiv');?> 
	<link rel="stylesheet" href="<?=base_url()?>public/css/corpo/default.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>public/css/tablecloth/tablecloth.css" type="text/css" />
		
	<script type="text/javascript" src="<?=base_url()?>public/css/tablecloth/tablecloth.js"> </script>
</head>

<body>

<!-- start header -->
<div id="logo">
	<h1><?=anchor('#', 'Listagem', '')?></h1>
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
            	<table>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Cargo</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php if (count($tecnicogestores) <= 0): ?>
							<tr>
								<td  colspan="3">Não existem dados cadastrados</td>
							</tr>
					<?php else: ?>
						<?php foreach ($tecnicogestores as $tecnicogestor): ?>
							<tr>
								<td><?=$tecnicogestor->nome?></td>
								<td><?=$tecnicogestor->perfil != null ? ($tecnicogestor->perfil == 1 ? 'Técnico' : ($tecnicogestor->perfil == 2 ? 'Gestor' : '')) : '' ?></td>
								<td><?=anchor('tecnicogestor/visualizar/'.$tecnicogestor->id, 'Visualizar', 'Visualizar registro')?></td>
								<td><?=anchor('tecnicogestor/alterar/'.$tecnicogestor->id, 'Editar', 'Editar registro')?></td>
								<td><?=anchor('tecnicogestor/excluir/'.$tecnicogestor->id, 'Excluir', 'Excluir registro')?></td>
							</tr>	
						<?php endforeach;?>
					<?php endif; ?>
					</tbody>
				</table>
				
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

			