<script>
import axios from "axios";
import Menu from "../components/Menu.vue";

export default {
	components: {
		Menu,
	},
	data() {
		return {
			restaurants: [],
			typologies: [],
			selectedTypologies: [],
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
				})
				.catch((err) => {
					console.log(err);
				});
		},
		filterRestaurants() {
			// Se non sono selezionate tipologie, mostro tutti i ristoranti
			if (this.selectedTypologies.length === 0) {
				this.getRestaurants();
			} else {
				// Filtro i ristoranti in base alle tipologie selezionate
				this.restaurants = this.restaurants.filter((restaurant) => {
					// Verifica se il ristorante contiene tutte le tipologie selezionate
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
		this.getTypologies();
		this.getRestaurants();
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
					<div class="card d-flex flex-column">
						<img
							src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
							class="card-img-top"
							alt="immagine ristoranti"
						/>
						<div class="card-body">
							<h5 class="card-title pt-2" style="">
								{{ restaurant.name }}
							</h5>
							<div class="typology" style="height: 150px">
								<p
									v-for="(typology, index) in restaurant.typologies"
									:key="index"
									class="card-text d-inline"
								>
									#{{ typology.name }}
								</p>
							</div>
							<div class="d-block" style="height: 50px">
								<router-link
									:to="{
										name: 'menu',
										params: {
											id: restaurant.id,
											name: restaurant.name.toLowerCase().replace(/\s+/g, '-'),
										},
									}"
									class="btn btn-primary"
								>
									Vedi menù
								</router-link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
@use "../styles/restaurant";
</style>
