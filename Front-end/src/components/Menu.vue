<script>
import axios from "axios";
export default {
	name: "Menu",
	data() {
		return {
			dishes: [],
		};
	},
	methods: {
		getDishes() {
			const restaurantId = this.$route.params.id;
			axios
				.get(
					`http://localhost:8000/api/deliveboo/restaurants/${restaurantId}/dishes`
				)
				.then((res) => {
					console.log(res.data);
					this.dishes = res.data.dishes;
				})
				.catch((err) => {
					console.log(err);
				});
		},
	},
	mounted() {
		this.getDishes();
	},
};
</script>

<template>
	<div class="container">
		<!-- <div class="row gy-3 mt-5">
			<h2 class="text-center">I nostri piatti: {{ dishes.length }}</h2>
			<div class="col-3" v-for="(dish, index) in dishes" :key="index">
				<div class="card">
					<img
						src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
						class="card-img-top"
						alt="immagine ristoranti"
					/>
					<div class="card-body">
						<h5 class="card-title">{{ dish.name }}</h5>
						<p class="card-text d-flex">{{ dish.price }} &euro;</p>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row mt-4 mb-5 align-items-center">
			<div class="col-4">
				<div class="img-container">
					<img src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg" alt="img-ristorante">
				</div>
			</div>
			<div class="col-8">
				<h2>Nome Ristorante</h2>
				<p class="type">Tipologie Ristorante</p>
			</div>
		</div>
		<div class="row justify-content-between">
			<div class="col-9 d-flex flex-wrap justify-content-between">
				<div class="col-12 col-md-6 d-flex align-items-center justify-content-between mb-4 dish" v-for="(dish, index) in dishes" :key="index">
					<div class="col-10 d-flex align-items-center">
						<div class="col-5 me-3">
							<div class="img-dish">
								<img src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg" alt="img piatto">
							</div>
						</div>
						<div class="col-5">
							<h4>{{ dish.name }}</h4>
							<p>{{ dish.price }} &euro;</p>
						</div>
						<div class="col-2">
							<i class="fa-solid fa-plus"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3 cart">
				Carrello
			</div>
		</div>
		
	</div>
</template>

<style scoped lang="scss">
.img-container{
	width: 100%;

	img{
		width: 100%;
	}
}

.dish{
	border: 1px solid black;
	padding: 10px;

	.img-dish{
		width: 100%;

		img{
			width: 100%;
		}
	}
	.fa-solid{
		border: 1px solid black;
		border-radius: 50%;
		padding: 10px;
		margin: 0 10px;
		font-size: 22px;
		cursor: pointer;
	}
}

.cart{
	text-align: center;
	border: 1px solid black;
	height: 200px;
}

</style>
