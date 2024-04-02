<template>
	<section>
		<div class="container py-5">
			<div class="row justify-content-center align-items-center">
				<div class="col-8 text-center">
					<h1>
						ci dispiace i ristoranti con le tipologie selezionate non sono
						presenti
					</h1>
					<div class="img-container py-5">
						<img
							src="../../public/img/sfondo-riso-deliveboo_.png"
							alt="ristorante non trovato"
						/>
					</div>

					<router-link class="btn" to="/"> Torna alla home Page</router-link>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss" scoped>
section {
	.row {
		width: 100%;
		h1 {
			color: black;
		}

		img {
			width: 100%;
		}

		.btn {
			background-color: #e69c23;
			color: white;
		}
	}

	@media all and (min-width: 992px) {
		img {
			max-width: 500px;
		}
	}
}
</style>
