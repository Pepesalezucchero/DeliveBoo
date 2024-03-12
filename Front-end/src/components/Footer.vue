<script></script>
<template>
	<footer class="bg-dark text-light">
		<div class="shape-img">
			<img src="../../public/img/shape-top.png" />
		</div>
		<div class="container">
			<div class="row my_flex equal-column">
				<!-- Prima colonna -->
				<div class="col-md-3 col-sm-6 my-color-table mx-2">
					<h3>Scopri Deliveboo</h3>
					<ul class="list-unstyled">
						<li><a href="#">Invesitori</a></li>
						<li><a href="#">Chi siamo</a></li>
						<li><a href="#">Ristoranti</a></li>
						<li><a href="#">Altro</a></li>
						<li><a href="#">Pressroom</a></li>
						<li><a href="#">Programmazione</a></li>
						<li><a href="#">Design</a></li>
						<li><a href="#">Lavora con noi</a></li>
						<li><a href="#">Diventa nostro partner</a></li>
					</ul>
				</div>

				<!-- Seconda colonna -->
				<div class="col-md-3 col-sm-6 my-color-table mx-2">
					<h3>Note legali</h3>
					<ul class="list-unstyled">
						<li><a href="#">Termini & Condizioni</a></li>
						<li><a href="#">Informativa sulla privacy</a></li>
						<li><a href="#">Cookies</a></li>
						<li><a href="#">Classificazione dei partner</a></li>
						<li>
							<a href="#"> Richieste da parte delle Autorita' Publiche</a>
						</li>
					</ul>
				</div>

				<!-- Terza colonna -->
				<div class="col-md-3 col-sm-6 my-color-table mx-2">
					<h3>Aiuto</h3>
					<ul class="list-unstyled">
						<li><a href="#">Contatti</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Tipi di cucina</a></li>
					</ul>
				</div>

				<!-- Quarta colonna -->
				<div class="col-md-3 col-sm-6 my-color-table mx-2">
					<h3>Porta Deliveboo con te</h3>
					<ul class="list-unstyled">
						<img src=".\public\img\Store-Download.png" alt="app-store" />
					</ul>
				</div>
				<div class="bottom_footer">
					<div>
						<i class="fa-brands fa-facebook"></i>
						<i class="fa-brands fa-twitter"></i>
						<i class="fa-brands fa-instagram"></i>
					</div>
					<p>© 2024 Deliveboo</p>
				</div>
			</div>
		</div>
	</footer>
</template>

<style scoped lang="scss">
footer {
	background-color: #2e3333;
	position: absolute;
	bottom: 0;
	width: 100%;
	height: auto;
}

li {
	margin-top: 5px;
}

a {
	color: white;
	margin-top: 3px;
	text-decoration: none;
	&:hover {
		color: #00b8a9;
	}
}

.my-color-table {
	background-color: #434848;
	margin-top: 20px;
	padding: 20px;
	min-height: 355px;
	border-radius: 10px 10px 10px 10px;
}

ul img {
	width: 80%;
	height: 80%;
	display: block;
}

.my_flex {
	display: flex;
	justify-content: space-around;
	align-items: center;
}

.equal-column {
	display: flex;
}

.equal-column > [class^="col-"] {
	flex: 1;
}

@media (max-width: 767px) {
	.equal-column > [class^="col-"] {
		flex: 0 0 100%;
	}
	footer,
	h3 {
		bottom: auto;
		font-size: 200%;
	}
	.bottom_footer p {
		font-size: 80%;
	}
}

.bottom_footer {
	display: flex;
	justify-content: space-between;
	margin-top: 8px;
}

.bottom_footer div > i {
	margin-right: 20px;
	font-size: 25px;
}

.bottom_footer p {
	color: #585c4b;
}

.bottom_footer div > i {
	margin-top: 3px;
	text-decoration: none;
	&:hover {
		color: #00b8a9;
	}
}

.shape-img img {
	width: 100%;
	height: auto;
}
</style>
