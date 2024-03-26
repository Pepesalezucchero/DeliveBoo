<script>
import OrderRecap from "./OrderRecap.vue";
import axios from "axios";
import NavBar from "./NavBar.vue";
export default {
	name: "Menu",
	components: {
		OrderRecap,
		NavBar,
	},
	data() {
		return {
			dishes: [],
			cart: [],
			quantity: 1,
			restaurant: this.$route.params,
			showConfirmationModal: false,
			itemIndexToRemove: null,
			currentRestaurantId: null,
			showRestaurantCartModal: false,
		};
	},
	methods: {
		getDishes() {
			const restaurantId = this.$route.params.id;
			this.currentRestaurantId = restaurantId;
			axios
				.get(
					`http://localhost:8000/api/deliveboo/restaurants/${restaurantId}/dishes`
				)
				.then((res) => {
					console.log(res.data);
					this.dishes = res.data.dishes;
					this.loadCartFromLocalStorage();
				})
				.catch((err) => {
					console.log(err);
				});
		},
		addToCart(dish) {
			// se il carrello è vuoto o se restaurant_id non è uguale per tutti i piatti del carrello allora mando avviso
			if (
				this.cart.length === 0 ||
				this.cart.every((item) => item.restaurant_id === dish.restaurant_id)
			) {
				const existingCartItemIndex = this.cart.findIndex(
					(item) => item.id === dish.id
				);

				if (existingCartItemIndex !== -1) {
					this.cart[existingCartItemIndex].quantity++;
				} else {
					const cartItem = Object.assign({}, dish); // Clono l'oggetto dish
					cartItem.quantity = 1; // Imposto la quantità iniziale a 1
					this.cart.push(cartItem);
				}

				// Salva il carrello nel localStorage
				this.saveCartToLocalStorage();
			} else {
				this.showRestaurantCartModal = true;
			}
		},
		increaseQuantity(index) {
			this.cart[index].quantity++;
			this.saveCartToLocalStorage();
		},
		decreaseQuantity(index) {
			if (this.cart[index].quantity > 1) {
				this.cart[index].quantity--;
				this.saveCartToLocalStorage();
			} else {
				this.itemIndexToRemove = index;
				this.cart[index].quantity = 0;
				this.showConfirmationModal = true;
				this.saveCartToLocalStorage();
			}
		},
		removeItem() {
			this.cart.splice(this.itemIndexToRemove, 1);
			this.showConfirmationModal = false;
			localStorage.clear(); //elimino i dati dal localstorage quando tolgo il piatto dal carrello
		},
		cancelRemove() {
			this.showConfirmationModal = false;
			this.cart[this.itemIndexToRemove].quantity = 1;
		},
		calcTotal() {
			let total = 0;
			for (let i = 0; i < this.cart.length; i++) {
				// moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
				total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
			}
			return total.toFixed(2); // mostra solo due cifre dopo la virgola
		},
		saveCartToLocalStorage() {
			localStorage.setItem("cart", JSON.stringify(this.cart)); // salva il carrello come stringa JSON nel localStorage
		},
		loadCartFromLocalStorage() {
			const savedCart = localStorage.getItem("cart"); // ottiene il carrello salvato dal localStorage
			if (savedCart) {
				this.cart = JSON.parse(savedCart); // se ci sono dati nel localStorage, li carica nel carrello del componente
			}
		},
		clearCart() {
			this.cart = [];
			localStorage.clear();
			this.showRestaurantCartModal = false;
		},
		cancelAddToCart() {
			this.showRestaurantCartModal = false;
		},
		capitalizeFirstLetter(string) {
			return string.charAt(0).toUpperCase() + string.slice(1);
		},
		formatRestaurantName(name) {
			const capitalized = this.capitalizeFirstLetter(name);
			return capitalized.replace(/-/g, " ");
		},
		getDishImageUrl(dish) {
			return `http://localhost:8000/storage/${dish.image}`;
		},
		getRestaurantImageUrl(restaurant) {
    		return `http://localhost:8000/storage/${this.restaurant.image}`;
		}
	},
	mounted() {
		this.getDishes();
		// carica il carrello dal localStorage quando la pagina viene caricata
		this.loadCartFromLocalStorage();
	},
};
</script>

