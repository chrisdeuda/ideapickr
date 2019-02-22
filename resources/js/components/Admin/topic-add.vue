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



                // //@TODO Add validations
                // alert("Trying to save it");
                // const self = this;
                // const p_action = "/api/v1/topic";
                // axios.post('/api/v1/topic', {
                //             title: self.Topic.title,
                //             description: self.Topic.description,

                //             //Add state Management here so that thelist will be updated


                // }).then((res) => {
                //     if (res.data.success == true) {
                //         console.log(res);
                //     } else {
                        
                //     }
                // }).catch((error) => {
                //     console.log(error);
                // });
                

                // Process the request

            }

        }
        
    }
</script>

<style scoped>

</style>