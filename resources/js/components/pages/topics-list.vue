<template>
    <div>
        <h2> My List of topics </h2>
        <ul class="list-group">
            <li class="list-group-item" 
                v-for="(topic,index) in p_topics" :key="index">
                {{ topic.title }}
            </li>
            
        </ul>

    </div>
</template>

<script>
    import Vue from 'vue';
    export default {
        data() {
            return {
                Topics: null,
            };
        },
        props: {
            p_topics: {
                type: Array,
                required:true,
            }
        }
        
    }
</script>

<style scoped>

</style>