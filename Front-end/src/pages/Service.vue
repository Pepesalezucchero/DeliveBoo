<script>
import NavBar from "/src/components/NavBar.vue";
import Cart from "../components/Cart.vue";
import Footer from "/src/components/Footer.vue";
export default {
	components: {
		NavBar,
		Cart,
		Footer,
	},
};
</script>

<template>
    <NavBar />
    <div class="principal-container">
        <h1>Team Di Sviluppo</h1>
        <p>Boolean Classe #112</p>
        
        <div class="card-container">
            <div class="card">
                <div class="card-body">
					<div class="cont-img">
					<img src="../../public/img/foto-alessiorugi.jpg" alt=""></div>
                    <h5 class="card-title">Alessio Rugi</h5>
					<div class="cont-contact">
						<a href="https://www.linkedin.com/in/alessio-rugi-b2a8942b8/"><i class="fa-brands fa-linkedin"></i></a>
						<a href="https://github.com/Pepesalezucchero"><i class="fa-brands fa-github"></i></a>
					</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
					<div class="cont-img">
						<img src="../../public/img/img-domenico.jpg" alt="">	
					</div>
                    <h5 class="card-title">Domenico Lella</h5>
					<div class="cont-contact">
						<a href="https://www.linkedin.com/domenico"><i class="fa-brands fa-linkedin"></i></a>
						<a href="https://github.com/Domenico-lel"><i class="fa-brands fa-github"></i></a>
					</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
					<div class="cont-img">
						<img src="../../public/img/img-lucagarizio.jfif" alt="">	
					</div>
                    <h5 class="card-title">Luca Garizio</h5>
					<div class="cont-contact">
						<a href="https://www.linkedin.com/in/luca-garizio-1839122b8/"><i class="fa-brands fa-linkedin"></i></a>
						<a href="https://github.com/LucaGarizio"><i class="fa-brands fa-github"></i></a>
					</div>
                </div>
            </div>
			<div class="card">
                <div class="card-body">
					<div class="cont-img">
						<img src="../../public/img/foto-sara.jpeg" alt="">
					</div>
                    <h5 class="card-title">Sara Affro</h5>
					<div class="cont-contact">
						<a href="https://www.linkedin.com/in/sara-affro-0ba8992b8/"><i class="fa-brands fa-linkedin"></i></a>
						<a href="https://github.com/saraaffro"><i class="fa-brands fa-github"></i></a>
					</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
					<div class="cont-img">
						<img src="../../public/img/foto-lucapassione.jpg" alt="">
					</div>
                    <h5 class="card-title">Luca Pessione</h5>
					<div class="cont-contact">
						<a href="https://www.linkedin.com/in/luca-pessione/"><i class="fa-brands fa-linkedin"></i></a>
						<a href="https://github.com/imLukePex"><i class="fa-brands fa-github"></i></a>
					</div>
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>

<style scoped lang="scss">
@use "../styles/service.scss";
</style>