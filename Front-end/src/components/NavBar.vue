<script>
import HamburgerMenu from "./HamburgerMenu.vue";
export default {
	name: "NavBar",
	components: {
		HamburgerMenu,
	},
	data() {
		return {
			visibility: false,
		};
	},
	methods: {
		toggleDrop(event) {
			event.stopPropagation();
			this.visibility = !this.visibility;
		},
	},
};
</script>

<template>
	<div class="container-fluid">
		<div class="row nav-bar align-items-center justify-content-evenly">
			<div class="col-1 d-flex justify-content-center">
				<a href=""
					><img
						class="logo"
						src="https://i.pinimg.com/236x/f2/0e/c8/f20ec886756a90da7b6b7de9f3da609c.jpg"
						alt="Logo"
				/></a>
			</div>
			<div class="col-9 d-flex justify-content-center">
				<ul class="d-flex">
					<li class="drop-list">
						<router-link to="#" @click="toggleDrop">
							Restaurants
							<i
								class="fa-solid"
								:class="{
									'fa-angle-down': !visibility,
									'fa-angle-up': visibility,
								}"
							></i>
						</router-link>
					</li>
					<ul>
						<div class="restaurant-list" v-if="visibility">
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
							<li>
								<router-link to="#">Libanese</router-link>
							</li>
						</div>
					</ul>
					<li>
						<router-link to="#">About</router-link>
					</li>
					<li>
						<router-link to="#">Contact</router-link>
					</li>
					<li>
						<router-link to="#">Locations</router-link>
					</li>
				</ul>
			</div>
			<HamburgerMenu />
		</div>
	</div>
</template>

<style scoped lang="scss">
@use "../styles/navbar.scss";
</style>
