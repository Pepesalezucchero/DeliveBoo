<script>
export default {
	data() {
		return {
			visibility: false,
			visibilityBars: true,
		};
	},
	methods: {
		showMenu() {
			this.visibility = !this.visibility;
			this.visibilityBars = !this.visibilityBars;
		},
	},
};
</script>

<template>
	<div class="col-1 me-4 hamburger">
		<i class="fa-solid fa-bars" @click="showMenu" v-if="visibilityBars"></i>
		<i class="fa-solid fa-xmark" @click="showMenu" v-if="visibility"></i>
	</div>
	<div class="canvas" v-if="visibility">
		<div class="logo border">
			<router-link to="/homepage"
				><img
					class="logo"
					src="https://i.pinimg.com/236x/f2/0e/c8/f20ec886756a90da7b6b7de9f3da609c.jpg"
					alt="Logo"
			/></router-link>
		</div>
		<div class="menu-list">
			<ul>
				<li><router-link to="#">Restaurants</router-link></li>
				<li><router-link to="/about">About Us</router-link></li>
				<li><router-link to="/contact">Contact</router-link></li>
				<li><router-link to="">Locations</router-link></li>
				<li><router-link to="#">altre voci</router-link></li>
			</ul>
		</div>
		<div class="social">
			<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
			<a href="#"><i class="fa-brands fa-instagram mx-4"></i></a>
			<a href="#"><i class="fa-brands fa-twitter"></i></a>
		</div>
	</div>
</template>

<style scoped lang="scss">
@use "../styles/hamburger.scss";
</style>