<template>
	<NavBar />
	<section>
		<div class="container-fluid">
				<h2 class="mt-5 mt-sm-3 mb-5 mb-sm-3 text-center rest-name">
					{{ formatRestaurantName($route.params.name) }}
				</h2>

			<!-- CARRELLO -->
			<div class="col-3 shadow-lg cart mt-4 py-3 text-center position-fixed">
				<h3 class="">
					{{ formatRestaurantName($route.params.name) }}
				</h3>
				<div v-if="cart.length == 0">
					<h3>Il tuo carrello è vuoto</h3>
					<i class="fa-solid fa-cart-shopping"></i>
				</div>

				<div v-else>
					<h5 class="mb-3">Il tuo ordine</h5>
				</div>
				<div class="row">
					<div
						class="col-12 text-center"
						v-for="(item, index) in cart"
						:key="index"
					>

						<p class="">{{ item.name }} - {{ item.price }}&euro;</p>

						<div
							style="height: 30px"
							class="d-flex justify-content-center align-item-center my-2"
						>
							<i
								class="fa-solid fa-minus mt-1"
								@click="decreaseQuantity(index)"
							></i>
							<p class="mb-1 mx-2" v-if="item.quantity > 0">
								{{ item.quantity }}
							</p>
							<span v-else class="item-quantity mx-2">0</span>
							<i
								class="fa-solid fa-plus mt-1"
								@click="increaseQuantity(index)"
							></i>
						</div>
					</div>
					<div v-if="cart.length > 0">
						<h6 class="my-3">Totale {{ calcTotal() }} &euro;</h6>

						<router-link to="/order" class="btn btn-secondary mb-sm-3">
							Riepilogo ordine
						</router-link>
						<button
							class="btn btn-secondary mb-sm-3 ms-xl-2"
							@click="clearCart"
						>
							Svuota carrello
						</button>
					</div>
				</div>
			</div>

			<!-- MENU -->
			<div class="row pb-5 menu">
				<div
					class="col-lg-12 d-flex flex-wrap align-items-center justify-content-around px-sm-5 py-3"
					v-for="(dish, index) in dishes"
					:key="index"
				>
					<div class="col-md-12 col-lg-5 col-xl-3 text-sm-center text-lg-start">
						<img
							v-if="dish.image"
							:src="getDishImageUrl(dish)"
							class="rounded-circle"
							alt="immagine piatti"
							style="width: 130px"
						/>
						<img
							v-else
							class="rounded-circle"
							src="../../public/img/piattodeliveboo.png"
							alt="immagine piatti"
							style="width: 120px"
						/>
					</div>
					<div class="col-md-12 col-lg-7 text-sm-center pt-sm-2">
						<h5>{{ dish.name }}</h5>

						<p class="font-size">{{ dish.description }}</p>
					</div>
					<div
						class="plus col-lg-3 offset-lg-5 offset-xl-4 col-md-12 d-flex justify-content-center align-items-center"
						style="height: 40px"
					>
						<p class="mt-3 mx-3">{{ dish.price }} &euro;</p>
						<i
							class="fa-solid fa-plus plus-border me-lg-2"
							@click="addToCart(dish)"
						></i>
					</div>
				</div>
			</div>

			<div class="modal" v-if="showConfirmationModal">
				<div class="modal-content text-center">
					<p>Sei sicuro di voler rimuovere questo elemento dal carrello?</p>
					<div class="modal-buttons">
						<button class="btn btn-secondary px-5" @click="removeItem">
							Sì
						</button>
						<button class="btn btn-secondary px-5" @click="cancelRemove">
							No
						</button>
					</div>
				</div>
			</div>
			<!-- modal di avviso mono carrello e opzione svuota carrello -->
			<div class="modal" v-if="showRestaurantCartModal">
				<div class="modal-content text-center">
					<p>
						Non è possibile aggiungere piatti di diversi ristoranti allo stesso
						carrello.
					</p>
					<div class="modal-buttons">
						<button class="btn btn-secondary" @click="clearCart()">
							Svuota carrello
						</button>
						<button class="btn btn-secondary" @click="cancelAddToCart()">
							Annulla
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style scoped lang="scss">
section {
	background: linear-gradient(to bottom, #87ceeb 10%, #ffa500 100%);
	color: white;
	padding-top: 80px;

	p,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		color: #333;
	}
}

.rounded-circle {
	scale: 1;
	transition: 1s;
	&:hover {
		scale: 1.2;
	}
}

.container-fluid {
	width: 80%;
}
.menu {
	width: 78%;
}
.rest-name{
	font-size: 40px;
}
.cart {
	padding: 10px;
	height: auto;
	top: 30%;
	right: 2%;
	border: 1px solid white;
	border-radius: 20px;
	background: white;
}

@media all and (max-width: 991px) {
	.cart {
		top: 32%;
		width: 30%;
	}
}

@media all and (max-width: 768px) {
	.cart {
		top: 32%;
		width: 34%;
		right: 1%;
	}
}

@media all and (max-width: 576px) {
	.cart {
		right: 2%;
		top: 32%;
		width: 35%;
	}
}

.plus-border {
	border: 1px solid #333;
	padding: 4px;
	border-radius: 50%;
	cursor: pointer;
}

.fa-solid {
	cursor: pointer;
	color: #333;
}
.modal {
	width: 100%;
	display: block;
	animation: slide-in 0.5s linear;
}
@keyframes slide-in {
	from {
		top: -20%;
		opacity: 0;
	}
	to {
		top: 0;
		opacity: 1;
	}
}

.font-size {
	font-size: 15px;
}

// 	/* Stili per il modal */
.modal-content {
	height: 130px;
	padding: 20px;
	position: absolute;
	top: 0;
	color: white;
	background: linear-gradient(to top, #87ceeb 10%, #ffa500 100%);
	border-radius: 0;
	border: 0;
	border-bottom: 1px solid black;
}

.modal-buttons button {
	cursor: pointer;
	margin: 0 30px;
}

.btn {
	transition: 0.5s;
	&:hover {
		background-color: #e69c23;

		color: black;
	}
}
</style>
