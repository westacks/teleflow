<template>
    <div class="main-sidebar sidebar-style-2" style="overflow: hidden; outline: none;" tabindex="1">
        <sidebar-menu :menu="menu" width="250px" :collapsed="collapsed" :width-collapsed="`${sidebar_width}px`" @toggle-collapse="onToggleCollapse">
            <template v-slot:header>
                <div class="sidebar-brand">
                    <router-link to="/">
                        <img src="/../../../images/logo-row.svg" alt="logo" height="30">
                    </router-link>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <router-link to="/">
                        <img src="/../../../images/logo.svg" alt="logo" height="30">
                    </router-link>
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
        collapsed: false,
        sidebar_width: 0
    }),
    created() {
        window.addEventListener('resize', this.resize);
        document.body.addEventListener('click', this.pseudoNavToggle)
        this.resize();
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.resize)
        document.body.removeEventListener('click', this.pseudoNavToggle)
    },
    methods: {
        onToggleCollapse(collapsed) {
            if (this.sidebar_width) {
                if (collapsed) {
                    document.body.classList.add('sidebar-mini')
                }
                else {
                    document.body.classList.remove('sidebar-mini')
                }
            }
            else {
                if (collapsed) {
                    document.body.classList.remove('sidebar-show')
                }
                else {
                    document.body.classList.add('sidebar-show')
                }
            }

            this.collapsed = collapsed;
        },
        resize() {
            if ( window.innerWidth <= 1024 ) {
                this.sidebar_width = 0
                this.collapsed = true
                document.body.classList.remove('sidebar-mini')
                document.body.classList.remove('sidebar-show')
            } else if ( window.innerWidth > 1024) {
                this.sidebar_width = 65
                this.collapsed = false
                document.body.classList.remove('sidebar-mini')
                document.body.classList.remove('sidebar-show')
            }
        },
        pseudoNavToggle(e) {
            if (e.path[0] == document.body) {
                if (document.body.classList.contains('sidebar-show')) this.navToggle();
                document.body.classList.remove('search-show');
            }
        },
        navToggle() {
            let toggle = document.getElementsByClassName('vsm--toggle-btn')[0] ?? null
            if (toggle) {
                toggle.click();
            }
        }
    },
    computed: {
        show_mobile_sidebar() {
            return this.sidebar_width == 0 && this.collapsed == false
        }
    }
}
</script>
