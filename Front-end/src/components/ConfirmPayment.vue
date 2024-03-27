<template>
  <div class="confirmation-page">
    <div class="bg w-75">
      <div class="ms_container">
        <div class="box">
            <div class="title">
                <span class="block"></span>
                <h1>DeliveBoo</h1>
            </div>
            <div class="role">
                <div class="block"></div>
                <p class="pt-3 w-100" >Grazie per l'acquisto! Un rider presto sarà da te</p>
            </div>
        </div>
    </div>
      <div class="rider-animation mt-5">
        <img src="../../public/img/rider.png" alt="rider-icon" class="rider-icon" />
      </div>
      <div class="text-center my-3">
        <router-link to="/" class="btn p-2">
          Torna alla Home
        </router-link>
      </div>
    </div>
  </div>
</template>

<style scoped>
  @import url('https://fonts.googleapis.com/css?family=Lato:300,400|Poppins:300,400,800&display=swap');

  .btn {
    background-color: #e69c23;
  }

  .confirmation-page {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #ffffff;
    opacity: 1;
    background-image:  radial-gradient(#e69c23 2px, transparent 2px), radial-gradient(#e69c23 2px, #ffffff 2px);
    background-size: 80px 80px;
    background-position: 0 0,40px 40px;
  }

  .bg {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .rider-animation {
    position: relative;
    width: 100%;
    height: 250px; /* Regola l'altezza desiderata */
    overflow: hidden;
  }

  .rider-icon {
    position: absolute;
    left: -100px; /* Posiziona l'icona fuori dalla vista iniziale */
    animation: riderMove 6s linear infinite; /* Imposta l'animazione */
  }

  @keyframes riderMove {
    0% {
      left: -100px; /* Posizione iniziale */
    }
    100% {
      left: calc(100% + 100px); /* Posizione finale */
    }
  }


  /* Animazione scritta */
* {
  margin: 0;
  padding: 0;
}

body, html {
   overflow: hidden;
}

.ms_container {
  display: flex;
  justify-content: center;
  align-items: center;

  .box {
    width: 100%;
    height: 250px;
    position: relative;
    display: flex;
    justify-content: center;
    flex-direction: column;

    .title {
      width: 100%;
      position: relative;
      display: flex;
      align-items: center;
      height: 50px;
      justify-content: center;

      .block {
        width: 0%;
        height: 60px;
        background: #e69c23;
        position: absolute;
        animation: mainBlock 2s cubic-bezier(.74, .06, .4, .92) forwards;
        display: flex;
      }

      h1 {
        font-family: 'Poppins';
        color: #e69c23;
        font-size: 60px;
        -webkit-animation: mainFadeIn 2s forwards;
        -o-animation: mainFadeIn 2s forwards;
        animation: mainFadeIn 2s forwards;
        animation-delay: 1.6s;
        opacity: 0;
        display: flex;
        align-items: baseline;
        position: relative;
      }
    }

    .role {
      width: 100%;
      position: relative;
      display: flex;
      align-items: center;
      height: 30px;
      margin-top: 30px;

      .block {
        width: 0%;
        height: 30px;
        background: #000;
        position: absolute;
        animation: secBlock 2s cubic-bezier(.74, .06, .4, .92) forwards;
        animation-delay: 2s;
        display: flex;
      }

      p {
        animation: secFadeIn 2s forwards;
        animation-delay: 3.2s;
        opacity: 0;
        font-weight: 400;
        font-family: 'Lato';
        color: #000;
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 5px;
      }
    }
  }
}

@keyframes mainBlock {
  0% {
    width: 0%;
    left: 0;

  }
  50% {
    width: 100%;
    left: 0;

  }
  100% {
    width: 0;
    left: 100%;
  }
}

@keyframes secBlock {
  0% {
    width: 0%;
    left: 0;

  }
  50% {
    width: 100%;
    left: 0;

  }
  100% {
    width: 0;
    left: 100%;
  }
}

@keyframes mainFadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes secFadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 0.5;
  }
}

@media all and (max-width: 1021px) {
  .ms_container {
    .box {
      .role {
        .block {
          height: 60px;
        }
      }
    }
  }
}

@media all and (max-width: 524px) {
  .ms_container {
    .box {
      .role {
        .block {
          height: 90px;
        }
      }
    }
  }
}
</style>