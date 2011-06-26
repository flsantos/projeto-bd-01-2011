<?php $this->load->helper('form'); ?>

<?php doctype() ?>
<html>
<head>
	<?php meta() ?>
	<script type="text/javascript" src="<?=base_url()?>public/js/jquery-1.5.1.min.js"> </script>
	<script type="text/javascript">
	var i = <?php if($emails) echo count($emails)+1; else echo "2"; ?>;
	function addEmail() {
		var email = $("div#email1").clone();
		email.find("#email1").attr("id", "email"+i);
		email.find("input[name='email1']").attr("name", "email"+i);
		email.find("a").attr("style", "");
		email.find("label").html('Email '+i+':');
		email.find("label").attr("for", "email"+i);
		$("#emails").append("<div id='email"+i+"'>"+email.html()+"</div>");
		$("input#email"+i).val("");
		i++;
	}
	function removeEmail(instance) {
		if (instance.parent().attr("id") != "email1") {
			instance.parent().remove();
			i--;
		}
	}
	<?php 
		$fixos = 0;
		if ($telefones != null) {
			foreach ($telefones as $tel) {
				if ($tel->tipo == 1) {
					$fixos++;
				}
			}
		}
	?>
	var j = <?php if($telefones) echo $fixos+1; else echo "2"; ?>;
	function addTelefone() {
		var telefone = $("#telefone1").clone();
		telefone.find("#telefone1").attr("id", "telefone"+j);
		telefone.find("input[name='telefone1']").attr("name", "telefone"+j);
		telefone.find("a").attr("style", "");
		telefone.find("label").html('Telefone Fixo '+j+':'); 
		telefone.find("label").attr("for", "telefone"+j);
		$("#telefones").append("<div id='telefone"+j+"'>"+telefone.html()+"</div>");
		$("input#telefone"+j).val("");
		j++;
	}
	function removeTelefone(instance) {
		if (instance.parent().attr("id") != "telefone1") {
			instance.parent().remove();
			j--;
		}
	}

	var k = <?php if($titulacoes) echo count($titulacoes)+1; else echo "2"; ?>;
	function addTitulacao() {
		var titulacao = $("#titulacao1").clone();
		titulacao.find("#titulacao1").attr("id", "titulacao"+k);
		titulacao.find("#data_titulacao1").attr("id", "data_titulacao"+k);
		titulacao.find("input[name='titulacao1']").attr("name", "titulacao"+k);
		titulacao.find("input[name='data_titulacao1']").attr("name", "data_titulacao"+k);
		titulacao.find("a").attr("style", "");
		titulacao.find("label[for='titulacao']").html('Titulacao '+k+':'); 
		$("#titulacoes").append("<div id='titulacao"+k+"'>"+titulacao.html()+"</div>");
		$("input#data_titulacao"+k).val("");
		$("input[name='titulacao"+k+"']").attr("checked","");
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
	
	<?php
		if ($tecnicogestor == null) 
			echo "<h1>Cadastrar novo Técnico/Gestor</h1>";
	 	else 
	 		echo "<h1>Atualizar Técnico/Gestor</h1>";
	 ?>
	
	<?=form_open('tecnicogestor/alterando');?>
		<?php if ($tecnicogestor != null) echo form_hidden('id', $tecnicogestor[0]->id)	?>
		<?php if ($pessoas != null) echo form_hidden('id_pessoa', $pessoas[0]->id)	?>
		<?php if ($emails != null) { $l = 1; foreach ($emails as $em) { echo form_hidden('id_email'.$l, $em->id); $l++;}}?>
		<?php if ($telefones != null) { $l = 1; foreach ($telefones as $te) { echo form_hidden('id_telefone'.$l, $te->id); $l++;}}?>
		<?php if ($titulacoes != null) { $l = 1; foreach ($titulacoes as $ti) { echo form_hidden('id_titulacao'.$l, $ti->id); $l++;}}?>
	
		<div>
			<?=form_label('Nome: ', 'nome')?>
			<?=form_input('nome', $pessoas ? $pessoas[0]->nome : 'Fulaninho da Silva', '')?>
		</div>
		<div>
			<?=form_label('Estado Civil: ', 'estado_civil')?>
			<?=form_radio('estado_civil', 1, $pessoas ? ($pessoas[0]->estado_civil == 1 ? TRUE : '') : '')?> <?=form_label('Solteiro(a)', 'ec_solteiro')?>
			<?=form_radio('estado_civil', 2, $pessoas ? ($pessoas[0]->estado_civil == 2 ? TRUE : '') : 'TRUE')?> <?=form_label('Casado(a)', 'ec_casado')?>
			<?=form_radio('estado_civil', 3, $pessoas ? ($pessoas[0]->estado_civil == 3 ? TRUE : '') : '')?> <?=form_label('Divorciado(a)', 'ec_divorciado')?>
			<?=form_radio('estado_civil', 4, $pessoas ? ($pessoas[0]->estado_civil == 4 ? TRUE : '') : '')?> <?=form_label('Viúvo(a)', 'ec_viuvo')?>
		</div>
		<div>
			<?=form_label('Sexo: ', 'sexo')?>
			<?=form_radio('sexo', 1, $pessoas ? ($pessoas[0]->sexo == 1 ? TRUE : '') : 'TRUE')?> <?=form_label('Masculino', 'sexo')?>
			<?=form_radio('sexo', 2, $pessoas ? ($pessoas[0]->sexo == 2 ? TRUE : '') : '')?> <?=form_label('Feminino', 'sexo')?>
		</div>
		<div>
			<?=form_label('Cargo: ', 'tipo')?>
			<?=form_radio('tipo', 1, $tecnicogestor ? ($tecnicogestor[0]->perfil == 1 ? TRUE : '') : '')?> <?=form_label('Técnico', 'tipo')?>
			<?=form_radio('tipo', 2, $tecnicogestor ? ($tecnicogestor[0]->perfil == 2 ? TRUE : '') : 'TRUE')?> <?=form_label('Gestor', 'tipo')?>
		</div>
		<div>
			<?=form_label('Site: ', 'site')?>
			<?=form_input('site', $tecnicogestor ? $tecnicogestor[0]->site : 'http://www.fulaninho.com.br', '')?>
		</div>
		<div>
			<?=form_label('Blog: ', 'blog')?>
			<?=form_input('blog', $tecnicogestor ? $tecnicogestor[0]->blog : 'http://www.fulaninho.blogspot.com', '')?>
		</div>
		<div>
			<?=form_label('Twitter: ', 'twitter')?>
			<?=form_input('twitter', $tecnicogestor ? $tecnicogestor[0]->twitter : 'http://www.twitter.com/fulaninho', '')?>
		</div>
		<div id="emails">
			<?php if ($emails != null):?>
				<?php $i = 1;?>
				<?php foreach ($emails as $email): ?>
					<div id="email<?=$i?>">
						<?=form_label('Email '.$i.': ', 'email'.$i)?>
						<?=form_input('email'.$i, $email ? $email->email : 'fulaninho@gmail.com', "id='email".$i."'")?>
						<a onclick="removeEmail($(this));" href="javascript:void(0);" <?php if ($i==1) echo "style='display:none;'"; ?>> Remover </a>
					</div>
					<?php $i++;?>
				<?php endforeach;?>
			<?php else: ?>
				<div id="email1">
					<?=form_label('Email 1: ', 'email1')?>
					<?=form_input('email1', 'fulaninho@gmail.com', "id='email1'")?>
					<a onclick="removeEmail($(this));" href="javascript:void(0);" style="display:none"> Remover </a>
				</div>
			<?php endif;?>
		</div>
		<div>
			<a onclick="addEmail();" href="javascript:void(0);"> Novo email </a>
		</div>
		<div id="telefones">
			<?php if ($telefones != null): ?>
				<?php $j = 1;?>
				<?php foreach ($telefones as $telefone): ?>
					<?php if ($telefone->tipo == 1) :?>
						<div id="telefone<?=$j?>">
							<?=form_label('Telefone Fixo '.$j.': ', 'telefone'.$j)?>
							<?=form_input('telefone'.$j, $telefone ? $telefone->telefone : '33282380', 'id=telefone'.$j)?>
							<a onclick="removeTelefone($(this));" href="javascript:void(0);" <?php if ($j==1) echo "style='display:none;'"; ?>> Remover </a>
						</div>
						<?php $j++;?>
					<?php endif;?>
				<?php endforeach;?>
			<?php else: ?>
				<?php $j = 1;?>
				<div id="telefone<?=$j?>">
					<?=form_label('Telefone Fixo '.$j.': ', 'telefone'.$j)?>
					<?=form_input('telefone'.$j, '33282380', 'id=telefone'.$j)?>
					<a onclick="removeTelefone($(this));" href="javascript:void(0);" <?php if ($j==1) echo "style='display:none;'"; ?>> Remover </a>
				</div>
			<?php endif;?>
		</div>
		<div>
			<a onclick="addTelefone();" href="javascript:void(0);"> Novo telefone </a>
		</div>
		<div>
			<?=form_label('Telefone Celular: ', 'tel_cel')?>
				<?php if ($telefones != null) {foreach ($telefones as $tel) { if ($tel->tipo == 2) { $fixo = $tel; }}} ?>
			<?=form_input('tel_cel', $telefones ? $fixo->telefone : '81776353', '')?>
		</div>
		<div>
			<?=form_label('Endereço Institucional: ', 'end_institucional')?>
			<?=form_input('end_institucional', $tecnicogestor ? $tecnicogestor[0]->end_institucional : 'QE 26 Conjunto O casa 12 - Guará II', '')?>
		</div>
		<div>
			<?=form_label('CV Lates (Link): ', 'cv_lates')?>
			<?=form_input('cv_lates', $tecnicogestor ? $tecnicogestor[0]->cv_lattes : 'http://www.googledocs.com/e723hjjejf', '')?>
		</div>
		<div id="titulacoes">
			<?php if ($titulacoes != null):?>
				<?php $k = 1;?>
				<?=form_label('Titulações: ', 'titulacao'.$k)?>
				<?php foreach ($titulacoes as $titulacao):?>
					<div id="titulacao<?=$k?>">
						<?=form_radio('titulacao'.$k, 1, $tecnicogestor ? ($titulacao->titulacao_id == 1 ? TRUE : '') : 'TRUE')?> Graduação
						<?=form_radio('titulacao'.$k, 2, $tecnicogestor ? ($titulacao->titulacao_id == 2 ? TRUE : '') : '')?> Aperfeiçoamento
						<?=form_radio('titulacao'.$k, 3, $tecnicogestor ? ($titulacao->titulacao_id == 3 ? TRUE : '') : '')?> Especialização
						<?=form_radio('titulacao'.$k, 4, $tecnicogestor ? ($titulacao->titulacao_id == 4 ? TRUE : '') : '')?> Mestrado
						<?=form_radio('titulacao'.$k, 5, $tecnicogestor ? ($titulacao->titulacao_id == 5 ? TRUE : '') : '')?> Doutorado
						<?=form_radio('titulacao'.$k, 6, $tecnicogestor ? ($titulacao->titulacao_id == 6 ? TRUE : '') : '')?> Pós-Doutorado  ---    
						Data: <?=form_input('data_titulacao'.$k, $titulacao ? $titulacao->data : '2008-04-01', "id='data_titulacao".$k."'")?>
						<a onclick="removeTitulacao($(this));" href="javascript:void(0);" <?php if ($k==1) echo "style='display:none;'"; ?>> Remover </a>
					</div>
					<?php $k++;?>
				<?php endforeach;?>
			<?php else: ?>
				<?php $k = 1;?>
				<?=form_label('Titulações: ', 'titulacao'.$k)?>
					<div id="titulacao<?=$k?>">
						<?=form_radio('titulacao'.$k, 1, 'TRUE')?> Graduação
						<?=form_radio('titulacao'.$k, 2, '')?> Aperfeiçoamento
						<?=form_radio('titulacao'.$k, 3, '')?> Especialização
						<?=form_radio('titulacao'.$k, 4, '')?> Mestrado
						<?=form_radio('titulacao'.$k, 5, '')?> Doutorado
						<?=form_radio('titulacao'.$k, 6, '')?> Pós-Doutorado  ---    
						Data: <?=form_input('data_titulacao'.$k, '2008-04-01', "id='data_titulacao".$k."'")?>
						<a onclick="removeTitulacao($(this));" href="javascript:void(0);" <?php if ($k==1) echo "style='display:none;'"; ?>> Remover </a>
					</div>
					<?php $k++;?>
			<?php endif;?>
		</div>
		<div>
			<a onclick="addTitulacao();" href="javascript:void(0);"> Nova titulação </a>
		</div>
		<div>
			<?=form_label('Graduação: ', 'graduacao')?>
			<?=form_input('graduacao', $tecnicogestor ? $tecnicogestor[0]->graduacao : '2009-06-17', '')?>
		</div>
		<div>
			<?=form_label('Data de Admissão: ', 'data_admissao')?>
			<?=form_input('data_admissao', $tecnicogestor ? $tecnicogestor[0]->data_admissao : '2010-08-10', '')?>
		</div>
		<div>
			<?=form_label('Data de Saída: ', 'data_saida')?>
			<?=form_input('data_saida', $tecnicogestor ? $tecnicogestor[0]->data_saida : '', '')?>
		</div>
		<br/>
	
	<?=form_submit('submit_button', 'Enviar')?>
	
	<?=form_close()?>
	


</body>
</html>