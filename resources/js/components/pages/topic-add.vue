<template>
    <div>
        <form action="" autocomplete="off" class="form-horizontal" method="post" accept-charset="utf-8">
        <div class="input-group">
            <input name="searchtext" value="" class="form-control" type="text" placeholder="What's your new idea?"
                v-model="Topic.title"
                
            >
            <span class="input-group-btn">
               <button class="btn btn-default" type="submit" id="addressSearch">
                   <span class="icon-search"></span>
               </button>
            </span>
            <button type="submit" class="btn btn-primary mb-2" 
                v-on:click="save"
                >Add</button>
        </div>
    </form>

    </div>
</template>

<script>
  import Vue from 'vue';
  import axios from 'axios';
  import { mapState } from 'vuex';
    export default {
        data() {
            return {
                Topic: {
                    title: null,
                    description: null,
                    id: null,
                }
            };
        },
        props: {
            
        },
        methods: {
            save: function(event){
                event.preventDefault();
                this.$store.dispatch("SAVE_TOPIC_STATE", this.Topic);
                this.clear();
            },
            clear: function(){
                this.Topic = {
                    title: null,
                    description: null,
                    id: null,
                }
            }

        }
        
    }
</script>

<style scoped>

</style>