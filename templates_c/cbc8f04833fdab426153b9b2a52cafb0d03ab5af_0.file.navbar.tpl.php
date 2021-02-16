<?php
/* Smarty version 3.1.38, created on 2021-02-16 12:52:14
  from 'D:\MAMP\htdocs\zentopia\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_602bbffec212c1_03491713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbc8f04833fdab426153b9b2a52cafb0d03ab5af' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\zentopia\\templates\\navbar.tpl',
      1 => 1613472902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602bbffec212c1_03491713 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- contenu de la basile header (qui a les classes header-homepage et header-all pour différencier les background) -->

<div class="nav-bg"> <!-- set le bandeau de la nav -->

	<div class="container-fluid"> <!-- set les marges intérieures du bandeau -->

		<div class="rs-logos"> 
			<a href="#"><i class="fab fa-youtube"></i></a>
			<a href="#"><i class="fab fa-instagram-square"></i></a>
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
		</div>

		
		<div class="row">

			<nav class="col navbar navbar-expand-xl navbar-light"> <!-- navbar dark/light nécessaire pour que l'icon burger apparaisse! -->
				<a class="navbar-brand col-logo" href="index.php">
					<img src="assets/logos/logo_horizontal.png" width="250" height="100" alt="logo"/>
				</a>


				<!-- le menu burger responsive (ID doit être le même que le collapse plus bas) -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>


				<div id="navbarContent" class="collapse navbar-collapse">

					
					<ul class="navbar-nav ml-auto"> <!-- ml/mr/mx-auto pour centrer la nav -->


						<li class="nav-item <?php if ($_smarty_tpl->tpl_vars['active']->value == 'accueil') {?>active<?php }?>"><a class="nav-link" href="index.php">ACCUEIL</a></li>


						<li class="nav-item <?php if ($_smarty_tpl->tpl_vars['active']->value == 'la_team') {?>active<?php }?>"><a class="nav-link" href="?action=la_team">LA TEAM</a></li>
						

						<li class="nav-item <?php if ($_smarty_tpl->tpl_vars['active']->value == 'enseignement') {?>active<?php }?>"><a class="nav-link" href="?action=enseignement">ENSEIGNEMENT</a></li>
						

						<!-- la partie dropdown contenant les pages Planning et Tarifs -->
						<li class="nav-item dropdown <?php if ($_smarty_tpl->tpl_vars['active']->value == 'les_cours') {?>active<?php }?>"><a class="nav-link dropdown-toggle" href="..." id="navbarDropDownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >LES COURS</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropDownMenuLink">
								<a href="?action=planning" class="dropdown-item">PLANNING</a>
								<a href="?action=tarifs" class="dropdown-item">TARIFS</a>
							</div>
						</li>
						

						<li class="nav-item <?php if ($_smarty_tpl->tpl_vars['active']->value == 'contact') {?>active<?php }?>"><a class="nav-link" href="?action=contact">CONTACT</a></li>

						<!-- si session non active : affiche ESPACE MEMEBRE et lien vers la page de connexion 
							 si session active : affiche MON ESPACE et lien vers la pace "Espace personnel" -->

						<?php if (!(isset($_smarty_tpl->tpl_vars['_SESSION']->value['id_utilisateur']))) {?>
							<li><a href="?action=connexion" class="btn btn-primary btn-espace-membre shadow-none">CONNEXION</a></li>
						<?php } else { ?>
							<li><a href="?action=espace_personnel" class="btn btn-primary btn-espace-membre shadow-none">ESPACE MEMBRE</a></li>
						<?php }?>
						

					</ul>

				</div>

			</nav>	

		</div>
			
	</div>
	
</div><?php }
}
