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

    import Header from '@/components/pages/header/header.vue';

    export default{
      components: {
        Header
      },
        mounted() {
            console.log('Parent Layout mounted.')
        }
    }
</script>

