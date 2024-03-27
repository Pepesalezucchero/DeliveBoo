<script>
export default {
	name: "NavBar",
};
</script>

<template>
	<nav class="navbar navbar-expand-lg fs-5">
		<div class="container">
			<a class="navbar-brand" href="/homepage">
				<img
					src="../../public/img/logodeliveboo.png"
					alt="Logo"
					class="d-inline-block align-text-top me-lg-2"
				/>
				<h1>DELIVE<span>BOO</span></h1>
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
							to="/"
							class="nav-link"
							aria-current="page"
							href="#"
							>HOME</router-link
						>
					</li>
					<li class="nav-item">
						<router-link to="/about" class="nav-link" href="#">ABOUT</router-link>
					</li>
					<li class="nav-item">
						<router-link to="/service" class="nav-link" href="#">SERVICE</router-link>
					</li>
					<li class="nav-item">
						<router-link to="/contact" class="nav-link" href="#">CONTACT</router-link>
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
	z-index: 100;
	height: 90px;
	box-shadow: 0 4px 5px -4px gray;


	.navbar-brand {
		display: flex;
		align-items: center;

		img {
			width: 100px;
		}

		h1 {
			font-size: 22px;
			margin-bottom: 0px;

			span {
				color: #f68f00;
			}
		}
	}

	.navbar-collapse {
		justify-content: end;

		.navbar-nav {
			gap: 30px;

			.nav-link {
				color: #000;
				font-size: 18px;
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
