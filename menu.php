<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/home">Meu Site</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home<span class="sr-only">(current)</span></a></li>
				    <li><a href="/empresa">Empresa</a></li>
				    <li><a href="/produtos">Produtos</a></li>
				    <li><a href="/servicos">Serviços</a></li>
				    <li><a href="/contato">Contato</a></li>
				    <li>
                        <form name="form1" method="post"action="searchresults.php">
					        <input type="text" name="search" size="40">
					        <input type="submit" name="Submit" value="Pesquisar">
					    </form>
			  	    </li>
                </ul>
                <div class="admin_area">
                    <a href="/login">Administrar</a>
                </div>
			</div><!-- /.navbar-collapse -->

		 </div><!-- /.container-fluid -->
</nav>