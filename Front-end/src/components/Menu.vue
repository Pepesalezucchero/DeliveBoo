<script>
import OrderRecap from "./OrderRecap.vue";
import axios from "axios";
import NavBar from "./NavBar.vue";
import CartBurger from "./CartBurger.vue";
import Cart from "./Cart.vue";
export default {
	name: "Menu",
	components: {
		OrderRecap,
		NavBar,
		CartBurger,
		Cart,
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
			changing: 0,
			visibility: false,
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
				this.$emit("svuotaCarrello");
				this.showRestaurantCartModal = true;
			}
			this.changing++;
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

		// removeItem() {
		// 	this.cart.splice(this.itemIndexToRemove, 1);
		// 	this.showConfirmationModal = false;
		// 	localStorage.clear(); //elimino i dati dal localstorage quando tolgo il piatto dal carrello
		// },

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
			this.$emit("carrello-aggiornato");
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
			this.changing++;
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
		},
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
	<Cart :changing="changing" @carrelloCancellato="clearCart" />
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h2
						class="mt-sm-3 me-md-5 me-lg-0 ms-lg-4 me-xl-5 me-sm-4 mb-4 text-center fs-1"
					>
						{{ formatRestaurantName($route.params.name) }}
					</h2>
				</div>
			</div>

			<!-- MENU -->
			<div class="row pb-5 menu">
				<div
					class="col-lg-12 d-flex flex-wrap align-items-center justify-content-around px-sm-5 py-3"
					v-for="(dish, index) in dishes"
					:key="index"
				>
					<div class="col-12 text-center">
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
					<div class="col-md-12 col-lg-12 text-sm-center pt-sm-2">
						<h5>{{ dish.name }}</h5>

						<p class="font-size">{{ dish.description }}</p>
					</div>
					<div
						class="plus col-12 d-flex justify-content-center align-items-center"
						style="height: 40px"
					>
						<i
							class="fa-solid fa-plus plus-border"
							@click="addToCart(dish)"
						></i>
						<p class="mt-3 mx-3">{{ dish.price }} &euro;</p>
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
	background-image: url("../../public/img/bg.png");
	background-position-y: 15%;
	padding-top: 130px;
	background-repeat: no-repeat;
	background-size: cover;
}

.rounded-circle {
	scale: 1;
	transition: 1s;
	&:hover {
		scale: 1.2;
	}
}

.container-fluid {
	width: 90%;
}
// .menu {
// 	width: 78%;
// }

.cart {
	z-index: 200;
	overflow-y: scroll;
	padding: 10px;
	height: auto;
	min-height: 100px;
	max-height: 400px;
	overflow-x: scroll;
	top: 30%;
	left: 2%;
	border: 1px solid white;
	border-radius: 20px;
	background: white;
}
.cart::-webkit-scrollbar {
	display: none;
}
.cart {
	scrollbar-width: none;
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

.font-size {
	font-size: 15px;
}

// 	/* Stili per il modal */
.modal {
	display: block;
	animation: slide-in 0.4s linear;
	position: fixed;
	top: 0%;
	right: 0%;
	width: 100%;
	margin: 0 auto;
	height: 140px;
	color: white;
	border-radius: 0;
	border: 0;
}
.modal-content {
	padding: 20px;
	background-color: #333;
	border: 0;
	border-radius: 0;

	border: 0;
}
@keyframes slide-in {
	from {
		top: -10%;
		opacity: 0;
	}
	to {
		top: 0%;
		opacity: 1;
	}
}

.modal-buttons button {
	cursor: pointer;
	margin: 0 30px;
	background-color: #e69c23;
}

.btn {
	transition: 0.5s;
	&:hover {
		color: black;
	}
}
@media all and (max-width: 576px) {
	.cart {
		right: 2%;
		top: 30%;
		width: 35%;
		z-index: 100;
	}
}

@media all and (max-width: 768px) {
	.cart {
		top: 30%;
		width: 30%;
		right: 2%;
	}
}

@media all and (max-width: 991px) {
	.cart {
		top: 30%;
		width: 30%;
		right: 2%;
	}
}
</style>
