<script>
import NavBar from "/src/components/NavBar.vue";

import Footer from "/src/components/Footer.vue";
export default {
	components: {
		NavBar,

		Footer,
	},
};
</script>
<template>
	<NavBar />

	<div class="jumbotron">
		<div class="wrapper">
			<div class="jumbo-image">
				<img src="../../public/about-img.png" />
			</div>

			<div class="text">
				<div class="title">Il gusto della Qualità a Domicilio</div>

				<div class="paragraph">
					Benvenuti in Deliveboo, la tua destinazione per un'esperienza
					culinaria straordinaria, comodamente consegnata alla tua porta. Siamo
					qui per trasformare la tua cena in un'esperienza memorabile,
					offrendoti una vasta gamma di delizie culinarie da ristoranti locali e
					partner di qualità.
				</div>
				<div class="paragraph">
					Il nostro viaggio è iniziato con la semplice missione di rendere
					l'accesso a cibo di alta qualità più facile che mai. Ci siamo
					impegnati a collegare i clienti con i migliori ristoranti della città,
					garantendo una vasta gamma di opzioni per soddisfare ogni palato e
					desiderio culinario.
				</div>

				<div class="paragraph">
					Ciò che ci distingue è il nostro impegno per la qualità, la
					convenienza e il servizio eccezionale. Collaboriamo solo con
					ristoranti accuratamente selezionati che utilizzano ingredienti
					freschi e di alta qualità per creare piatti deliziosi e soddisfacenti.
				</div>
				<router-link to="/">
					<div class="link">
						<a class="button" href="#">Explore more &#11166;</a>
					</div>
				</router-link>
			</div>
		</div>
	</div>

	<div class="section-title">
		<div class="wrapper">
			<h1>
				Our
				<span>Speciality</span>
			</h1>
		</div>
	</div>

	<main>
		<div class="wrapper">
			<div class="layout-flex">
				<div class="col">
					<div class="card border-burger">
						<div class="icon icon-burger">
							<i class="fa-solid fa-burger"></i>
						</div>
						<h2 class="card__title burger-title">
							Hamburger gourmet artigianali
						</h2>
						<p>
							Questa specialità si concentra su hamburger artigianali realizzati
							con carne di alta qualità, condimenti freschi e ingredienti
							gourmet. Può includere varianti come hamburger con formaggi
							speciali, salse fatte in casa, e aggiunte innovative come bacon
							candito o cipolle caramellate.
						</p>
						<img
							class="overlap"
							src="../../public/hamburger-speciality.jpg"
							alt=""
						/>
					</div>
				</div>
				<div class="col">
					<div class="card border-pizza">
						<div class="icon icon-pizza">
							<i class="fa-solid fa-pizza-slice"></i>
						</div>
						<h2 class="card__title pizza-title">Pizze al taglio gourmet</h2>
						<p>
							Offrendo una selezione di pizze al taglio gourmet, questa
							specialità potrebbe includere opzioni come pizza con ingredienti
							locali e di stagione, pizze speciali con formaggi artigianali e
							condimenti unici, e anche pizze vegetariane e vegane.
						</p>
						<img
							class="overlap"
							src="../../public/pizza-speciality.jpg"
							alt=""
						/>
					</div>
					<div class="card border-sushi">
						<div class="icon icon-sushi">
							<img src="../../public/sushi.png" alt="" />
						</div>
						<h2 class="card__title">Sushi di alta qualità</h2>
						<p>
							Concentrandosi sulla qualità e sulla freschezza, questa specialità
							offre una vasta gamma di sushi fresco e di alta qualità, compresi
							sushi rolls tradizionali, nigiri, sashimi e specialità creative
							del sushi chef.
						</p>
						<img
							class="overlap"
							src="../../public/sushi-speciality.jpg"
							alt=""
						/>
					</div>
				</div>
				<div class="col">
					<div class="card border-pepper">
						<div class="icon icon-pepper">
							<i class="fa-solid fa-pepper-hot"></i>
						</div>
						<h2 class="card__title pepper-title">Cucina messicana autentica</h2>
						<p>
							Questa specialità si concentra sulla cucina messicana autentica,
							offrendo piatti come tacos, burritos, enchiladas, e quesadillas,
							preparati con autentici sapori e ingredienti freschi, accompagnati
							da guacamole fatto in casa e salse piccanti.
						</p>
						<img
							class="overlap"
							src="../../public/burritos-speciality.jpg"
							alt=""
						/>
					</div>
				</div>
			</div>
		</div>
	</main>

	<Footer />
