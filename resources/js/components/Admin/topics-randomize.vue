<template>
    <div>
        <div>
            
            <h3>Random Topics</h3>
            <h2> {{p_random_topic.title}}</h2>
            
            <p> {{p_random_topic.description}}</p>
            <button v-on:click="getNewTopic"> Give me new topic</button>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import axios from 'axios';
    import { mapState } from 'vuex';
    export default {
        data() {
            return {
                Topics: null,
            };
        },
        props: {
            p_random_topic: {
                type: Object,
                required:true,
            }
        },
        methods: {
            getNewTopic: function(event){
                // Add categories search
                this.$store.dispatch("GET_RANDOM_TOPIC", this.Topic);
                
            }

        }
           
    }
</script>

<style scoped>

</style>