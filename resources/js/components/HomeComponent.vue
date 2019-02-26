<template>
  <div class="row justify-content-center">
      <topics-filter :p_random_topic="random_topic"></topics-filter>
      <topics-randomize :p_random_topic="random_topic"></topics-randomize>
  </div>
</template>

<script>
    import Vue from 'vue';
    import { mapState } from 'vuex';
    Vue.component('topics-randomize', require('./admin/topics-randomize.vue').default);
    Vue.component('topics-filter', require('./admin/topics-filter.vue').default);
    export default {
        date (){
            return {

            }
        },

        created: function(){
            this.$store.dispatch('GET_RANDOM_TOPIC');
            console.log("Trigger creations of the page");
            

        },
        mounted() {
            console.log('Home Component mounted.')
        },
        computed: {
            ...mapState(['topics', 'random_topic']),
        }
    }
</script>