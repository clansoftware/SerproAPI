<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title>Serpro API - Modelo PHP</title>
	<link href="assets/css/style.css" rel="stylesheet"/>
	<script src="assets/scripts/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<script type="text/javascript" src="assets/scripts/jquery.js"></script>
</head>
<body>
	<form action="main.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend>Credencials</legend>

			<input type="radio" name="producao" value="True" checked="true">
			<label for="producao">Desenvolvimento:</label>
			<input type="radio" name="producao" value="False">
			<label for="producao">Produção</label><br/>

			<label for="key">Key:</label>
			<input type="text" class="form" id="key" name="key" value="djaR21PGoYp1iyK2n2ACOH9REdUb"/><br/>

			<label for="secrect">Secrect:</label>
			<input type="text" class="form-control" id="secrect" name="secrect" value="ObRsAJWOL4fv2Tp27D1vd8fB3Ote"><br/>

			<input type="submit" name="btn-send" class="btn btn-primary" value="Obter Bearer">
			<?php if(isset($response)&&!empty($response)):?>
				<div class="label-response">
					<pre><?=print_r($response);?></pre>
				</div>
			<?php endif;?>
		</fieldset>

		<fieldset>
			<legend>Campos a Validar</legend>
			<label for="bearer">Bearer:</label>
			<input type="text" class="form-control" value="<?=isset($bearer)?$bearer:''?>" id="bearer" name="bearer" readonly="true" disabled="true"><br/>

			<label>CPF:</label>
			<input type="text" id="cpf" class="cpf" name="cpf" /><br/>

			<input type="radio" name="fromFile" value="True" checked="true">
			<label for="fromFile">Arquivo:</label>
			<input type="radio" name="fromFile" value="False">
			<label for="fromFile">Base64</label>
			<input type="radio" name="fromFile" value="False">
			<label for="fromFile">Captura</label><br/>

			<label for="face">Foto:</label>
			<input type="file" class="" id="face" name="face" title="Importar Arquivo">
			<input type="file" class="hidden" id="base" name="base" title="Inserir Base">
			<input type="file" class="hidden" id="captura" name="captura" title="Capturar Imagem"><br/>

			<input type="submit" name="btn-send" class="btn btn-primary" value="Validar">
			<?php if(isset($faced)&&!empty($faced)):?>
				<div class="label-response">
					<pre>
					<?= print_r($faced); ?>
					</pre>
				</div>
			<?php endif;?>
		</fieldset>
	</form>


	<!-- <div class="footer">
		<p>
			<a title="Is ao Site" href="https://clansoftware.com.br" target="_blank">
				<img src="assets/img/logo-clansoftware.jpeg" />
			</a>
		</p>
	</div> -->
</body>
	<footer class="container">
		<div class="row footer">
			<div class="col-md-3">
			<ul class="social_icon">
                        <li><a href="https://www.facebook.com/clansoftware/" target="_BLANK"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://github.com/clansoftware" target="_BLANK"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/clan-software" target="_BLANK"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                     </ul>
                     </div>
			<div class="titlepage col-md-6">
			<div style="height: 30px"></div>
                     <a href="https://api.whatsapp.com/send?phone=554184605647" target="_BLANK">
                     	<i class="fa fa-mobile" style="color: white"> (41) 8460-5647</i></a> | 
                     <a href="tel:+554133611822" target="_BLANK">
                     	<i class="fa fa-phone" style="color: white"> (41) 3361-1822</i> 
                     </a> | <a href="mailto:contato@clansoftware.com.br"><i class="fa fa-envelope-o" style="color: white"> contato@clansoftware.com.br</i></a>
                  </div>
			<div class="col-md-3">
				<img id="clan-logo" src="assets/img/clan-logo_transparent.png">
			</div>
		</div>
	</footer>
</html>