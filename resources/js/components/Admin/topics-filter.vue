<template>
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h1>Random Topics</h1>
                <h2>Filter</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="mx-auto" style="width: 500px;">
                    <button 
                        v-for="(tag,index) in tags" :key="index"
                        v-on:click="addSelectedTag(index, tag)"
                        :class ="{active: tag.is_selected}"
                        type="button" class="btn btn-outline-secondary">
                        {{tag.name}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        data(){
            return {

            }
        },
        // props:{
        //     p_tags: {
        //         type: Object,
        //         required:true,
        //     }
        // },
        computed: {
            ...mapState(['selected_tags', 'tags']),
            topicsLength() {
                return this.topics.length;
            },
            // topics(){
            //     return this.$store.getters.topics;
            // }
        },
        methods: {
            addSelectedTag(index, tag){
                // Toggle the active class of the button if click twice
                if(tag.hasOwnProperty('is_selected')){
                    var $is_active_tag = tag['is_selected'] == true;
                    if ($is_active_tag){
                        this.$store.dispatch('removeSelectedTag', index, tag);
                    }else{
                        this.$store.dispatch('addSelectedTag', index, tag);
                    }
                } else {
                    this.$store.dispatch('addSelectedTag', index, tag);
                }

                console.log(tag);
            }
        }
    }
</script>

<style scoped>

</style>