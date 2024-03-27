<template>
    <div class="wrapper">

        <div class="side left">
            <div class="image banner"></div>
            <div class="small-container">
                <div class="caption-container">
                    <div class="caption">
                        <h1>Menù in offerta: sconti fino al 25%</h1>
                        <p>Perfetti per dare più gusto alla tua settimana, ordinare i piatti più amati da tutta la famiglia e fare una pausa dai fornelli.</p>
                        <p class="conditions">Si applicano spese di consegna e di servizio. Offerta soggetta a disponibilità, solo per ristoranti aderenti all'iniziativa. Si applicano termini e condizioni, consultabili qui. Termini e condizioni qui.</p>
                    </div>
                </div>
                <div class="pattern">
                    <img src="../../public/img/merch-itemrow@2x.09d506d7.svg" alt="">
                </div>
            </div>
            </div>

    </div>
</template>

<style scoped lang="scss">

    .wrapper {
        position: relative;

			.image {
				width: 100%;
				height: 100%;
				background-size: cover;
				background-position: center;
				position: absolute;
				top: 0;
				left: 0;
			}

			.banner {
				background-image: url('../../public/img/food-banner.jpg');
			}
	}

    .wrapper .small-container {
        width: 100%;

        .caption-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    }

	.wrapper .caption {
		position: relative;
		z-index: 10;
        width: 40%;
		color: #ffff;
		text-align: center;

		h1 {
			font-size: 50px;
            font-weight: 700;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			margin-bottom: 30px;
		}

		p {
			color: #f2f2f2;
			font-size: 23px;
			margin-bottom: 40px;
		}

        .conditions {
            color: #f2f2f2;
            font-size: 15px;
        }
	}

    .wrapper .pattern {
        position: relative;
        display: flex;
        justify-content: center;
        z-index: 10;
        width: 100%;

        img {
            width: 60%;
            object-fit: cover;
        }
    }

	.wrapper .left {
		width: 100%;
		padding-top: 50px;
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		overflow: hidden;
	}

	.wrapper .side::before {
		background: linear-gradient(0deg, rgba(0,0,0,0.6979166666666667) 0%, rgba(0,0,0,0.6) 100%);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 1;
		content: '';
		display: block;
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
        
		.wrapper .left {

			width: 100%;
		}
    }
</style>