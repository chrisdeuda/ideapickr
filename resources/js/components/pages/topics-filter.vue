<template>
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h1>Random Topics</h1>
                <h2>Filter</h2>
                <button type="button" class="btn btn-warning"
                    v-on:click="clearAllActiveTags"
                >
                    Clear
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="mx-auto" style="width: 700px;">
                    <button 
                        v-for="(tag,index) in tags" :key="index"
                        v-on:click="toggleTagSelected(index, tag)"
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
        computed: {
            ...mapState(['selected_tags', 'tags']),
            topicsLength() {
                return this.topics.length;
            },
        },
        methods: {
            /**
             * Toggle the active class of the button if click twice
             */
            toggleTagSelected(index, tag){
                var is_selected_exist =  tag.hasOwnProperty('is_selected');
                if(is_selected_exist){
                    var $is_active_tag = tag['is_selected'] == true;
                    if ($is_active_tag){
                        this.triggerTagAsDeselected(index, tag);
                    }else{
                        this.triggerTagAsSelected(index, tag);
                    }
                } else {
                    this.triggerTagAsSelected(index, tag);
                }
            },

            triggerTagAsSelected(index, tag){
                this.$store.dispatch('addSelectedTag', index, tag);
            },
            triggerTagAsDeselected(index, tag){
                this.$store.dispatch('removeSelectedTag', index, tag);
            },
            clearAllActiveTags(){
                this.$store.dispatch('clearAllSelectedTags');
            }
        }
    }
</script>

<style scoped>

.btn-outline-secondary {
    color: #6c757d;
    border-color: #6c757d;
    border-radius: 20px;
    font-size: 20px;
    font-weight: bold;
    margin-left: 20px;
}

</style>