<script></script>
<template>
	<div class="jumbotron text-center text-white">
		<img src="../../public/img/cibo.jpg" alt="Restaurant-Image" />
		<div class="jumbotron-text border">
			<h1>Benvenuti su Deliveboo</h1>
			<p>I piatti e i prodotti che ami, consegnati in pochissimo tempo</p>
			<a href="#target-section" class="btn rounded-3">Scopri il nostro menu</a>
		</div>
	</div>
</template>

<style scoped lang="scss">
.jumbotron {
	position: relative;
	width: 100%;

	img {
		width: 100%;
		height: calc(100vh - 0px);
		object-fit: cover;

		filter: brightness(50%);
	}

	p {
		padding: 15px;
	}

	.jumbotron-text {
		width: 85%;
		position: absolute;
		top: 55%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	@media all and (min-width: 768px) {
		h1 {
			font-size: 7rem;
		}
		p {
			font-size: 2.5rem;
		}
		.btn {
			font-size: 30px;
		}
	}

	@media all and (max-width: 576px) {
		h1 {
			font-size: 3.5rem;
		}
		p {
			font-size: 1.2rem;
		}
		.btn {
			padding: 5px;
			font-size: 15px;
		}
	}

	.btn {
		// font-size: 25px;
		border: none;

		background-color: #f68f00;
		color: white;
		text-decoration: none;
		transition: 0.5s;
		padding: 10px;

		&:hover {
			color: #333;
		}
	}
}
</style>
