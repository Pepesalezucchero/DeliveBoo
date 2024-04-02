<script></script>
<template>
	<footer style="background-color: #e69c23">
		<div class="container-fluid py-5">
			<div class="row py-3 d-flex justify-content-center">
				<div class="col-11 col-md-6 col-lg-3 col">
					<div class="card shadow-lg bg-white p-4 mb-4 mb-lg-0">
						<h4>Scopri DeliveBoo</h4>
						<ul>
							<li><a href="#">Invesitori</a></li>
							<li><router-link to="/service">Chi siamo</router-link></li>
							<li><a href="#">Ristoranti</a></li>
							<li><a href="#">Altro</a></li>
							<li><a href="#">Pressroom</a></li>
							<li><a href="#">Programmazione</a></li>
							<li><a href="#">Design</a></li>
						</ul>
					</div>
				</div>
				<div class="col-11 col-md-6 col-lg-3 col">
					<div class="card shadow-lg bg-white p-4 mb-4 mb-lg-0">
						<h4>Note legali</h4>
						<ul>
							<li><a href="#">Termini & Condizioni</a></li>
							<li><a href="#">Informativa sulla privacy</a></li>
							<li><a href="#">Cookies</a></li>
							<li><a href="#">Classificazione dei partner</a></li>
						</ul>
					</div>
				</div>
				<div class="col-11 col-md-6 col-lg-3 col">
					<div class="card shadow-lg bg-white p-4 mb-4 mb-lg-0">
						<h4>Aiuto</h4>
						<ul>
							<li><router-link to="/contact">Contatti</router-link></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Tipi di cucina</a></li>
						</ul>
					</div>
				</div>
				<div class="col-11 col-md-6 col-lg-3 col">
					<div class="card shadow-lg bg-white p-4 mb-4 mb-lg-0">
						<h4>Porta DeliveBoo con te</h4>
						<ul>
							<img src="..\..\public\img\Store-Download.png" alt="app-store" />
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>

<style scoped lang="scss">
a {
	color: #333;
	transition: 0.5s;
	&:hover {
		color: #e69c23;
	}
}

@media all and (min-width: 768px) {
	.card {
		height: 340px;
	}
	.container-fluid {
		width: 90%;
	}
}

@media all and (min-width: 576px) {
	img {
		max-width: 60%;
	}
}

@media all and (max-width: 576px) {
	img {
		max-width: 40%;
	}
	.container-fluid {
		width: 100%;
	}
}

li {
	margin: 10px 0;
}
</style>