</template>
<style scoped lang="scss">
.jumbotron {
	padding-top: 80px;
	background: #1c1e28;
	width: 100%;

	.wrapper {
		display: flex;
		width: 80%;
		margin: 0 auto;
		padding: 100px 0;
		align-items: center;

		.jumbo-image img {
			width: 500px;
		}

		.text {
			margin-left: 120px;
			text-align: justify;

			.title {
				font-size: 50px;
				font-weight: bold;
				font-style: italic;
				margin-bottom: 25px;
				color: #fff;
			}

			.paragraph {
				font-size: 18px;
				margin-bottom: 20px;
				color: #c3c3c3;
			}

			.link {
				margin-top: 50px;

				.button {
					background: #f68f00;
					color: #000;
					padding: 15px 30px;
					border-radius: 40px;
					text-decoration: none;
					text-transform: uppercase;
					font-weight: 600;
					font-size: 14px;
					letter-spacing: 0.1em;
					transition: 0.5s ease all;
				}

				.button:hover {
					color: #fff;
					box-shadow: 0 0 5px #f68f00, 0 0 20px #f68f00;
				}
			}
		}
	}
}

h1,
h2,
h3 {
	line-height: 1.2;
	font-weight: bold;
}

main {
	padding-bottom: 50px;
}

.wrapper {
	width: 80%;
	margin: 0 auto;
	padding: 50px 0;
	align-items: center;
}

.section-title {
	text-align: center;

	span {
		color: #f68f00;
		font-weight: bold;
	}
}

.layout-flex {
	gap: 2rem;
	display: grid;
}

.layout-flex > * {
	flex: 1;
}

.col {
	display: grid;
	align-content: center;
	gap: 2rem;
}

.card {
	--br: 0.325rem;
	padding: 2rem;
	position: relative;
	border-top: var(--br) solid;
	border-radius: var(--br);
	box-shadow: 0 1rem 1.5rem -0.5rem rgb(0 0 100 / 0.15);
	text-align: center;
	cursor: pointer;
}

.card .overlap {
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
	width: 100%;
	height: 100%;
	transition: 0.5s ease all;
}

.card:hover .overlap {
	opacity: 1;
}

.card__title {
	font-size: 25px;
	margin: 20px 0;
}

.burger-title {
	color: hsl(0, 70%, 60%);
}

.pizza-title {
	color: hsl(34, 89%, 65%);
}

.pepper-title {
	color: hsl(212, 75%, 62%);
}

.icon {
	display: flex;
	justify-content: center;
	margin-top: 2rem;
	font-size: 60px;
}

.icon-sushi {
	img {
		width: 100px;
	}
}

.icon-burger {
	color: hsl(0, 70%, 60%);
}

.icon-pizza {
	color: hsl(34, 89%, 65%);
}

.icon-pepper {
	color: hsl(212, 75%, 62%);
}

.border-burger {
	border-color: hsl(0, 70%, 60%);
}

.border-pizza {
	border-color: hsl(34, 89%, 65%);
}

.border-sushi {
	border-color: var(--clr-yellow);
}

.border-pepper {
	border-color: hsl(212, 75%, 62%);
}

/* Media Query */

/* Tablet */
@media (max-width: 1200px) {
	.jumbotron {
		.wrapper {
			display: block;
			align-items: center;

			.jumbo-image {
				text-align: center;
			}

			.text {
				margin: 0;

				.title {
					text-align: center;
					margin-top: 40px;
				}

				.link {
					text-align: center;
				}
			}
		}
	}
}

@media (min-width: 1200px) {
	.layout-flex {
		grid-template-columns: 1fr 1fr 1fr;
	}
}
</style>
