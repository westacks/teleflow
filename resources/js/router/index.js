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
            name: 'home',
            component: () => import('../views/Home.vue'),
            meta: {
                layout: 'Default',
                auth: true
            }
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../views/Login.vue'),
            meta: {
                layout: 'Auth',
                auth: false
            }
        }
    ]
})

router.beforeEach((to, from, next) => {
    let authenticated = localStorage.getItem("token") ? true : false;

    // // Route exists
    // if(!to.matched.length) {
    //     return next({name: 'NotFound'});
    // }

    // Auth guard
    if(to.matched.some(record => record.meta.auth === !authenticated)) {
        return next({ name: authenticated ? "home" : "login" });
    }

    return next();
});

export default router
