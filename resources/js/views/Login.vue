<template>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="m-auto">Welcome to TeleFlow!</h4>
            </div>

            <div class="card-body text-center">
                <telegram-auth mode="callback" @callback="login"/>
            </div>

            <div class="card-footer text-center">
                Login using you Telegram account to start manage your channels.
            </div>
        </div>
    </div>
</template>

<script>
import TelegramAuth from '../components/TelegramAuth.vue'
import api from '../api';

export default {
    components: {
        TelegramAuth
    },
    methods: {
        login(user) {
            api.authLogin(user).then(res => {
                localStorage.setItem('token', JSON.stringify(res.data));

                api.authUser().then(res => {
                    this.$store.commit('setUser', res.data)
                    this.$router.push({name: 'home'});
                })
            })
        }
    },
}
</script>
