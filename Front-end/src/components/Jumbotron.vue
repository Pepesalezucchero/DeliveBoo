<script></script>
<template>
	<div class="jumbotron">
		<img src="../../public/img/cibo.jpg" alt="Restaurant-Image">
		<div class="jumbotron-text">
			<h1>Benvenuti su Deloveboo</h1>
			<p>Scopri i sapori autentici dei nostri ristoranti e prenota ora per un'esperienza gastronomica indimenticabile.</p>
			<a href="#menu" class="btn ">Scopri il nostro menu</a>
		</div>
	</div>

</template>

<style scoped lang="scss">
.jumbotron {
	position: relative;
	text-align: center;
	color: white;
	height: 100vh;
	width: 100%;
	overflow: hidden;
	img {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100vh;
		object-fit: cover;
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
			font-size: 3rem;
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
            background-color: #7F4C22;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;

            &:hover {
                background-color: #a03b17;
            }

            &:active {
                background-color: #ee5a24;
                transform: scale(0.95);
            }
        }
}
</style>
