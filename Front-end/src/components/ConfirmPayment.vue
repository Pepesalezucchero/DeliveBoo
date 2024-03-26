<script>
export default{
    name: 'ConfirmPayment'
}
</script>

<template>
    <div class="bg">
        <h1 class="text-center mt-4 mb-5">Grazie, il tuo ordine è stato inviato! Un rider arriverà presto da te.</h1>
        <div class="rider-animation mt-5" >
            <img src="../../public/img/rider.png" alt="rider-icon" class="rider-icon" />
        </div>
    </div>
   
</template>

<style scoped>

h1{
   color: #e69c23;
}
.rider-animation {
  position: relative;
  width: 100%;
  height: 500px; /* Regola l'altezza desiderata */
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
    left: 100%; /* Posizione finale */
  }
}
</style>