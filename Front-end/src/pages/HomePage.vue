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
		}, // Metodo per ottenere i ristoranti dai dati del server
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
	<div class="container py-5">
		<div class="row">
			<h2 class="text-center pb-3">Cosa vuoi mangiare?</h2>
			<div class="col-12 d-flex justify-content-center flex-wrap">
				<div
					class="choices pb-sm-3 pb-lg-0"
					v-for="(typology, index) in typologies"
					:key="index"
				>
					<input
						type="checkbox"
						class="me-1"
						v-model="selectedTypologies"
						:value="typology.id"
					/>
					<label class="me-4" for="name">{{ typology.name }}</label>
				</div>
			</div>
			<div class="row gy-4">
				<div
					class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center transition"
					v-for="(restaurant, index) in restaurants"
					:key="index"
				>
					<router-link
						:to="{
							name: 'menu',
							params: {
								id: restaurant.id,
								name: restaurant.name.toLowerCase().replace(/\s+/g, '-'),
							},
						}"
					>
						<img
							src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
							class="card-img-top"
							alt="immagine ristoranti"
						/>
						<div class="card-body">
							<h5 class="card-title pt-2" style="color: black">
								{{ restaurant.name }}
							</h5>
							<div class="typology" style="height: 80px; color: black">
								<p
									v-for="(typology, index) in restaurant.typologies"
									:key="index"
									class="card-text d-inline"
								>
									#{{ typology.name }}
								</p>
							</div>
						</div>
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss"></style>
