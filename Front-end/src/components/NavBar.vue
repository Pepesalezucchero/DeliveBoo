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
	<div class="nav-container">
		<div
			class="row my-nav-bar align-items-center justify-content-between justify-content-sm-between justify-content-md-around"
		>
			<div class="col-1 ms-sm-3">
				<router-link to="/homepage"
					><img
						class="logo border"
						src="https://st3.depositphotos.com/5572200/15094/v/450/depositphotos_150942812-stock-illustration-a-man-is-riding-a.jpg"
						alt="Logo"
				/></router-link>
			</div>
			<div class="col-8 p-0 m-0">
				<ul class="d-flex justify-content-between">
					<li>
						<!-- <router-link to="/restaurant">Restaurants</router-link> -->
					</li>
					<li>
						<!-- <router-link to="/about">About</router-link> -->
					</li>
					<li>
						<!-- <router-link to="/contact">Contact</router-link> -->
					</li>
					<li class="drop-down">
						<!-- <router-link to="#" @click="toggleDrop">
							Info
							<i
								class="fa-solid ms-1"
								:class="{
									'fa-angle-down': !visibility,
									'fa-angle-up': visibility,
								}"
							></i>
						</router-link> -->
					</li>
					<ul>
						<div class="drop-list" v-if="visibility">
							<li>
								<router-link to="#"> Lavora con noi</router-link>
							</li>
							<li>
								<router-link to="#">Altre voci</router-link>
							</li>
						</div>
					</ul>
				</ul>
			</div>
			<HamburgerMenu />
		</div>
	</div>
</template>

<style scoped lang="scss">
@use "../styles/navbar.scss";
</style>
