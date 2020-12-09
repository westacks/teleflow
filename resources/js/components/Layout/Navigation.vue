<template>
    <div class="main-sidebar sidebar-style-2" style="overflow: hidden; outline: none;" tabindex="1">
        <sidebar-menu :menu="menu" width="250px" :collapsed="collapsed" width-collapsed="65px" @toggle-collapse="onToggleCollapse">
            <template v-slot:header>
                <div class="sidebar-brand">
                    <router-link to="/">TeleFlow</router-link>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <router-link to="/">TF</router-link>
                </div>
            </template>
        </sidebar-menu>
    </div>
</template>

<script>
import { SidebarMenu } from 'vue-sidebar-menu'
import sidebar from '../../sidebar';

export default {
    components: {
        SidebarMenu
    },
    data: () => ({
        menu: sidebar,
        collapsed: true
    }),
    created() {
        window.addEventListener('resize', this.resize);
        this.resize();
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.resize);
    },
    methods: {
        onToggleCollapse(collapsed) {
            if (collapsed) {
                document.body.classList.add('sidebar-mini')
            }
            else {
                document.body.classList.remove('sidebar-mini')
            }
        },
        resize() {
            if ( window.innerWidth <= 1024 ) {
                this.collapsed = true
                document.body.classList.add('sidebar-mini')
            } else if ( window.innerWidth > 1024) {
                this.collapsed = false
                document.body.classList.remove('sidebar-mini')
            }
        }
    },
}
</script>
