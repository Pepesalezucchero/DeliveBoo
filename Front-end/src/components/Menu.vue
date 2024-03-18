<script>
import axios from "axios";
export default{
	name: "Menu",
    data(){
        return{
            dishes: [],
        }
    },
    methods:{
        getDishes() {
			axios
            .get('http://localhost:8000/api/deliveboo/dishes')
            .then((res) => {
                this.dishes = res.data.dishes;
            })
            .catch((err) => {
                console.log(err);
            });
		},
    },
    mounted(){
        this.getDishes();
    }
}
</script>

<template>
    <div class="container">
        <div class="row gy-3 mt-5">
            <div class="col-3" v-for="(dish, index) in dishes" :key="index">
                <div class="card">
                    <img
                        src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
                        class="card-img-top"
                        alt="immagine ristoranti"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name}}</h5>
                        <p class="card-text d-flex">{{ dish.price }} &euro;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	

    
</template>

<style scoped lang="scss">

</style>
