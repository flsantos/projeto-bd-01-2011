<?php doctype() ?>

<html>
<head>

<?php meta() ?>

</head>

<body>
	<h1> T�cnicos/Gestores: </h1>
	
	<div>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Cargo</th>
				</tr>
			</thead>
			<tbody>
			<?php if (count($tecnicogestores) <= 0): ?>
					<tr>
						<td  colspan="3">N�o existem dados cadastrados</td>
					</tr>
			<?php else: ?>
				<?php foreach ($tecnicogestores as $tecnicogestor): ?>
					<tr>
						<td><?=$tecnicogestor->nome?></td>
						<td><?=$tecnicogestor->perfil != null ? ($tecnicogestor->perfil == 1 ? 'T�cnico' : ($tecnicogestor->perfil == 2 ? 'Gestor' : '')) : '' ?></td>
						<td><?=anchor('tecnicogestor/visualizar/'.$tecnicogestor->id, 'Visualizar', 'Visualizar registro')?></td>
						<td><?=anchor('tecnicogestor/alterar/'.$tecnicogestor->id, 'Editar', 'Editar registro')?></td>
						<td><?=anchor('tecnicogestor/excluir/'.$tecnicogestor->id, 'Excluir', 'Excluir registro')?></td>
					</tr>	
				<?php endforeach;?>
			<?php endif; ?>
			</tbody>
		</table>
		<br/>
		<?=anchor('tecnicogestor/alterar', 'Cadastrar novo t�cnico/gestor', 'Novo registro')?>
	</div>


</body>
</html>