<script></script>
<template>
	<div class="wrapper">
		<div class="side left">
			<router-link to="/homepage">
				<div class="image delivery"></div>
				
				<div class="caption">
					<h1>Delivery</h1>
					<p>I piatti e i prodotti che ami, consegnati in pochissimo tempo.</p>
					<a class="button" href="#">See our products</a>
				</div>
			</router-link>
		</div>
		
		<div class="logo-section">
			<img src="../../public/Restaurant-logo.png" alt="">
		</div>

		<div class="side right">
			<div class="image business"></div>

			<div class="caption">
				<h1>Business</h1>
				<p>Raggiungi più clienti con Deliveboo.</p>
				<a class="button" href="http://localhost:8000/">Become a partner</a>
			</div>

		</div>
	</div>
</template>

<style scoped lang="scss">

	a {
		text-decoration: none;
	}

	.wrapper {
		position: relative;

		.logo-section {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 20;

			img {
				max-width: 200px;
				height: auto;
			}
		}
		.image {
			width: 100%;
			height: 100%;
			background-size: cover;
			background-position: center;
			position: absolute;
			top: 0;
			left: 0;
			transition: 0.5s ease all;
		}
		
		.delivery {
			background-image: url('../../public/pizza_wallpaper.jpg');
		}

		.business {
			background-image: url('../../public/restaurant-business-wallpaper.jpg');
		}

		.caption {
			position: relative;
			z-index: 10;
			color: #ffff;
			text-align: center;

			h1 {
				text-transform: uppercase;
				font-size: 50px;
				margin-bottom: 20px;
				letter-spacing: 0.10em;
			}

			p {
				font-size: 15px;
				margin-bottom: 30px;
				color: #dddddd;
			}

			.button {
				background: #f49302;
				color: #ffff;
				font-weight: 600;
				padding: 1em 2em;
				font-size: 1em;
				text-transform: uppercase;
				letter-spacing: 0.10em;
				transition: 0.5s ease all;
			}

			.button:hover {
				background: #ffff;
				color: #000;
			}
		}
	}
	
	.wrapper .left,
	.wrapper .right {
		width: 100%;
		height: 50vh;
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		overflow: hidden;
		cursor: pointer;
	}

	.wrapper .side::before {
		background: linear-gradient(0deg, rgba(0,0,0,0.6979166666666667) 0%, rgba(0,0,0,0.5) 100%);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 1;
		content: '';
		display: block;
	}

	.wrapper .left:hover .image,
	.wrapper .right:hover .image {
		transform: scale(1.2);
	}
	

	@media screen and (min-width:1200px) {
		
		.wrapper {
			display: flex;
			position: relative;

			.logo-section {
			position: absolute;
			top: 15%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 20;

				img {
					max-width: 300px;
					height: auto;
				}
			}
		}

		.wrapper .left,
		.wrapper .right {
			width: 50%;
			height: 100vh;
		}
	}
</style>










