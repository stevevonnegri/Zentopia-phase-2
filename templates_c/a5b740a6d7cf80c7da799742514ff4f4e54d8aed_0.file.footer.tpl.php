<?php
/* Smarty version 3.1.38, created on 2021-02-16 12:52:14
  from 'D:\MAMP\htdocs\zentopia\templates\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_602bbffec9df05_13513802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5b740a6d7cf80c7da799742514ff4f4e54d8aed' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\zentopia\\templates\\footer.tpl',
      1 => 1613467010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602bbffec9df05_13513802 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\MAMP\\htdocs\\zentopia\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<!-- Animation scroll-top avec icône -->
<a href="javascript:" id="scroll-top"><i class="fas fa-long-arrow-alt-up"></i></a>


<!-- SECTION FOOTER -->
<footer>
	
	<div class="container">

		
		<div class="row justify-content-center">

			<img src="assets/logos/logo_vertical_neg.png" width="250" height="250" alt="logo"/>

		</div>


		<div class="row justify-content-center footer-line1">
			
			&copy;<?php echo smarty_modifier_date_format(time(),"%Y");?>
 Zentopia. Tous droits réservés

		</div>


		<div class="row justify-content-center footer-line2">
			
			<div class="rs-logos-white"> 
				<a href="#"><i class="fab fa-youtube"></i></a>
				<a href="#"><i class="fab fa-instagram-square"></i></a>
				<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
			</div>

		</div>


		<div class="row justify-content-center footer-line3">
			
			<ul class="nav footer-main-links text-center">
				
				<li class="nav-item col-12 col-md"><a href="?action=plan_du_site">PLAN DU SITE</a></li>
				<li class="nav-item col-12 col-md"><a href="?action=reglement_interieur">RÈGLEMENT INTÉRIEUR</a></li>
				<li class="nav-item col-12 col-md"><a href="?action=mentions_legales">MENTIONS LEGALES</a></li>

			</ul>

		</div>

	</div>

</footer>

<!-- lien library Jquery -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"><?php echo '</script'; ?>
>

<!-- lien library Bootstrap JS -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"><?php echo '</script'; ?>
>

<!-- lien LESS -->
<?php echo '<script'; ?>
 src="//cdn.jsdelivr.net/npm/less@3.13" ><?php echo '</script'; ?>
>

<!-- lien Font Awesome -->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"><?php echo '</script'; ?>
>

<!-- lien Slick -->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="js/script.js"><?php echo '</script'; ?>
><?php }
}
