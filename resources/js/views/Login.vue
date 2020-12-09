<template>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Login</h4>
            </div>

            <div class="card-body text-center">
                <telegram-auth/>
            </div>
        </div>
    </div>
</template>

<script>
import TelegramAuth from '../components/TelegramAuth.vue'

export default {
    components: {
        TelegramAuth
    }
}
</script>
