<?php $this->load->helper('html') ?>

<?php doctype() ?>

<html>
<head>

<?php meta() ?>

</head>

<body>
	<h1> Pessoas: </h1>
	
	<div>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Estado Civil</th>
					<th>Sexo</th>
				</tr>
			</thead>
			<tbody>
			<?php if (count($pessoas) <= 0): ?>
					<tr>
						<td  colspan="3">Não existem dados cadastrados</td>
					</tr>
			<?php else: ?>
				<?php foreach ($pessoas as $pessoa): ?>
					<tr>
						<td><?=$pessoa->nome?></td>
						<td><?=$pessoa->estado_civil?></td>
						<td><?=$pessoa->sexo?></td>
					</tr>	
				<?php endforeach;?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>


</body>
</html>