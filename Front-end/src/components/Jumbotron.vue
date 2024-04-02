<script></script>
<template>
	<div class="jumbotron text-center text-white">
		<img src="../../public/img/cibo.jpg" alt="Restaurant-Image" />
		<div class="jumbotron-text">
			<h1>
				<strong>Benvenuti su Delive<span>Boo</span></strong>
			</h1>
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

	span {
		color: #e69c23;
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
			font-size: 5rem;
		}
		p {
			font-size: 1.8rem;
		}
		.btn {
			font-size: 20px;
		}
	}

	@media all and (max-width: 576px) {
		h1 {
			font-size: 3rem;
		}
		p {
			font-size: 1.1rem;
		}
		.btn {
			padding: 5px;
			font-size: 15px;
		}
	}

	.btn {
		// font-size: 25px;
		border: none;
		border-radius: 5px;
		background-color: #e69c23;
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
