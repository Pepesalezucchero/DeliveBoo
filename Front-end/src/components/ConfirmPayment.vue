<template>
  <div class="confirmation-page">
    <div class="bg">
      <h1 class="text-center p-3">Grazie, il tuo ordine è stato inviato! Un rider arriverà presto da te.</h1>
      <div class="rider-animation mt-5">
        <img src="../../public/img/rider.png" alt="rider-icon" class="rider-icon" />
      </div>
      <div class="text-center">
        <router-link to="/homepage" class="btn btn-success my-sm-3">
          Torna alla Home
        </router-link>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .confirmation-page {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .bg {
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  h1 {
    color: #e69c23;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 30px;
    animation: colorChange 3s infinite alternate; /* Animazione del cambio colore */
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

  @keyframes colorChange {
    0% {
      color: #e69c23;
    }
    50% {
      color: #ff5722;
    }
    100% {
      color: #e69c23;
    }
  }
</style>
