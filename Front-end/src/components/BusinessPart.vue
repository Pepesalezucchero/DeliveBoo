<script>

</script>


<template>
<div class="great-container">
	<h1 class="title">Uniamo le forze</h1>
    <div class="wrapper">


        <div class="side left">
            <router-link to="/service">
                <div class="image delivery"></div>
                <div class="caption">
                    <h1>Consegna con noi</h1>
                    <p>La libertà di consegnare dove e quando vuoi, con ottimi sconti riservati a te.</p>
                    <a class="button" href="#">Inizia ora!</a>
                </div>
            </router-link>
        </div>

        <div class="logo-section">
            <img src="../../public/Restaurant-logo.png" alt="">
        </div>

        <div class="side right">
            <div class="image business"></div>
            <div class="caption">
                <h1>Diventa nostro partner</h1>
                <p>Raggiungi più clienti con Deliveboo. La consegna la gestiremo noi.</p>
                <a class="button" href="http://localhost:8000/">Inizia ora!</a>
            </div>
        </div>

    </div>
</div>  
</template>

<style scoped lang="scss">

a {
    	text-decoration: none;
	}

.great-container {
	margin-bottom: 50px;

	.title {
		text-align: center;
		font-size: 40px;
		font-weight: 700;
		margin: 50px 0;
	}
}

    .wrapper {
        position: relative;
		padding: 0 7px;
		// padding: 60px 120px;

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
				background-image: url('../../public/img/food-delivery-2.jpg');
			}

			.business {
				background-image: url('../../public/restaurant-business-wallpaper.jpg');
			}
	}

	.wrapper .caption {
		position: relative;
		width: 100%;
		margin: 0 auto;
		z-index: 10;
		color: #ffff;
		text-align: center;

		h1 {
			font-size: 30px;
			text-transform: uppercase;
			letter-spacing: 0.10em;
			margin-bottom: 20px;
		}

		p {
			color: #d9d9d9;
			font-size: 18px;
			margin-bottom: 30px;
		}

		.button {
			background: #e69c23;
			color: #000;
			padding: 14px 20px;
			text-decoration: none;
			font-weight: 600;
			font-size: 14px;
			text-transform: uppercase;
			letter-spacing: 0.10em;
			transition: 0.5s ease all;
		}

		.button:hover {
			background-color: #000;
			color: #ffff;
		}
	}

	.wrapper .left,
	.wrapper .right {
		width: 100%;
		height: 50vh;
		margin: 0 10px;
		border-radius: 20px;
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		overflow: hidden;
		cursor: pointer;
		box-shadow: 0 4px 5px -4px gray;
	}

	.wrapper .side::before {
		background: linear-gradient(0deg, rgba(0,0,0,0.6979166666666667) 0%, rgba(0,0,0,0.3) 100%);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 1;
		content: '';
		display: block;
	}

	.wrapper .left:hover .image,
	.wrapper .right:hover .image {
		transform: scale(1.2);
	}

	@media screen and (min-width: 1280px) {

		.wrapper .left,
		.wrapper .right {
			margin-bottom: 40px;
		}
	}


    @media screen and (min-width: 1200px) {

		.wrapper {
			display: flex;

			.logo-section {
				position: absolute;
				top: 17%;
				left: 50%;
				transform: translate(-50%, -50%);
				z-index: 20;
				
				img {
					max-width: 350px;
					height: auto;
				}
			}
		}
        
		.wrapper .left,
		.wrapper .right {

			width: 50%;
			height: 500px;
		}
    }

	@media screen and (min-width: 390px) {

		.wrapper {
		 display: flex;
		 flex-direction: column;
		 align-items: center;
		}

		.wrapper .caption {
			width: 90%;
		}

		.wrapper .left,
		.wrapper .right {
			width: 90%;
		}

	}
</style>