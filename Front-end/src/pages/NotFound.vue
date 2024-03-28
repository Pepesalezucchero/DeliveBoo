<script>
import NavBar from '../components/NavBar.vue';
export default{
    name: 'NotFound',
    components:{
        NavBar
    }
}
</script>

<template>
    <NavBar/>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-4">
                <h1>Questa pagina non esiste</h1> 
                <p>Cioè, tecnicamente esiste, ma era solo per dirti che la pagina che stavi cercando non c'è. Ci dispiace.</p>
                <router-link to="/" class="btn">
                    Torna alla Home
                </router-link>
            </div>

            <div class="col-12 col-lg-3 mt-sm-4">
                <img src="../../public/img/ananas.svg" alt="ananas-page-not-found">
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.row{
    height: 100vh;

    h1{
        font-size: 50px;
        font-weight: 600;
    }

    .btn{
        background-color: #e69c23;
        width: 100%;
        border-radius: 20px;
        margin-top: 20px;
        color: white;
        transition: ease-in-out all 0.2s;
    }

    .btn:hover{
        background-color: white;
        border: 1px solid #e69c23;
        color: #e69c23;
    }
}

@media all and (max-width: 768px){
    .row{
        padding-top: 130px;
        text-align: center;
    }
}
</style>