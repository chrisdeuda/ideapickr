<template>
  <div class="container">
    <dashboard-header></dashboard-header>
    <br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>
    import Vue from 'vue';

    Vue.component('dashboard-header', require('./components/admin/header/header.vue').default);
    export default{
        mounted() {
            console.log('Parent Layout mounted.')
        }
    }
</script>

