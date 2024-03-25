<script>
import axios from 'axios';
// import Payment from './Payment.vue';
export default {
	name: "OrderRecap",
	components:{
		// Payment
	},
	data() {
		return {
			cart: [],
			order:{
				address:'',
				date:'',
				amount:'',
				customer_name:'',
				customer_email: '',
				customer_phone: '',
				// dishes: ''
			},
		};
	},
	methods: {
		calcTotal() {
			let total = 0;
			for (let i = 0; i < this.cart.length; i++) {
				// moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
				total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
			}
			return total.toFixed(2); // mostra solo due cifre dopo la virgola
		},
		postOrder(){
			const orderData = {
				address: this.order.address,
				date: this.order.date,
				amount: this.order.amount,
				customer_name: this.order.customer_name,
				customer_email: this.order.customer_email,
				customer_phone: this.order.customer_phone,
				// dishes: this.cart
			};
			console.log(orderData);
			axios.post('http://localhost:8000/api/deliveboo/orders', orderData)
				.then((res) => {
					console.log(res.data);
				})
				.catch((err) =>{
					console.log(err);
				})

			this.order.address = '';
			this.order.date = '';
			this.order.amount = '';
			this.order.customer_name = '';
			this.order.customer_email = '';
			this.order.customer_phone = '';
			// Svuota il carrello
			// localStorage.removeItem('cart');
			// this.cart = [];
		},
	},
	created() {
		const storedCart = localStorage.getItem('cart');
    	if (storedCart) {
			// Se ci sono, carica i dettagli del carrello
			this.cart = JSON.parse(storedCart);
		}

		this.order.date = new Date().toISOString().slice(0, 19).replace('T', ' ');
		this.order.amount = this.calcTotal();
	},
	mounted(){
		const button = document.querySelector('#submit-button');
		const self = this;

		braintree.dropin.create({
			authorization: "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpGVXpJMU5pSXNJbXRwWkNJNklqSXdNVGd3TkRJMk1UWXRjMkZ1WkdKdmVDSXNJbWx6Y3lJNkltaDBkSEJ6T2k4dllYQnBMbk5oYm1SaWIzZ3VZbkpoYVc1MGNtVmxaMkYwWlhkaGVTNWpiMjBpZlEuZXlKbGVIQWlPakUzTVRFME5EY3hORGNzSW1wMGFTSTZJamsxWldFelptUmtMVEZsTlRFdE5EQTNOaTA0TXpkbExXRXdNamMxWWpFelpHRXdOU0lzSW5OMVlpSTZJblIzYlhaeGVETjNNM0J1YWpOeWNITWlMQ0pwYzNNaU9pSm9kSFJ3Y3pvdkwyRndhUzV6WVc1a1ltOTRMbUp5WVdsdWRISmxaV2RoZEdWM1lYa3VZMjl0SWl3aWJXVnlZMmhoYm5RaU9uc2ljSFZpYkdsalgybGtJam9pZEhkdGRuRjRNM2N6Y0c1cU0zSndjeUlzSW5abGNtbG1lVjlqWVhKa1gySjVYMlJsWm1GMWJIUWlPbVpoYkhObGZTd2ljbWxuYUhSeklqcGJJbTFoYm1GblpWOTJZWFZzZENKZExDSnpZMjl3WlNJNld5SkNjbUZwYm5SeVpXVTZWbUYxYkhRaVhTd2liM0IwYVc5dWN5STZlMzE5LlIwc2sxRFBzQlBEdHNyTFhsVlFIS1JFQXZ4OUxPLVltRE9oVkVCak0xdlY0OENJZHN3eGt6amN4eXJycl9uMFRzZU9ETVJpTWVIc3FaM1cyQU9KT0Z3IiwiY29uZmlnVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzL3R3bXZxeDN3M3BuajNycHMvY2xpZW50X2FwaS92MS9jb25maWd1cmF0aW9uIiwiZ3JhcGhRTCI6eyJ1cmwiOiJodHRwczovL3BheW1lbnRzLnNhbmRib3guYnJhaW50cmVlLWFwaS5jb20vZ3JhcGhxbCIsImRhdGUiOiIyMDE4LTA1LTA4IiwiZmVhdHVyZXMiOlsidG9rZW5pemVfY3JlZGl0X2NhcmRzIl19LCJjbGllbnRBcGlVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvdHdtdnF4M3czcG5qM3Jwcy9jbGllbnRfYXBpIiwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwibWVyY2hhbnRJZCI6InR3bXZxeDN3M3BuajNycHMiLCJhc3NldHNVcmwiOiJodHRwczovL2Fzc2V0cy5icmFpbnRyZWVnYXRld2F5LmNvbSIsImF1dGhVcmwiOiJodHRwczovL2F1dGgudmVubW8uc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbSIsInZlbm1vIjoib2ZmIiwiY2hhbGxlbmdlcyI6W10sInRocmVlRFNlY3VyZUVuYWJsZWQiOnRydWUsImFuYWx5dGljcyI6eyJ1cmwiOiJodHRwczovL29yaWdpbi1hbmFseXRpY3Mtc2FuZC5zYW5kYm94LmJyYWludHJlZS1hcGkuY29tL3R3bXZxeDN3M3BuajNycHMifSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImJpbGxpbmdBZ3JlZW1lbnRzRW5hYmxlZCI6dHJ1ZSwiZW52aXJvbm1lbnROb05ldHdvcmsiOnRydWUsInVudmV0dGVkTWVyY2hhbnQiOmZhbHNlLCJhbGxvd0h0dHAiOnRydWUsImRpc3BsYXlOYW1lIjoibXlzZWxmIiwiY2xpZW50SWQiOm51bGwsImJhc2VVcmwiOiJodHRwczovL2Fzc2V0cy5icmFpbnRyZWVnYXRld2F5LmNvbSIsImFzc2V0c1VybCI6Imh0dHBzOi8vY2hlY2tvdXQucGF5cGFsLmNvbSIsImRpcmVjdEJhc2VVcmwiOm51bGwsImVudmlyb25tZW50Ijoib2ZmbGluZSIsImJyYWludHJlZUNsaWVudElkIjoibWFzdGVyY2xpZW50MyIsIm1lcmNoYW50QWNjb3VudElkIjoibXlzZWxmIiwiY3VycmVuY3lJc29Db2RlIjoiRVVSIn19",
			container: '#dropin-container'
		}, function (err,instance) {
			if (err) {
				console.error(err);
				return;
			}
			
			button.addEventListener('click', function () {
				instance.requestPaymentMethod(function (payload) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost:8000/api/payments',
						data: {
							'token': payload.nonce,
							'amount' : self.order.amount
						}
					}).done(function(result) {
						instance.teardown(function (teardownErr) {
							if (teardownErr) {
								console.error('Could not tear down Drop-in UI!');
							} else {
								console.info('Drop-in UI has been torn down!');
								$('#submit-button').remove();
							}
						});

						if (result.success) {
							$('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
						} else {
							console.log(result);
							$('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
						}
					});
				});
			});
		});
	}
}

