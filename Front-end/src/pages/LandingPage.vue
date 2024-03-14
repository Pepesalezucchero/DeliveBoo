<script></script>
<template>
	<div class="cont">
		<div class="logo-section">
			<img src="../../public/food_logo.png" alt="">
		</div>
		<div class="left">
			<div class="left-wrapper">
				<router-link to="/homepage">
					<div class="left-content">
						<div class="major-title">
							DELIVEBOO FOR CLIENT
						</div>
						<p class="major-description">
							I piatti dei ristoranti che ami, a domicilio, quando vuoi!
						</p>
					</div>
				</router-link>
			</div>
		</div>

			<div class="right">
				<div class="right-wrapper">
					<div class="right-content">
						<div class="business-section">
							<div class="major-title">
								DELIVEBOO FOR BUSINESS
							</div>
							<p class="major-description">
								Diventa partner!
							</p>
						</div>
					</div>
				</div>
			</div>
	</div>
</template>

<style lang="scss">

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		overflow-x: hidden;
		overflow-y: hidden;
	}

	a {
		text-decoration: none;
	}

	.cont {
		display: flex;
		position: relative;

		.logo-section {
			width: 100%;
			position: absolute;
			top: 170px;
			right: 200px;
			transform: translate(50%, -50%);

			img {
				width: 400px;
			}
		}

		.left {
			background: url("../../public/pizza_wallpaper.jpg") no-repeat scroll center;
			background-size: cover;
			width: 50%;
			height: 100vh;
			transition: all 0.5s ease-in-out;

			.left-wrapper {
				background-color: rgb(71, 53, 44, 0.4);
				height: 100%;

				.left-content {
					display: flex;
					flex-direction: column;
					justify-content: center;
					align-items: center;
					text-align: center;
					height: 100%;
					transition: all 0.5s ease-in-out;
					cursor: pointer;
					padding: 4rem 4rem;

					.major-title {
						font-size: 4rem;
						color: white;
						text-shadow: 0 0 5px black;
					}

					.major-description {
						font-size: 1.5rem;
						color: white;
						text-shadow: 0 0 5px black;
					}
				}
			}
		}

		.left:hover, .right:hover {
			width: 60%;
		}

		.left:hover .left-content, .right:hover .right-content {
			transform: scale(1.1,1.1);
		}

		.right {
			background: url("../../public/restaurant-wallpaper.png") no-repeat scroll center;
			background-size: cover;
			width: 50%;
			height: 100vh;
			transition: all 0.5s ease-in-out;

			.right-wrapper {
				background-color: rgb(71, 53, 44, 0.4);
				height: 100%;

				.right-content {
					display: flex;
					flex-direction: column;
					justify-content: center;
					align-items: center;
					text-align: center;
					height: 100%;
					transition: all 0.5s ease-in-out;
					cursor: pointer;
					padding: 4rem 4rem;

					.major-title {
						font-size: 4rem;
						color: white;
						text-shadow: 0 0 5px black;
					}

					.major-description {
						font-size: 1.5rem;
						color: white;
					}
				}
			}
		}

	}
	
	@media screen and (max-width: 768px) {
		
		.cont {
			display: block;

			.logo-section {

				img {
					display: none;
				}
			}

			.left, .right {
				width: 100%;
				height: 50vh;
			}
		}

	}
</style>
