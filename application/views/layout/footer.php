<footer>
	<div class="container footer-wrapper">
		<p class="footer-text">
			© Copyright 2021 Lynton. All rights reserved.
		</p>
	</div>
	<div>
		<svg viewBox="0 0 120 28">
			<defs>
				<filter id="goo">
					<feGaussianBlur in="SourceGraphic" stdDeviation="1" result="blur" />
					<feColorMatrix in="blur" mode="matrix" values="
           1 0 0 0 0  
           0 1 0 0 0  
           0 0 1 0 0  
           0 0 0 13 -9" result="goo" />
					<xfeBlend in="SourceGraphic" in2="goo" />
				</filter>
				<path id="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
			</defs>

			<use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2"></use>
			<use id="wave2" class="wave" xlink:href="#wave" x="0" y="0"></use>


			<g class="gooeff" filter="url(#goo)">

				<circle class="drop drop1" cx="1.2" cy="5.4" r="8.8" />
				<circle class="drop drop2" cx="5.2" cy="5.1" r="7.5" />
				<circle class="drop drop3" cx="10.2" cy="5.3" r="9.2" />
				<circle class="drop drop4" cx="3.2" cy="5.4" r="8.8" />
				<circle class="drop drop5" cx="14.2" cy="5.1" r="7.5" />
				<circle class="drop drop6" cx="17.2" cy="4.8" r="9.2" />
				<use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />
			</g>

		</svg>
	</div>

</footer>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" src="<?= base_url('assets/'); ?>js/library/three.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>js/library/three-orbit-controls.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>js/library/three-mesh-line.js"></script>

<script src="<?= base_url('assets/'); ?>js/library/slick.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/library/gsap-min.js"></script>
<script src="<?= base_url('assets/'); ?>js/library/aos.js"></script>


<script src="<?= base_url('assets/'); ?>js/navbar.js"></script>



<script type="text/javascript" src="<?= base_url('assets/'); ?>js/vanilla-tilt.js"></script>
<script src="<?= base_url('assets/'); ?>js/library/boostrap.min.js"></script>
<?php if ($url == 'home') : ?>
	<script src="<?= base_url('assets/'); ?>js/globe.js"></script>
<?php elseif ($url == 'tenant') : ?>
	<script src="<?= base_url('assets/'); ?>vendor/particles.js-master/dist/particles.min.js"></script>
	<script>
		var particles = Particles.init({
			selector: '.background-particles',
			color: '#DA0463',
			responsive: [{
				breakpoint: 768,
				options: {
					maxParticles: 200,
					color: '#48F2E3',
					connectParticles: false
				}
			}, {
				breakpoint: 425,
				options: {
					maxParticles: 100,
					connectParticles: true
				}
			}, {
				breakpoint: 320,
				options: {
					maxParticles: 0

					// disables particles.js
				}
			}]
		});
	</script>
<?php else : ?>
<?php endif; ?>

<script>
	AOS.init();
	const counters = document.querySelectorAll('.tenant-counter');
	const speed = 200; // The lower the slower

	counters.forEach(counter => {
		const updateCount = () => {
			const target = +counter.getAttribute('data-target');
			const count = +counter.innerText;

			const inc = target / speed;

			if (count < target) {
				counter.innerText = count + inc;
				setTimeout(updateCount, 1);
			} else {
				counter.innerText = target;
			}
		};

		updateCount();
	});


	$('.event-slider-wrapper').slick({
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		arrows: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


	$('.event-section-slider').slick({
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		arrows: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


	VanillaTilt.init(document.querySelectorAll(".card-home"), {
		max: 20,
		speed: 400,
		glare: true,
		"max-glare": 1,
	});

	//It also supports NodeList
	VanillaTilt.init(document.querySelectorAll(".card-home"));
</script>

</body>

</html>