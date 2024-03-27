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
					style="height: 110px"
					src="../../public/img/logodeliveboo.png"
					alt="Logo"
					class="d-inline-block align-text-top me-2"
				/>
				<h1 class="fs-2 text-white">Delive<span>Boo</span></h1>
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
				<span class="navbar-toggler-icon navbar-dark"></span>
			</button>
			<div
				class="collapse navbar-collapse text-lg-center ms-sm-4"
				id="navbarNav"
			>
				<ul class="navbar-nav">
					<li class="nav-item">
						<router-link to="/" class="nav-link" aria-current="page"
							>HOME</router-link
						>
					</li>
					<li class="nav-item">
						<router-link to="/about" class="nav-link">ABOUT</router-link>
					</li>
					<li class="nav-item">
						<router-link to="/service" class="nav-link">SERVICE</router-link>
					</li>
					<li class="nav-item">
						<router-link to="/contact" class="nav-link">CONTACT</router-link>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<style scoped lang="scss">
@use "../styles/navbar.scss";
.navbar {
	padding: 0;
	background-color: rgba(0, 0, 0, 0.617);
	position: fixed;
	top: 0;
	z-index: 50;
	width: 100%;
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

	.navbar-toggler {
		border: 2px solid #f68f00;
	}
	.navbar-toggler:focus {
		box-shadow: none;
	}
	@media all and (max-width: 768px) {
	}

	.navbar-collapse {
		justify-content: end;

		.navbar-nav {
			// gap: 30px;

			.nav-link {
				color: white;
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
