<template>
    <div>
        <div class="row spacer" >
            <div class="col-lg">
                <div class="mx-auto" style="width: 500px;">
                    <h1> {{p_random_topic.title}}</h1>
                    <h3> {{p_random_topic.description}}</h3>

                </div>
                
            </div>
        </div>
        <div class="row spacer">
            <div class="col-lg">
                <div class="mx-auto" style="width: 300px;">
                    <button type="button" class="btn btn-primary btn-lg"
                        v-on:click="getNewTopic">Give me new topic        
                    </button>
                    <button type="button" class="btn btn-primary btn-lg"
                        v-on:click="getNewTopic">Mark as done
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
        name: 'topics-randomize',
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
                this.$store.dispatch({
                    type: "GET_RANDOM_TOPIC", 
                    selected_tag_ids:  this.tag_ids,
                });
            }
        },
        computed: {
            selectedTags () {
                return this.$store.getters.selectedTags;
            },
            tag_ids(){
                return  this.selectedTags.map(a => a.id);
            }
        }
    }
</script>

<style scoped>
    .spacer {
        margin-top: 40px; /* define margin as you see fit */
    }
    h1, h3{
        color:white;
    }
</style>