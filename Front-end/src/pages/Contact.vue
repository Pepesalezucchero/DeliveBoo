<script>
import NavBar from "/src/components/NavBar.vue";

import Footer from "/src/components/Footer.vue";

export default {
	components: {
		NavBar,

		Footer,
	},
};
</script>

<template>
	<NavBar />
	<div id="cont-back">
	  <div class="content">
		<h1>Contattaci</h1>
		<div class="cont-section">
			
		  <div class="container">
			<ul>
			  <li>Clienti</li>
			  <li>Rider</li>
			  <li>Partner</li>
			  <li>Contatti media</li>
			</ul>
		  </div>
		  
		  <div class="container-text">
			<h2>Clienti</h2>
			<b>Ho bisogno di aiuto per il mio ordine</b>
			<p>Il modo più rapido per ricevere assistenza è usare l’app o il sito web di Deliveboo. Vai su <a href="#" style="color: #04ccbb;">Storico Ordini</a>, seleziona un ordine recente e usa la sezione Aiuto.</p>
			<b>Ho bisogno di aiuto per altro</b>
			<button>Contattaci</button>
			<h2>Rider</h2>
			<p>Hai delle domande e vuoi parlare con Deliveboo? <a href="#" style="color: #04ccbb;">Clicca qui</a> per contattarci.</p>
			<h2>Partner</h2>
			<p>Per qualsiasi domanda o richiesta contattaci tramite la sezione Aiuto del tuo portale Hub. Se non sei ancora un partner, <a href="#"  style="color: #04ccbb;">Clicca qui.</a></p>
			<h2>Contatti media</h2>
			<p>Per citazioni, interviste o altre richieste da parte della stampa, invia un'e-mail a <a href="#"  style="color: #04ccbb;">press@deliveboo.it.</a></p>
			<p>Nota bene: purtroppo l'ufficio stampa non ha accesso alle informazioni sugli account, quindi non può offrire assistenza alle richieste dei clienti.</p>
			<p class="quote">Sede legale: Deliveboo Italy S.R.L. Via Carlo Bo 11 Milano 20143</p>
		  </div>

		</div>
	  </div>
	</div>
	<Footer />
  </template>

<style scoped lang="scss">
#cont-back{
	padding-top: 30px;
	background-color: #007E8A;
	padding-bottom: 15px;
}

.content{
	margin: 0 auto;
	width: 70%;
}

h1{
	color: white;
	font-size: 50px;
}

.cont-section{
	display: flex;
	font-size: 20px;
}

li{
	border-bottom: 1px lightgray solid;
	background-color: white;
	color: #037a6e;
	padding: 10px;
	cursor: pointer;
	&:hover{
		color: #04ccbb;
	}
}

.container{
	padding: 0;
	margin: 0;
	width: 40%;
}

.container-text{
	width: max-content;
	width: 60%;
	background-color: #fff;
	margin-left: 15px;
	margin-bottom: 15px;
	padding: 30px;
}

button{
	padding: 8px;
	border: none;
	background-color: #00a396;
	color: white;
	display: block;
	margin-bottom: 15px;
}

.quote {
    transform: skew(10deg);
}

@media screen and (max-width: 768px) {
	.cont-section{
		flex-direction: column;
		align-items: center;
	}

	.container-text{
		margin-left: 0;
		margin-top: 15px;
	}

	h1{
		width: 52%;
		margin: 0 auto;
		margin-bottom: 40px;
		font-size: 60px;
	}
	
}
</style>
