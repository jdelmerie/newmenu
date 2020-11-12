<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div class="container">

	<div class="m-5 text-center">
		<div class="row">
			<div>
				<h2>Présentation</h2>
				<br>
				<p class="">Ce site représente un TP réalisé avec le framework Code Igniter 3. Il s'agit d'un CMS pour permettre aux restaurateurs de créer une carte numérique. Découvrez ce qui est possible.</p>
				<hr>

				<h4>Démonstations avec un restaurant fictif : <?=ucfirst($etab_demo->name)?></h4><br>
				<a href="<? echo base_url("/etab/display/$etab_demo->id") ?>" class="btn btn-success" target="_blank">Démo écran normale</a>

				<hr>
				<p>Pour essayer, vous pouvez vous inscrire.</p>
			</div>
		</div>


	</div>

	<div class="row m-5 text-center">
		<div class="col-6">
			<h2>Connexion</h2>
			<a class="text-white btn btn-primary" href="/welcome/login">Se connecter</a>
		</div>

		<div class="col-6">
			<h2>Inscription</h2>
			<a class="text-white btn btn-primary" href="/welcome/signin">S'inscrire</a>
		</div>
	</div>
</div>
</body>
</html>