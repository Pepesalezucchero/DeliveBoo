<script></script>
<template>
	<div class="jumbotron">
		<img src="../../public/img/cibo.jpg" alt="Restaurant-Image" />
		<div class="jumbotron-text">
			<h1>Benvenuti su Deliveboo</h1>
			<p>I piatti e i prodotti che ami, consegnati in pochissimo tempo</p>
			<a href="#target-section" class="btn">Scopri il nostro menu</a>
		</div>
	</div>
</template>

<style scoped lang="scss">
.jumbotron {
	position: relative;
	text-align: center;
	color: white;
	width: 100%;
	overflow: hidden;
	img {
		width: 100%;
		height: calc(100vh - 0px);
		object-fit: cover;
		object-position: center;
		filter: brightness(50%);
	}

	p {
		padding: 15px;
	}

	.jumbotron-text {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		h1 {
			font-size: 5rem;
			margin-bottom: 1rem;
		}
		p {
			font-size: 1.5rem;
			margin-bottom: 1rem;
		}
	}

	a.btn {
		font-size: 1.5rem;
		padding: 0.75rem 1.5rem;
		border: none;
		border-radius: 5px;
		background-color: #f68f00;
		color: white;
		text-decoration: none;
		transition: background-color 0.3s ease;

		&:hover {
			background-color: #000;
		}
	}
}
</style>
