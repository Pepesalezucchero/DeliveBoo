<script>
import { store } from "../store";
import axios from "axios";
export default {
	data() {
		return {
			store,
			restaurants: [],
			typologies: [],
		};
	},
	methods: {
		// getTypologies() {
		// 	axios
		// 		.get("http://localhost:8000/api/deliveboo/typologies")
		// 		.then((res) => {
		// 			console.log(res.data);
		// 			this.typologies = res.data.typologies;
		// 		})
		// 		.catch((err) => {
		// 			console.log(err);
		// 		});
		// },
	},
	mounted() {
		axios
			.get("http://localhost:8000/api/deliveboo/restaurants")
			.then((res) => {
				console.log(res.data);
				this.restaurants = res.data.restaurants;
			})
			.catch((err) => {
				console.log(err);
			});

		axios
			.get("http://localhost:8000/api/deliveboo/typologies")
			.then((res) => {
				console.log(res.data);
				this.typologies = res.data.typologies;
			})
			.catch((err) => {
				console.log(err);
			});
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
					v-for="(typologies, index) in typologies"
					:key="index"
				>
					<input type="checkbox" class="me-1" name="" value="" />
					<label class="me-4" for="name">{{ typologies.name }}</label>
				</div>
			</div>
			<div class="row gy-4">
				<div
					class="col-sm-6 col-md-4 col-lg-3 border d-flex justify-content-center"
					v-for="(restaurant, index) in restaurants"
					:key="index"
				>
					<div class="card">
						<img
							src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
							class="card-img-top"
							alt="immagine ristoranti"
						/>
						<div class="card-body">
							<h5 class="card-title">{{ restaurant.name }}</h5>
							<p
								v-for="(typology, index) in restaurant.typologies"
								:key="index"
								class="card-text"
							>
								{{ typology.name }}
							</p>
							<a href="#" class="btn btn-primary">vedi piatti</a>
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
