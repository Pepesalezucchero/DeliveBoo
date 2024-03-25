<script>
export default {
	name: "NavBar",
};
</script>

<template>
	<nav class="navbar navbar-expand-lg navbar-light fs-5">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img
					src="../../public/img/logodeliveboo.png"
					alt="Logo"
					width="70px"
					class="d-inline-block align-text-top me-lg-5"
				/>
			</a>

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
	border-bottom: 1px solid white;
}
</style>
