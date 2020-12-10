<template>
    <li class="dropdown" v-if="user">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img :alt="username" :src="avatar" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ username }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in {{ loged_in }}</div>
            <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" v-on:click.prevent="logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </li>
</template>

<script>
import api from '../../api'
export default {
    data: () => ({
        refresh: null,
        loged_in: null
    }),
    methods: {
        logout() {
            api.authLogout().then(res => {
                localStorage.removeItem('token');
                this.$store.commit('setUser', null);
                this.$router.push({name: 'login'});
            })
        }
    },
    mounted() {
        this.loged_in = moment(this.user?.auth_date).fromNow() ?? ''
        this.refresh = setInterval(() => {
            this.loged_in = moment(this.user?.auth_date).fromNow() ?? ''
        }, 5000);
    },
    beforeDestroy() {
        clearInterval(this.refresh);
    },
    computed: {
        user() {
            return this.$store.state.user;
        },
        username() {
            return this.user.username ?? this.full_name ?? 'Anonymous'
        },
        full_name() {
            let full_name = []
            if (this.user.first_name) full_name.push(this.user.first_name)
            if (this.user.last_name) full_name.push(this.user.last_name)
            return full_name.join(' ');
        },
        avatar() {
            return this.user.photo_url ?? '/images/avatar/avatar-1.png'
        }
    }
}
</script>
