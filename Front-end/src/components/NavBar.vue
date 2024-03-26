<script>
export default {
	name: "NavBar",
};
</script>

<template>
	<nav class="navbar navbar-expand-lg fs-5">
		<div class="container">
			<router-link class="navbar-brand" to="/homepage" href="#">
				<img
					src="../../public/img/logodeliveboo.png"
					alt="Logo"
					class="d-inline-block align-text-top me-lg-5"
				/>
			</router-link>

			<button
				class="navbar-toggler"
				type="button"
				data-bs-toggle="collapse"
				data-bs-target="#navbarNav"
				aria-controls="navbarNav"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div
				class="collapse navbar-collapse text-lg-center ms-sm-4"
				id="navbarNav"
			>
				<ul class="navbar-nav">
					<li class="nav-item">
						<router-link
							to="#"
							class="nav-link active"
							aria-current="page"
							href="#"
							>Home</router-link
						>
					</li>
					<li class="nav-item mx-lg-5">
						<router-link to="" class="nav-link" href="#">Features</router-link>
					</li>
					<li class="nav-item">
						<router-link to="" class="nav-link" href="#">Pricing</router-link>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<style scoped lang="scss">
@use "../styles/navbar.scss";
.navbar {
	position: fixed;
	left: 0;
	top: 0;
	width: 100%;
	background-color: white;
	z-index: 1;
	height: 80px;
	box-shadow: 0 3px 9px rgba(0, 0, 0, 0.05);
}

.navbar-brand img{
	width: 70px;
	overflow-y: hidden;

}
</style>
