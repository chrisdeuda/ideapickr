<template>
    <div>
        <form action="" autocomplete="off" class="form-horizontal" method="post" accept-charset="utf-8">
        <div class="input-group">
            <input name="searchtext" value="" class="form-control" type="text" placeholder="What's your new idea?">
            <span class="input-group-btn">
               <button class="btn btn-default" type="submit" id="addressSearch">
                   <span class="icon-search"></span>
               </button>
            </span>
            <button type="submit" class="btn btn-primary mb-2">Add</button>
        </div>
    </form>

    </div>
</template>

<script>
  import Vue from 'vue';
    export default {
        data() {
            return {
                Topic: null,
            };
        },
        props: {
            
        },
        methods: {
            save: function(){

                //@TODO Add validations
                

                // Process the request

            }

        }
        
    }
</script>

<style scoped>

</style>