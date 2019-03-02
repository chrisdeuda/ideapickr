<template>
    <div>

        <div class="row justify-content-center">
            <topics-filter :p_random_topic="random_topic" :p_tags="tags"></topics-filter>
            <topics-randomize :p_random_topic="random_topic"></topics-randomize>
        </div>
    </div>
    


</template>

<script>
    import Vue from 'vue';
    import { mapState } from 'vuex';
    import TopicsRandomize from '@/components/admin/topics-randomize.vue';    
    import TopicsFilter from '@/components/admin/topics-filter.vue';    
    
    export default {
        components: {
            TopicsRandomize,
            TopicsFilter,
        },
        data (){
            return {
                selected_tags: [],
            }
        },

        created: function(){
            this.$store.dispatch('GET_RANDOM_TOPIC', []);
            this.$store.dispatch('GET_USER_TAGS');
            this.$store.dispatch('GET_TOPICS_STATE');
            console.log("Trigger creations of the page");
        },
        mounted() {
            console.log('Home Component mounted.')
        },
        computed: {
            ...mapState(['topics', 'random_topic', 'tags']),
        }
    }
</script>

<style>




</style>