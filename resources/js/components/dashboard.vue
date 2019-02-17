<template>
    <div>
        <h1>I'm dashboard</h1>
        <topic-add></topic-add>
        <topics-list :p_topics="Writer.topics"></topics-list>
    </div>
</template>

<script>
    import Vue from 'vue';
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
            this.getUserData();

        },
        
        mounted() {
            console.log('Dashboard Component mounted.')
        },
        methods: {
            getUserData(){
                const self = this;
                axios.get('/api/v1/topics').then((res) => {
                    self.Writer.topics = res.data.topics;

                    console.log(res);
                     }).catch((error) => {
                    // snackbar error
                });

            }

        },
    }
</script>

<style scoped>

</style>