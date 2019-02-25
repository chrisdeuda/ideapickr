import VueRouter from "vue-router";
import TopicsIndex from "./components/ExampleComponent.vue";
import HomeComponent from "./components/HomeComponent.vue";
import DashboardComponent from "./components/dashboard.vue";

const routes = [
    {
        name: "home",
        path: "/",
        component: HomeComponent,
    },
    {
        name: "dashboard",
        path: "/dashboard",
        component: DashboardComponent,
    },
];

export default new VueRouter({
    mode: "history",
    routes: routes,
});
