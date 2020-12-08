import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    scrollBehavior(to, from, savedPosition) {
        return savedPosition ?? { x: 0, y: 0 }
    },

    routes: [
        {
            path: '/',
            name: 'Home',
            component: () => import(/* webpackChunkName: "about" */ '../views/Home.vue')
        },
        {
            path: '/about',
            name: 'About',
            // route level code-splitting
            // this generates a separate chunk (about.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
        }
    ]
})

export default router
