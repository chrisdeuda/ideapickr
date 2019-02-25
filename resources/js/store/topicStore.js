import Vue from "vue";
import Vuex from "vuex";
import axious from "axios";

Vue.use(Vuex);

const topicStore = new Vuex.Store({
    state: {
        topics: [{ test: "1" }, { test: "2" }],
        // random_topic: {
        //     title: "Lorem Ipsum",
        //     description: "Lorem Ipsum",
        //     id: "1",
        // },
        random_topic: {},
        topic: {},
    },
    getters: {
        topics: state => state.topics,
    },
    mutations: {
        FETCH_ALL_TOPICS(state, topics) {
            state.topics = topics;
            console.log("Updated the state values");
        },
        ADD_TOPIC(state, payload) {
            const topic = {
                title: payload.title,
                description: payload.description,
                id: payload.id,
            };
            state.topics.unshift(topic);
        },
        CHANGE_RANDOM_TOPIC(state, topic) {
            state.random_topic = topic;
        },
    },

    actions: {
        GET_TOPICS_STATE({ commit }) {
            console.log("Getting Data in API");
            parent = this;
            axios
                .get("/api/v1/topics")
                .then(res => {
                    console.log(res.data.topics);
                    parent.commit("FETCH_ALL_TOPICS", res.data.topics);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        SAVE_TOPIC_STATE(state, topic) {
            const p_action = "/api/v1/topic";
            axios
                .post("/api/v1/topic", {
                    title: topic.title,
                    description: topic.description,
                })
                .then(res => {
                    if (res.data.success == true) {
                        topic.id = res.data.id;
                        parent.commit("ADD_TOPIC", topic);
                    } else {
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        edit({}, topic) {},

        GET_RANDOM_TOPIC(state, topic) {
            const p_action = "/api/v1/topics/randomize";
            axios
                .get(p_action, {
                    // title: topic.title,
                    // description: topic.description,
                })
                .then(res => {
                    if (res.data.success == true) {
                        parent.commit("CHANGE_RANDOM_TOPIC", res.data.topic);
                        console.log("Trigger change random topic");
                    } else {
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
});

export default topicStore;
