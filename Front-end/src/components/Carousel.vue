<script>
import { store } from "../store";

export default {
	data() {
		return {
			store,
		};
	},
};
</script>
<template>
	<div class="container-fluid">
		<div
			id="carouselExampleInterval"
			class="carousel pt-5 slide"
			data-bs-ride="carousel"
		>
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="3000">
					<div class="row mx-0 px-0">
						<div class="col-4">
							<img
								src="../../public/img/five-guys-burgers.svg"
								class="d-block w-100"
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

						<div class="col-4">
							<img
								src="../../public/img/burger-king-4.svg"
								class="d-block w-100"
								alt="..."
							/>
						</div>
					</div>
				</div>
				<div class="carousel-item" data-bs-interval="2000">
					<div class="row mx-0 px-0">
						<div class="col-4">
							<img
								src="../../public/img/baja-fresh.svg"
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
								src="../../public/img/kfc-2.svg"
								class="d-block w-100"
								alt="..."
							/>
						</div>
					</div>
				</div>
				<div class="carousel-item" data-bs-interval="2000">
					<div class="row mx-0 px-0">
						<div class="col-4">
							<img
								src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmJpV9SUj0EqBEhu-IgJB2xvBJ-XxAFt72SA&usqp=CAU"
								class="d-block w-100"
								alt="..."
							/>
						</div>
						<div class="col-4">
							<img
								src="../../public/img/wendys-1.svg"
								class="d-block w-100 w-90"
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
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<style scoped lang="scss">
@use "../styles/carousel.scss";
</style>
