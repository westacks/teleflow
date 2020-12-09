<template>
    <div id="app">
        <component v-if="layout" :is="layout">
            <transition name="fade" mode="out-in">
                <router-view></router-view>
            </transition>
        </component>
    </div>
</template>

<script>
import Auth from './layouts/Auth.vue'
import Default from './layouts/Default.vue'

export default {
    components: {
        Auth,
        Default
    },
    computed: {
        layout() {
            return this.$route.meta.layout || false;
        }
    }
}
</script>
