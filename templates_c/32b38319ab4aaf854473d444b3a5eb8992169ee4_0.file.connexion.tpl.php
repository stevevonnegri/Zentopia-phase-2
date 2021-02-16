<?php
/* Smarty version 3.1.38, created on 2021-02-12 16:22:53
  from 'D:\MAMP\htdocs\zentopia\templates\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_6026ab5df244e1_21768657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32b38319ab4aaf854473d444b3a5eb8992169ee4' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\zentopia\\templates\\connexion.tpl',
      1 => 1613146299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:banner_coordonnees.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6026ab5df244e1_21768657 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Connexion - Zentopia</title>

		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		<?php $_smarty_tpl->_subTemplateRender('file:head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</head>
	<body>



		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-all"> 

			<!-- Le bandeau contenant les coordonnées -->
			<!-- <?php echo '<?php ';?>
include("banner-coordonnees.php") <?php echo '?>';?>
-->
			<?php $_smarty_tpl->_subTemplateRender('file:banner_coordonnees.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<!-- La navbar -->
			<!-- <?php echo '<?php ';?>
include("navbar.php") <?php echo '?>';?>
 -->
			<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		</header> 

		


		<div class="container connexion-content">
			
			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">
					
					<div class="connexion-block">

						<img src="assets/icons/yoga2.png" width="100" height="100" class="yoga2">
						
						<h1>CONNECTEZ-VOUS</h1>
						
						<?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
							<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

						<?php }?>

						<form action="" method="post">

							<input type="email" name="email_connexion" class="form-control connexion-input" placeholder="Email" required>
							<?php if ((isset($_smarty_tpl->tpl_vars['erroremail']->value))) {?>
								<?php echo $_smarty_tpl->tpl_vars['erroremail']->value;?>

							<?php }?>

							<input type="password" name="password_connexion" class="form-control connexion-input" placeholder="Mot de passe" required>
							<?php if ((isset($_smarty_tpl->tpl_vars['errormdp']->value))) {?>
								<?php echo $_smarty_tpl->tpl_vars['errormdp']->value;?>

							<?php }?>

							<div class="row">
								
								<div class="col text-right">
									
									<a href="?action=mot_de_passe_oublier" class="mdp-oubli">mot de passe oublié ?</a>

								</div>

							</div>

							

							<div class="row">

								<div class="col text-left">

									<input type="checkbox" name="reste_connection" id="stay-connected" value="1">
									<label for="stay-connected">Rester connecté</label>

								</div>

							</div>

							<button type="submit" name="connexion" class="btn btn-primary btn-red shadow-none">SE CONNECTER</button>

						</form>

					</div>

				</div>

			</div>


			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">
					
					<div class="pas-membre-block">
						
						<h1>PAS ENCORE MEMBRE ?</h1>

						<a href="?action=inscription" class="btn btn-primary btn-red shadow-none">NOUS REJOINDRE</a>

					</div>

				</div>

			</div>


		</div>

		<!-- Scroll top + footer -->
		<!-- <?php echo '<?php ';?>
include("footer.php"); <?php echo '?>';?>
 -->
		<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</body>
</html><?php }
}
