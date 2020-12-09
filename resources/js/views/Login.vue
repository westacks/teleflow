<template>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Login</h4>
            </div>

            <div class="card-body text-center">
                <telegram-auth mode="callback" @callback="login"/>
            </div>
        </div>
    </div>
</template>

<script>
import TelegramAuth from '../components/TelegramAuth.vue'

export default {
    components: {
        TelegramAuth
    },
    methods: {
        login(user) {
            console.log(user);
        }
    },
}
</script>
