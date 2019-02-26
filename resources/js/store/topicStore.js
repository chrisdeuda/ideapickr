import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

const topicStore = new Vuex.Store({
    state: {
        topics: [],
        random_topic: {},
        topic: {},
        tags: [],
        selected_tags: [],
    },
    getters: {
        topics: state => state.topics,
        selectedTags: state => {
            return state.tags.filter(tag => tag.is_selected);
        },
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
        CHANGE_TAGS(state, tags) {
            state.tags = tags;
        },
        MARK_TAG_AS_SELECTED(state, index, tag) {
            var $tag = state.tags[index];
            $tag["is_selected"] = true;
            state.tags.splice(index, 1, $tag);
        },
        UNMARK_TAG_AS_SELECTED(state, index) {
            var $tag = state.tags[index];
            $tag["is_selected"] = false;
            state.tags.splice(index, 1, $tag);
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
            parent = this;
            const p_action = "/api/v1/topics/randomize";
            axios
                .get(p_action, {})
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

        GET_USER_TAGS(state, tags) {
            parent = this;
            const p_action = "/api/v1/tags";
            axios
                .get(p_action, {})
                .then(res => {
                    if (res.data.success == true) {
                        parent.commit("CHANGE_TAGS", res.data.tags);
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

        addSelectedTag(context, index, tag) {
            context.commit("MARK_TAG_AS_SELECTED", index);
        },
        removeSelectedTag(context, index, tag) {
            context.commit("UNMARK_TAG_AS_SELECTED", index);
        },
        clearAllSelectedTags(context) {
            var key = "is_selected";
            var $tags = context.state.tags.map(function(tag) {
                tag[key] = false;
                return tag;
            });
            context.commit("CHANGE_TAGS", $tags);
        },
    },
});

export default topicStore;
