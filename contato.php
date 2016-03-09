<?php require_once("head.php"); ?>
	<div class="wrapper">
		<?php require_once("menu.php"); ?>
			
		<div class="form col-md-5">
			<?php if(!$_POST["sucesso"]):?>
			<form action="contato.php" method="post">
				<fieldset>
					<legend>Entre em contato conosco</legend>
						<div class="form-group">
							<label>Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Digite seu nome completo" />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Digite seu email de contato" />
						</div>
						<div class="form-group">
							<label>Assunto</label>
							<select name="assunto" class="form-control">
								 <option>Compras</option>
								 <option>Dúvidas</option>
								 <option>Imprensa</option>
								 <option>Marketing</option>
							</select>
						</div>
						<div class="form-group">
							<label>Mensagem</label>
							<textarea name="mensagem" class="form-control" rows="6"></textarea>
						</div>
						<button type="submit" name="sucesso" value="enviar" class="btn btn-default">Enviar</button>
			</form>
			<?php else:?>
				<h2>Os seguintes dados foram enviados com sucesso:</h2>
				<b>Nome:</b> <?php echo $_POST["nome"];?><br>
				<b>Email:</b> <?php echo $_POST["email"];?><br>
				<b>Assunto:</b> <?php echo $_POST["assunto"];?><br>
				<b>Mensagem:</b> <?php echo $_POST["mensagem"];?><br>
			<?php endif;?>
		</div>

		<div class="push"></div>
	</div>

		<?php require_once("footer.php"); ?>