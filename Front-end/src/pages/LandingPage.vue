<script></script>
<template>
    <div class="wrapper">
        <div class="side left">
            <router-link to="/homepage">
                <div class="image delivery"></div>
                <div class="caption">
                    <h1>Delivery</h1>
                    <p>I piatti e i prodotti che ami, consegnati in pochissimo tempo.</p>
                    <a class="button" href="#">See our products</a>
                </div>
            </router-link>
        </div>
        <div class="logo-section">
            <img src="../../public/Restaurant-logo.png" alt="">
        </div>
        <div class="side right">
            <div class="image business"></div>
            <div class="caption">
                <h1>Business</h1>
                <p>Raggiungi più clienti con Deliveboo.</p>
                <a class="button" href="http://localhost:8000/">Become a partner</a>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
	a {
    	text-decoration: none;
	}

    .wrapper {
        position: relative;
			.logo-section {
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				z-index: 20;
				
				img {
					max-width: 200px;
					height: auto;
				}
			}

        .image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            transition: 0.5s ease all;
        }

        .delivery {
            background-image: url('../../public/pizza_wallpaper.jpg');
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





