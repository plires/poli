<header class="transition">

	<div class="container-fluid">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
			
					<a class="branding transition" href="./">
						<h1 class="transition">PABLO GRANADÉ</h1>
					</a>

					<div id="toggleIcon" class="transition">
						<i id="hamburger" class="fas fa-bars transition"></i>
					</div>

					<section id="menu" class="transition">

						<div class="rrss">
		          <a 
		          	rel="noopener" 
		          	target="_blank" 
		          	href="mailto:<?= EMAIL_CLIENT ?>"><i class="transition fa-solid fa-envelope"></i>
	          	</a>
		          <a 
		          	rel="noopener" 
		          	target="_blank" 
		          	href="<?= RRSS_INSTAGRAM ?>"><i class="transition fa-brands fa-instagram-square"></i>
		          </a>
		        </div>

						<nav>

							<ul id="navigation">
								<li>
									<?php $res = $current == 'work' ? 'active' : ''; ?>
									<a class="<?= $res ?> transition" href="./">Work</a>
								</li>

								<li>
									<?php $res = $current == 'contact' ? 'active' : ''; ?>
									<a class="<?= $res ?> transition" href="./contact.php">Contact</a>
								</li>

							</ul>

							<a rel="noopener" target="_blank" href="http://www.rebolucion.com/">
								<img class="img-fluid rebolucion_menu transition" src="./img/rebolucion-menu.png" alt="rebolucion menu">
							</a>

						</nav>

					</section>
					
				</div>
				
			</div>
		</div>
		
	</div>

</header>