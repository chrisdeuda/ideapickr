<template>
    <div>
        <h1>I'm dashboard</h1>
        <topic-add></topic-add>
        <topics-list :p_topics="topics"></topics-list>
        <p> {{ topicsLength}}</p>
    </div>
</template>

<script>
    import Vue from 'vue';
    import { mapState } from 'vuex';
    import axios from 'axios';
    
    Vue.component('topic-add', require('./admin/topic-add.vue').default);
    Vue.component('topics-list', require('./admin/topics-list.vue').default);
    
    export default {
        data(){
            return {
                Writer : {
                    topics: [],
                },
            }
        },
        
        created: function() {
            //this.getUserData();
            this.$store.dispatch('GET_TOPICS_STATE')
            console.log("Getting Topics from state");

        },
        
        mounted() {
            console.log('Dashboard Component mounted.');
            console.log(this.topics);
        },
        methods: {
            getUserData(){
                const self = this;
            }
        },
        computed: {
            //...mapState(['topics']),
            topicsLength() {
                return this.topics.length;
            },
            topics(){
                return this.$store.getters.topics;
            }
        }
    }
</script>

<style scoped>

</style>