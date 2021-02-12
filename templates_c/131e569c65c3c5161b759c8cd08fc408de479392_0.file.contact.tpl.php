<?php
/* Smarty version 3.1.38, created on 2021-02-12 13:21:52
  from 'D:\MAMP\htdocs\zentopia\templates\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_602680f06ac023_77626343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '131e569c65c3c5161b759c8cd08fc408de479392' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\zentopia\\templates\\contact.tpl',
      1 => 1613120382,
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
function content_602680f06ac023_77626343 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Contact - Zentopia</title>
		
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




		<!-- SECTION NOUS ECRIRE -->
		<div class="container-fluid">

			<div class="row justify-content-center contact-info">

				<div class="col-12 col-lg-8">
			
					<p class="text-center">Toute inscription à un cours peut se faire par biais de notre formulaire de contact, par téléphone ou à l'accueil de notre centre.
					
					L’accueil est ouvert de <span>9h30 à 13h30</span> du <span>lundi au mercredi</span> et du <span>vendredi au samedi</span>, et de <span>14h30 à 18h30</span> du <span>lundi au mercredi</span> ainsi que le <span>vendredi</span>.
					
					Le centre est fermé le jeudi, mais nous restons cependant joignables par téléphone de 10h à 18h ou sur les réseaux sociaux pour toute demande ou inscription.</p>

				</div>

				<img src="assets/icons/yoga4.png" class="yoga4-contact" width="100" height="100" alt="" />

			</div>

		</div>


		<div class="container-fluid contact-block">

			<div class="row"> <!-- englobe toute la partie Contact sur fond blanc -->
				
				<div class="col-12 col-lg-8 text-center"> <!-- NOUS ECRIRE -->
					
					<h1 class="nous-ecrire">NOUS ECRIRE</h1>

					<form>
						
						<div class="form-row">

							<div class="form-group col-12 col-sm-6 form-input">
					
								<input type="text" class="form-control" placeholder="Nom" required>
								<i class="fas fa-id-card form-icon"></i>

							</div>

							<div class="form-group col-12 col-sm-6 form-input">

								<input type="email" class="form-control" placeholder="Email" required>
								<i class="fas fa-envelope form-icon"></i>

							</div>

						</div>

						<div class="form-row">

							<div class="form-group col-12 col-sm-6 form-input">
							
								<input type="text" class="form-control" placeholder="Sujet" required>
								<i class="fas fa-comment-dots form-icon"></i>

							</div>

							<div class="form-group col-12 col-sm-6 form-input">

								<input type="tel" class="form-control" placeholder="Téléphone" required>
								<i class="fas fa-phone-square form-icon"></i>

							</div>

						</div>

						<div class="form-row">

							<div class="form-group col form-input">
							
								<textarea rows="5" class="form-control" placeholder="Message" required></textarea>
								<i class="fas fa-pen-square form-icon"></i>

							</div>

						</div>

						<button type="submit" class="btn btn-primary">ENVOYER</button>

					</form>

				</div>


				<div class="col-12 col-lg-4 text-center coordoonnees"> <!-- NOS COORDONNEES -->
					
					<h1>NOS COORDONNEES</h1>

					<img src="assets/logos/logo_vertical.png" width="180" height="180" alt="logo"/>

					<p>26 rue des Tanneurs <br/>
						37000 TOURS <br/>
						Tél: <span>02 47 66 66 66</span> <br/>
						Email: <span>contact@zentopia.fr</span></p>

				</div>

			</div>

		</div>



		<!-- SECTION "NOUS TROUVER" -->
		<div class="plan-block">

			<img src="assets/icons/yoga2.png" class="yoga2-contact" width="100" height="100" alt=""/>
			
			<div class="container-fluid text-center">
				
				<h1>NOUS TROUVER</h1>

				<p>Nous sommes situés en face du versant sud de l'Université de Tours, entre l'église Saint Saturnin et le restaurant universitaire, sur la rue des Tanneurs.</p>

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4542.159633198779!2d0.6793629777725314!3d47.39664178703274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fcd5bb0b7ab605%3A0x6412b220a9949340!2s26%20Rue%20des%20Tanneurs%2C%2037000%20Tours!5e0!3m2!1sfr!2sfr!4v1606582655567!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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
