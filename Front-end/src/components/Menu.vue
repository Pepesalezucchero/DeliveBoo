<script>
import axios from "axios";
export default {
	name: "Menu",
	data() {
		return {
			dishes: [],
			cart: [],
			quantity: 1,
			showConfirmationModal: false,
      		itemIndexToRemove: null,
			currentRestaurantId: null
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
			const existingCartItemIndex = this.cart.findIndex(item => item.id === dish.id);

			if (existingCartItemIndex !== -1) {
				this.cart[existingCartItemIndex].quantity++;
			} else {
				const cartItem = Object.assign({}, dish); // Clono l'oggetto dish
				cartItem.quantity = 1; // Imposto la quantità iniziale a 1
				this.cart.push(cartItem);
			}
			// salva il carrello nel localStorage
			this.saveCartToLocalStorage();
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
		calcTotal(){
			let total = 0;
			for (let i = 0; i < this.cart.length; i++) {
				// moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
				total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
			}
			return total.toFixed(2); // mostra solo due cifre dopo la virgola
		},
		saveCartToLocalStorage() {
			localStorage.setItem('cart', JSON.stringify(this.cart)); // salva il carrello come stringa JSON nel localStorage
		},
		loadCartFromLocalStorage() {
			const savedCart = localStorage.getItem('cart'); // ottiene il carrello salvato dal localStorage
			if (savedCart) {
				this.cart = JSON.parse(savedCart);	// se ci sono dati nel localStorage, li carica nel carrello del componente
			}
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
							<i class="fa-solid fa-minus" @click="decreaseQuantity(index)"></i>
							<span v-if="item.quantity > 0" class="item-quantity">{{ item.quantity }}</span>
							<span v-else class="item-quantity">0</span>
							<i class="fa-solid fa-plus" @click="increaseQuantity(index)"></i>
						</div>
					</div>
					<h4 class="mt-3">Totale {{ calcTotal() }} &euro;</h4>
					
					<!-- modal di conferma rimozione elemento dal carrello -->
					<div class="modal" v-if="showConfirmationModal">
						<div class="modal-content">
							<p>Sei sicuro di voler rimuovere questo elemento dal carrello?</p>
							<div class="modal-buttons">
								<button @click="removeItem">Sì</button>
								<button @click="cancelRemove">No</button>
							</div>
						</div>
					</div>
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

	.item-quantity{
		padding: 0 3px;
	}
	.fa-minus, .fa-plus{
		font-size: 10px;
		border: 1px solid black;
		border-radius: 50%;
		padding: 3px;
		vertical-align: 3px;
	}
	
	/* Stili per il modal */
	.modal {
		position: fixed;
		top: 0;
		left: 35%;
		width: 30%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.modal-content {
		background-color: #dd9915;
		padding: 20px;
		border-radius: 5px;
	}

	.modal-buttons {
		display: flex;
		justify-content: center;
		margin-top: 10px;
	}

	.modal-buttons button {
		padding: 8px 16px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		margin-right: 10px;
	}

	.modal-buttons button:hover {
		background-color: #f0f0f0;
	}
}



</style>
