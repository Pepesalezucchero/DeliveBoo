<script>
import axios from "axios";
import { useRouter } from "vue-router";

import Menu from "../components/Menu.vue";
import TypologyNotFound from "../components/TypologyNotFound.vue";

export default {
	components: {
		Menu,
		TypologyNotFound,
	},
	data() {
		return {
			restaurants: [],
			// Array per memorizzare le tipologie
			typologies: [],
			// Array per memorizzare le tipologie selezionate
			selectedTypologies: [],
			// Copia la lista originale dei ristoranti
			originalRestaurants: [],
		};
	},
	methods: {
		getTypologies() {
			axios
				.get("http://localhost:8000/api/deliveboo/typologies")
				.then((res) => {
					this.typologies = res.data.typologies;
				})
				.catch((err) => {
					console.log(err);
				});
		},
		getRestaurants() {
			axios
				.get("http://localhost:8000/api/deliveboo/restaurants")
				.then((res) => {
					this.restaurants = res.data.restaurants;
					// Crea una copia della lista originale dei ristoranti
					this.originalRestaurants = [...res.data.restaurants];
				})
				.catch((err) => {
					console.log(err);
				});
		}, 
		// Metodo per ottenere i ristoranti dai dati del server
		filterRestaurants() {
			const selectedTypologiesNames = this.selectedTypologies.map(
				// Crea un array che contiene i nomi delle tipologie selezionate
				(typologyId) => {
					const typology = this.typologies.find(
						// Trova la tipologia corrispondente all'ID
						(typology) => typology.id === typologyId
					);
					// Restituisce il nome della tipologia, se trovata, altrimenti una stringa vuota
					return typology ? typology.name : "";
				}
			);
			// Aggiorna l'URL con le tipologie selezionate
			this.$router.push({ query: { typologies: selectedTypologiesNames } });

			// Se non ci sono tipologie selezionate, mostra tutti i ristoranti originali
			if (this.selectedTypologies.length === 0) {
				this.restaurants = [...this.originalRestaurants];
			} else {
				// altrimenti Filtra i ristoranti in base alle tipologie selezionate
				this.restaurants = this.originalRestaurants.filter((restaurant) => {
					return this.selectedTypologies.every((selectedTypology) =>
						restaurant.typologies.some(
							(typology) => typology.id === selectedTypology
						)
					);
				});
			}
		},
		getRestaurantImageUrl(restaurant) {
			return `http://localhost:8000/storage/${restaurant.image}`;
		}
	},
	mounted() {
		const router = useRouter();
		// Prendi le tipologie dall'URL
		const typologies = this.$route.query.typologies;

		if (typologies) {
			// Verifica se tutte le tipologie nell'URL sono valide
			const isValidTypologies = typologies.every((typology) => {
				// Controlla se esiste almeno una tipologia con lo stesso nome
				return this.typologies.some((t) => t.name === typology);
			});

			if (isValidTypologies) {
				// Se tutte le tipologie nell'URL sono valide Imposta le tipologie selezionate pplica i filtri ai ristoranti
				this.selectedTypologies = Array.isArray(typologies)
					? typologies
					: [typologies];
				this.filterRestaurants();
			} else {
				// Se almeno una tipologia nell'url non è valida
				router.push("/notfound");
			}
		} else {
			this.getTypologies();
			this.getRestaurants();
		}
	},
	watch: {
		selectedTypologies() {
			this.filterRestaurants();
		},
	},
};
</script>
<template>
	<div id="target-section" class="container-fluid p-0 m-0">
		<div class="row flex-wrap p-0 m-0">
			<div class="banner-pattern pt-5">
				<div class="d-flex flex-wrap justify-content-sm-center justify-content-lg-start ms-lg-4 ms-xl-0 justify-content-xl-center">
					<div
						class="mx-2"

						v-for="(typology, index) in typologies"
						:key="index"
					>	<div class="btn btn-light rounded-5 my-sm-3">
						<input
							type="checkbox"
							class="me-1 "
							v-model="selectedTypologies"
							:value="typology.id"
							style="padding: 10px;">
						<label for="name">{{ typology.name }}</label>
						</div>
					</div>
				</div>
				
				<div class="container-fluid">
				<div class="row pt-5">
					<div class="text-dark d-flex justify-content-center ms-md-5 ms-lg-3 ms-xl-2" >
						<p v-if="restaurants.length > 0">
							<p v-if="restaurants.length > 1">
								Trovati {{ restaurants.length }} ristoranti.
							</p>
							<p v-else> Trovato {{ restaurants.length }} ristorante. </p>
						</p>
						<p v-else>Nessun ristorante trovato.</p>
					</div>
				</div>
			</div>
				<div class="container-fluid">
					<div class="row flex-wrap gy-5 py-5">
						<div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-2 justify-content-center d-flex align-items-stretch" v-for="(restaurant, index) in restaurants"
						:key="index">
							<router-link :to="{
										name: 'menu',
										params: {
											id: restaurant.id,
											name: restaurant.name.toLowerCase().replace(/\s+/g, '-'),
										},
									}"
								>
								<div class="card shadow-lg">
									<img
										v-if="restaurant.image"
										:src="getRestaurantImageUrl(restaurant)"
										class="card-img-top" style="height: 200px;"
										alt="immagine ristoranti"
									/>
									<img
										v-else
										class="card-img-top" style="height: 200px;"
										src="../../public/img/ristodeliveboo.png"
										alt="immagine ristorante"
										
									/>
									<div class="card-body">
										<p class="card-tex d-inline" v-for="(typology, index) in restaurant.typologies"
											:key="index"
										>
											{{ typology.name }}</p>	
									</div>
								</div>
								<div class="text-box">
									<h5 class="card-title">{{ restaurant.name }}</h5>
								</div>
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
	.banner-pattern {
		background-image: url('../../public/img/wave.svg');
		background-repeat: no-repeat;
		background-position-x: center;
		background-size: cover;
		// overflow-x: hidden;
		height: auto;
		min-height: 629.2px;
		transition: .5s;
	
	}

	.card{
		width: 300px;
		height: 180px;
		overflow: hidden;
		border: none;
		border-radius: 15px;
		border-bottom-left-radius: 0px;
		border-bottom-right-radius: 0px;
		box-shadow: 0 6px 7px -4px gray;

		img {
			transition: 0.5s ease all;
		}

		img:hover {
			transform: scale(1.2);
		}
	}

	.card-img-top {
		position: relative;
	}

	.card-body {
		position: absolute;
		bottom: 10px;
		left: 10px;
		color: #fff;
		padding: 5px;
		background: #000000ae;
		border-radius: 10px;
		font-size: 13px;

		p {
			padding: 0 5px;
		}
	}

	.text-box {
		background: #1b3d42ee;
		border-radius: 15px;
		padding: 32px 10px 10px 10px;
		margin-top: -20px;
		color: #ffffff;

		.rate {
			margin-top: 5px;
			font-size: 14px;
		}
	}
	
	@media all and (max-width: 767px) {

		.card{
			width: 250px;
		}
		
	}
</style>
