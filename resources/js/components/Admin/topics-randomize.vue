<template>
    <div>
        <div class="row">
            <div class="col-lg">
                <h2> {{p_random_topic.title}}</h2>
                <p> {{p_random_topic.description}}</p>
            </div>
        </div>
        <div class="row spacer">
            <div class="col-lg">
                <div class="mx-auto" style="width: 200px;">
                    <button type="button" class="btn btn-primary btn-lg"
                        v-on:click="getNewTopic">Give me new topic        
                    </button>
                </div>
            </div>
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
.spacer {
    margin-top: 40px; /* define margin as you see fit */
}

</style>