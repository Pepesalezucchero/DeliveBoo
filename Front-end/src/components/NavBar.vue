<script>
export default {
	name: "NavBar",
};
</script>

<template>
	<nav class="navbar navbar-expand-md">
		<div class="container-fluid ms-5 me-5">
			<router-link to="/" class="navbar-brand">
				<img
					src="../../public/img/logodeliveboo.png"
					alt="Logo"
					class="d-inline-block align-text-top me-lg-2"
				/>
				<h1>DELIVE<span>BOO</span></h1>
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
						<router-link to="/" class="nav-link" aria-current="page" href="#"
							>HOME</router-link
						>
					</li>
					<li class="nav-item">
						<router-link to="/about" class="nav-link" href="#"
							>ABOUT</router-link
						>
					</li>
					<li class="nav-item">
						<router-link to="/service" class="nav-link" href="#"
							>SERVICE</router-link
						>
					</li>
					<li class="nav-item">
						<router-link to="/contact" class="nav-link" href="#"
							>CONTACT</router-link
						>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<style scoped lang="scss">
@use "../styles/navbar.scss";
.navbar {
	background-color: white;

	box-shadow: 0 4px 5px -4px gray;

	.navbar-brand {
		display: flex;
		align-items: center;

		img {
			max-width: 80px;
		}

		h1 {
			font-size: 22px;

			span {
				color: #f68f00;
			}
		}
	}

	@media all and (max-width: 768px) {
	}

	.navbar-collapse {
		justify-content: end;

		.navbar-nav {
			// gap: 30px;

			.nav-link {
				color: #000;
				font-weight: 500;
				transition: 0.5s;
			}

			.nav-link:hover {
				color: #e37e08;
			}
		}
	}
}
</style>
