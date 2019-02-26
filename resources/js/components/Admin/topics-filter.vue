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
                        v-for="(tag,index) in p_tags" :key="index"
                        type="button" class="btn btn-outline-secondary">
                        {{tag.name}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {

            }
        },
        props:{
            p_tags: {
                type: Object,
                required:true,
            }
        },
        
    }
</script>

<style scoped>

</style>