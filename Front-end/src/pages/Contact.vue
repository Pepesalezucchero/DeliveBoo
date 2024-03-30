<script>
import NavBar from "/src/components/NavBar.vue";

import Footer from "/src/components/Footer.vue";

export default {
	components: {
		NavBar,

		Footer,
	},
	methods: {
		toggleContainer() {
			this.isContainerOpen = !this.isContainerOpen;
		},
	},
	data() {
		return {
			isContainerOpen: false,
		};
	},
};
</script>

<template>
	<NavBar />
	<div class="sfondo"></div>
	<div id="cont-back">
		<div class="content">
			<h1>Contattaci</h1>
			<div class="cont-section">
				<div class="container">
					<ul>
						<li><a href="#Clienti">Clienti</a></li>
						<li><a href="#Rider">Rider</a></li>
						<li><a href="#Partner">Partner</a></li>
						<li><a href="#contatti-media">Contatti media</a></li>
					</ul>
				</div>

				<div class="container-text">
					<h2 id="Clienti">Clienti</h2>
					<b>Ho bisogno di aiuto per il mio ordine</b>
					<p>
						Il modo più rapido per ricevere assistenza è usare l'app o il sito
						web di DeliveBoo. Vai su <a href="#">Storico Ordini</a>, seleziona
						un ordine recente e usa la sezione Aiuto.
					</p>
					<b>Ho bisogno di aiuto per altro</b>
					<!--contenitore click -->
					<button @click="toggleContainer">Contattaci</button>
					<div
						class="hidden-container"
						:class="{ 'show-container': isContainerOpen }"
					>
						<div class="top-bar">
							<span>Contattaci</span>
							<button @click="toggleContainer">
								<i class="fa-solid fa-x fa-beat"></i>
							</button>
						</div>
						<div class="title-cont">
							<p>Seleziona il problema</p>
						</div>
						<div class="section-help">
							<p>Aiuto</p>
							<p>Digital Service Act Report</p>
						</div>
					</div>
					<h2 id="Rider">Rider</h2>
					<p>
						Hai delle domande e vuoi parlare con DeliveBoo?
						<a href="#">Clicca qui</a> per contattarci.
					</p>
					<h2 id="Partner">Partner</h2>
					<p>
						Per qualsiasi domanda o richiesta contattaci tramite la sezione
						Aiuto del tuo portale Hub. Se non sei ancora un partner,
						<a href="http://localhost:8000/">Clicca qui.</a>
					</p>
					<h2 id="contatti-media">Contatti media</h2>
					<p>
						Per citazioni, interviste o altre richieste da parte della stampa,
						invia un'e-mail a <a href="#">press@deliveboo.it.</a>
					</p>
					<p>
						Nota bene: purtroppo l'ufficio stampa non ha accesso alle
						informazioni sugli account, quindi non può offrire assistenza alle
						richieste dei clienti.
					</p>
					<p class="quote">
						Sede legale: DeliveBoo Italy S.R.L. Via Carlo Bo 11 Milano 20143
					</p>
				</div>
			</div>
		</div>
	</div>
	<Footer />
</template>

<style scoped lang="scss">
@use "../styles/contact.scss";

#cont-back {
	padding-top: 140px;
}
</style>
