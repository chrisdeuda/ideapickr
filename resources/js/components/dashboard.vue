<template>
    <div>
        <h1>I'm dashboard</h1>
        <topic-add></topic-add>
        <topics-list :p_topics="topics"></topics-list>
        <TopicsRandomize :p_random_topic="random_topic"></TopicsRandomize>
        <p> {{ topicsLength}}</p>
    </div>
</template>

<script>
    import Vue from 'vue';
    import { mapState } from 'vuex';
    import axios from 'axios';
    import TopicAdd from '@/components/admin/topic-add.vue';    
    import TopicsList from '@/components/admin/topics-list.vue';
    import TopicsRandomize from '@/components/admin/topics-randomize.vue';
    
    
    export default {
        name: 'Dashboard',
        components: {
            TopicAdd,
            TopicsList,
            TopicsRandomize,
        },
        data(){
            return {
                Writer : {
                    topics: [],
                },
            }
        },
        
        created: function() {
            //this.getUserData();
            this.$store.dispatch('GET_TOPICS_STATE');
            this.$store.dispatch('GET_RANDOM_TOPIC');
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
            ...mapState(['topics', 'random_topic']),
            topicsLength() {
                return this.topics.length;
            },
            // topics(){
            //     return this.$store.getters.topics;
            // }
        }
    }
</script>

<style scoped>

</style>