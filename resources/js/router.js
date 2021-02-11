import AppFeedback from "./components/AppFeedback";
import AppSettings from "./components/AppSettings";
import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

const routes = [
    {
        path: "/feedback",
        component: AppFeedback
    },
    {
        path: "/feedback/settings",
        component: AppSettings
    }
];

export default new vueRouter({
    mode: 'history',
    routes
});
