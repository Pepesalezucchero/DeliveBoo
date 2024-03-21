<script>
import OrderRecap from "./OrderRecap.vue";
import axios from "axios";
export default {
	name: "Menu",
	components: {
		OrderRecap,
	},
	data() {
		return {
			dishes: [],
			cart: [],
			quantity: 1,
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
		},
		decreaseQuantity(index) {
			if (this.cart[index].quantity > 1) {
				this.cart[index].quantity--;
			} else {
				this.itemIndexToRemove = index;
				this.cart[index].quantity = 0;
				this.showConfirmationModal = true;
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
	},
	mounted() {
		this.getDishes();
		// carica il carrello dal localStorage quando la pagina viene caricata
		this.loadCartFromLocalStorage();
	},
};
</script>

<template>
	<div class="container py-5">
		<div class="row pb-3 d-flex align-item-center justify-content-between">
			<div
				class="col-sm-12 border col-lg-7 border justify-content-md-center d-flex align-item-center"
			>
				<img
					v-if="$route.params.image"
					src=""
					class="card-img-top"
					alt="immagine ristoranti"
				/>
				<img
					v-else
					src="../../public/img/ristodeliveboo.png"
					alt="immagine ristorante"
					style="width: 450px"
				/>
			</div>
			<div class="col-sm-12 col-lg-5 text-center details-restaurant">
				<h2 class="pt-4 ms-xl-5 ps-xxl-5">
					{{ formatRestaurantName($route.params.name) }}
				</h2>
				<p class="type pb-4 ms-xl-5">Tipologie Ristorante</p>
				<div class="row">
					<div class="col-12 py-4 cart-container">
						<div v-if="cart.length == 0">
							<h3 class="">Il tuo carrello è vuoto</h3>
							<i class="fa-solid fa-cart-shopping"></i>
						</div>

						<div class="cart-position" v-else>
							<h3 class="mb-3">Il tuo ordine</h3>
							<div class="row justify-content-center">
								<div
									class="col-12 d-flex justify-content-center"
									v-for="(item, index) in cart"
									:key="index"
								>
									<div class="col-6">
										<p>{{ item.name }} - {{ item.price }} &euro;</p>
									</div>

									<div
										style="height: 10px"
										class="d-flex justify-content-center align-item-center ms-4"
									>
										<i
											class="fa-solid fa-minus mt-1"
											@click="decreaseQuantity(index)"
										></i>
										<p v-if="item.quantity > 0" class="item-quantity px-2">
											{{ item.quantity }}
										</p>
										<span v-else class="item-quantity px-2">0</span>
										<i
											class="fa-solid fa-plus mt-1"
											@click="increaseQuantity(index)"
										></i>
									</div>
								</div>
							</div>
							<h4 class="my-3">Totale {{ calcTotal() }} &euro;</h4>
							<router-link
								:to="{
									name: 'order',
									params: {
										cartDetails: JSON.stringify(
											cart.map((item) => ({
												name: item.name,
												price: item.price,
											}))
										),
									},
								}"
								class="btn btn-primary"
							>
								Riepilogo ordine
							</router-link>
							<button class="btn btn-primary ms-5" @click="clearCart">
								Svuota carrello
							</button>
						</div>
						<!-- modal di conferma rimozione elemento dal carrello -->

						<div class="modal" v-if="showConfirmationModal">
							<div class="modal-content">
								<p>
									Sei sicuro di voler rimuovere questo elemento dal carrello?
								</p>
								<div class="modal-buttons">
									<button class="btn btn-secondary" @click="cancelRemove">
										No
									</button>
									<button class="btn btn-warning" @click="removeItem">
										Sì
									</button>
								</div>
							</div>
						</div>

						<!-- modal di avviso mono carrello e opzione svuota carrello -->
						<div class="modal" v-if="showRestaurantCartModal">
							<div class="modal-content">
								<p>
									Non è possibile aggiungere piatti di diversi ristoranti allo
									stesso carrello.
								</p>
								<div class="modal-buttons">
									<button @click="cancelAddToCart()">Annulla</button>
									<button @click="clearCart()">Svuota carrello</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row justify-content-between">
			<div
				class="col-7 border d-flex justify-content-between py-3"
				v-for="(dish, index) in dishes"
				:key="index"
			>
				<img
					v-if="dish.image"
					src="https://www.blubasilico.com/wp-content/uploads/2020/06/parmigiana-light-blog.jpg"
					class="card-img-top"
					alt="immagine piatti"
					style="max-width: 35%"
				/>
				<img
					v-else
					src="../../public/img/piattodeliveboo.png"
					alt="immagine piatti"
					style="width: 35%"
				/>
				<h5>{{ dish.name }}</h5>
				<p>{{ dish.price }} &euro;</p>

				<i class="fa-solid fa-plus" @click="addToCart(dish)"></i>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
.cart-container {
	// background-color: #e69c23;
	overflow-y: auto;
	height: 370px;
}

.cart-position {
	border-radius: 10px;
	background-color: #dd9915;
	padding: 20px 9px;
}
@media screen and (max-width: 576px) {
	.cart-position {
		position: static;
	}
}
@media screen and (min-width: 992px) {
	.cart-position {
		width: 35%;
		position: fixed;
		top: 25%;
		right: 40px;
	}
}
@media screen and (min-width: 1200px) {
	.cart-position {
		width: 39%;
		position: fixed;
		top: 25%;
		right: 24px;
	}
}

@media screen and (min-width: 1400px) {
	.cart-position {
		width: 39%;
		position: fixed;
		top: 25%;
		right: 24px;
	}
}
@media screen and (min-width: 1600px) {
	.cart-position {
		width: 39%;
		position: fixed;
		top: 25%;
		right: 50px;
	}
}
.modal {
	position: absolute;
	top: 0;
	right: 50%;
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

// 	/* Stili per il modal */
.modal-content {
	background-color: #dd9915;
	padding: 20px;
	border-radius: 5px;
	position: absolute;
	top: 0;
	border: 1px solid black;
	color: white;
}

.modal-buttons button {
	border: none;
	cursor: pointer;
	margin: 0 30px;
	width: 100px;
}

.modal-buttons button:hover {
	background-color: #f0f0f0;
	color: black;
}
</style>
