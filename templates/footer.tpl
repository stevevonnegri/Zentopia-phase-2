
<!-- Animation scroll-top avec icône -->
<a href="javascript:" id="scroll-top"><i class="fas fa-long-arrow-alt-up"></i></a>


<!-- SECTION FOOTER -->
<footer>
	
	<div class="container">

		
		<div class="row justify-content-center">

			<img src="assets/logos/logo_vertical_neg.png" width="250" height="250" alt="logo"/>

		</div>


		<div class="row justify-content-center footer-line1">
			
			&copy;{$smarty.now|date_format:"%Y"} Zentopia. Tous droits réservés

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

	{if ($_SESSION['cookieAccepter'] == Accepter || $_SESSION['cookieRefuser'] == Refuser)}

	{else}
	
		<div class="cookies-bg">
				
			<div class="container">

				<form class="form-row justify-content-between" method="post" action="#">
				
					<div class="col-8">
						
						<p>Notre site utilise des cookies afin de vous garantir une expérience de navigation optimale. Consultez notre <a href="?action=reglement_interieur">politique de confidentialité</a> pour en savoir plus.</p>

					</div>

					<div class="col-2">
						
						<button class="btn btn-primary shadow-none" name="cookieAccepte" type="submit">J'ACCEPTE</button>

					</div>

					<div class="col-2">
						
						<button class="btn btn-primary shadow-none" name="cookieRefuse" type="submit">JE REFUSE</button>

					</div>

				</form>

			</div>

		</div>

	{/if}

</footer>

<!-- lien library Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- lien library Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- lien LESS -->
<script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>

<!-- lien Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>

<!-- lien Slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- lien ReCAPTCHA Google -->
<script src="https://www.google.com/recaptcha/api.js?"></script>

<!-- lien custom JS -->
<script type="text/javascript" src="assets/js/script.js"></script>