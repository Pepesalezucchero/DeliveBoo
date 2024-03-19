<script>
import axios from "axios";
export default {
	name: "Menu",
	data() {
		return {
			dishes: [],
			cart: [],
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
		addToCart(dish){
			console.log('aggiunto al carrello il piatto', dish.name);
			this.cart.push(dish);
		},
		increaseQuantity(index) {
			this.cart[index].quantity++;
		},
		decreaseQuantity(index) {
			if (this.cart[index].quantity > 1) {
				this.cart[index].quantity--; 
			}
		},
		calcTotal(){
			let total = 0;
			for (let i = 0; i < this.cart.length; i++) {
				// moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
				total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
			}
			return total.toFixed(2); // mostra solo due cifre dopo la virgola
		}
	},
	mounted() {
		this.getDishes();
	},
};
</script>

<template>
	<div class="container">
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
							<i class="fa-solid fa-plus" @click="addToCart(dish)"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3 cart">
				<div v-if="cart.length == 0">
					<h3 class="text-center">Il tuo carrello è vuoto</h3>
					<i class="fa-solid fa-cart-shopping"></i>
				</div>
				<div v-else>
					<h3 class="text-center">Il tuo ordine</h3>
					<div class="row align-items-end" v-for="(item, index) in cart" :key="index">
						<div class="col-9">
							{{ item.name }} - {{ item.price }} &euro;
						</div>
						<div class="col-3">
							<i class="fa-solid fa-minus" @click="increaseQuantity(index)"></i>
							<span>{{ quantity }}</span>
							<i class="fa-solid fa-plus" @click="decreaseQuantity(index)"></i>
						</div>
					</div>
					<h4 class="mt-3">Totale {{ calcTotal() }} &euro;</h4>
				</div>
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
	border: 1px solid black;
	height: auto;
	padding: 10px;

	.fa-solid{
		font-size: 40px;
		margin-top: 20px;
		text-align: center;
	}

	.quantity{
	
	}
	.fa-minus, .fa-plus{
		font-size: 10px;
		border: 1px solid black;
		border-radius: 50%;
		padding: 3px;
		vertical-align: 3px;
	}
	
}

</style>