</script>


<template>
	<div class="container">
		<h2 class="mt-3">Riepilogo ordine</h2>

		<!-- Visualizza i dettagli del carrello -->
		<div v-if="cart.length > 0">
			<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantità</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in cart" :key="index">
                        <td>{{ item.name }}</td>
                        <td>{{ item.price }} &euro;</td>
                        <td>{{ item.quantity }}</td>
                    </tr>
                </tbody>
            </table>
			<h4>Totale: {{ calcTotal() }} &euro;</h4>
		</div>

		<!-- Messaggio se il carrello è vuoto -->
		<div v-else>
			<p>Il carrello è vuoto</p>
		</div>

		<div class="mt-5">
			<h3>Inserisci i tuoi dati:</h3>
			<form class="needs-validation" novalidate @submit.prevent="postOrder()">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_name">Nome e Cognome:</label>
							<input type="text" name="customer_name" id="customer_name" class="form-control" v-model="order.customer_name" required>
							<div class="invalid-feedback">
								Inserisci il tuo Nome e Cognome.
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_email">Email:</label>
							<input type="email" name="customer_email" id="customer_email" class="form-control" v-model="order.customer_email" required>
							<div class="invalid-feedback">
								Inserisci un'email valida.
							</div>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_phone">Telefono:</label>
							<input type="text" name="customer_phone" id="customer_phone" class="form-control" v-model="order.customer_phone" required>
							<div class="invalid-feedback">
								Inserisci il tuo numero di telefono.
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_phone">Indirizzo:</label>
							<input type="text" name="address" id="address" class="form-control" v-model="order.address" required>
							<div class="invalid-feedback">
								Inserisci il tuo indirizzo.
							</div>
						</div>
					</div>
					<div class="col-md-6 d-none">
						<div class="form-group">
							<label for="customer_phone">Data:</label>
							<input type="text" name="date" id="date" class="form-control" v-model="order.date" required readonly>
							<div class="invalid-feedback">
								Inserisci la data di oggi.
							</div>
						</div>
					</div>
					<div class="col-md-6 d-none">
						<div class="form-group">
							<label for="customer_phone">Totale:</label>
							<input type="text" name="amount" id="amount" class="form-control" v-model="order.amount" required readonly>
							<div class="invalid-feedback">
								Inserisci l'importo.
							</div>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<div class="form-group">
							<label for="dishes">Prodotti:</label>
							<input type="text" name="dishes" id="dishes" class="form-control" v-model="order.dishes" required>
							<div class="invalid-feedback">
								Inserisci l'importo.
							</div>
						</div>
					</div> -->
				</div>

				<!-- pagamento -->
				<div class="mt-2" id="dropin-wrapper">
					<div id="checkout-message"></div>
					<div id="dropin-container"></div>
					<button id="submit-button">Invia Ordine</button>
				</div>

				<button type="submit" class="btn btn-primary mt-3">Invia Ordine</button>
			</form>
      	</div>
	</div>
</template>

<style scoped lang="scss"></style>
