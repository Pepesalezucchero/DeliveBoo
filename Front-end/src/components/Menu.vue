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
	<div class="my-container d-flex">
		<div class="col-restaurant">
			<div class="container">
				<div class="row py-5">
					<div
						class="col-12 d-flex justify-content-evenly align-items-center height-vh"
					>
						<img
							v-if="$route.params.image"
							src=""
							class="borders"
							alt="immagine ristoranti"
						/>
						<img
							v-else
							src="../../public/img/ristodeliveboo.png"
							alt="immagine ristorante"
							style="width: 230px"
						/>
						<h2 class="">
							{{ formatRestaurantName($route.params.name) }}
						</h2>
					</div>
				</div>
				<div class="row scroll">
					<div
						class="col-12 py-3 d-flex justify-content-between align-items-center ps-5"
						v-for="(dish, index) in dishes"
						:key="index"
					>
						<div class="image w-25 me-5 shadow-lg">
							<img
								v-if="dish.image"
								src="https://www.blubasilico.com/wp-content/uploads/2020/06/parmigiana-light-blog.jpg"
								class="border"
								alt="immagine piatti"
								style="width: 100%"
							/>
							<img
								v-else
								class="border"
								src="../../public/img/piattodeliveboo.png"
								alt="immagine piatti"
								style="width: 280px"
							/>
						</div>
						<div class="details w-25">
							<h5>{{ dish.name }}</h5>
							<p>{{ dish.price }} &euro;</p>
						</div>
						<div class="plus ms-5 w-25">
							<i
								class="fa-solid fa-plus plus-border"
								@click="addToCart(dish)"
							></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-cart">
			<div class="container">
				<div class="row py-5">
					<div class="col-12 text-center">
						<div v-if="cart.length == 0">
							<h3 class="">Il tuo carrello è vuoto</h3>
							<i class="fa-solid fa-cart-shopping"></i>
						</div>

						<div v-else>
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
										<p v-if="item.quantity > 0" class="px-2">
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
								class="btn btn-primary mb-sm-3"
							>
								Riepilogo ordine
							</router-link>
							<button class="btn btn-primary mb-sm-3 ms-2" @click="clearCart">
								Svuota carrello
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal" v-if="showConfirmationModal">
				<div class="modal-content text-center">
					<p>Sei sicuro di voler rimuovere questo elemento dal carrello?</p>
					<div class="modal-buttons">
						<button class="btn btn-secondary" @click="cancelRemove">No</button>
						<button class="btn btn-warning" @click="removeItem">Sì</button>
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
						<button class="btn btn-warning width-button" @click="clearCart()">
							Svuota carrello
						</button>
						<button class="btn btn-secondary" @click="cancelAddToCart()">
							Annulla
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
.col-restaurant {
	width: calc(100% - 30%);
	height: 100vh;
	background-color: #e69c23;
}
.height-vh {
	height: 15vh;
}
.scroll {
	overflow-y: auto;
	height: 72vh;
	scrollbar-width: none;
}
.col-cart {
	background-color: #e69c23;
	width: 30%;
	border: 1px solid black;
}

.plus-border {
	border: 1px solid black;
	padding: 5px;
	border-radius: 50%;
	cursor: pointer;
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
}

.modal-buttons button:hover {
	background-color: #f0f0f0;
	color: black;
}
</style>
