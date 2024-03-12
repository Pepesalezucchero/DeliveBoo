<script></script>
<template>
	<!-- TO FIX -->
	<section class="py-5">
		<div
			id="carouselExampleInterval"
			class="carousel slide"
			data-bs-ride="carousel"
		>
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="3000">
					<div class="row mx-auto ps-5 align-items-center border m-auto">
						<div class="col-4">
							<img
								src="https://1000logos.net/wp-content/uploads/2022/06/Logo-Five-Guys.png"
								class="d-block w-100"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="https://cdn.worldvectorlogo.com/logos/subway-3.svg"
								class="d-block w-100"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="https://logowik.com/content/uploads/images/310_burgerking.jpg"
								class="d-block w-100"
								alt="..."
							/>
						</div>
					</div>
				</div>
				<div class="carousel-item" data-bs-interval="2000">
					<div class="row px-3 align-items-center border">
						<div class="col-4">
							<img
								src="https://1000logos.net/wp-content/uploads/2022/06/Logo-Baja-Fresh.png"
								class="d-block w-100"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="https://1000logos.net/wp-content/uploads/2022/06/Logo-Dominos-Pizza.png"
								class="d-block w-100"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="https://1000logos.net/wp-content/uploads/2022/06/Logo-KFC.png"
								class="d-block w-100"
								alt="..."
							/>
						</div>
					</div>
				</div>
				<div class="carousel-item" data-bs-interval="2000">
					<div class="row border px-5 align-items-center">
						<div class="col-4">
							<img
								src="https://1000logos.net/wp-content/uploads/2022/06/Logo-Taco-Bell.png"
								class="d-block w-100"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="https://1000logos.net/wp-content/uploads/2022/06/Logo-Wendys.png"
								class="d-block w-100 w-90"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="https://static.vecteezy.com/system/resources/previews/020/190/509/original/mcdonalds-logo-mcdonald-icon-free-free-vector.jpg"
								class="d-block w-100"
								alt=".."
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>
<style scoped lang="scss">
section {
	.carousel {
		z-index: -1 !important;
		.row {
			display: flex;
			justify-content: center;
		}
		.carousel-item {
			height: 300px;
		}
		img {
			max-width: 250px;
			max-height: 150px;
			object-fit: contain;
			border: 1px solid black;
		}
		.carousel-item {
			transition: 3s;
		}
	}
}
</style>
