<template>
    <div ref="telegram"></div>
</template>

<script>
export default {
    name: "telegram-login",
    props: {
        mode: {
            type: String,
            required: true,
            validator: value => ["callback", "redirect"].includes(value)
        },
        telegramLogin: {
            type: String,
            default: process.env.MIX_TELEGRAM_BOT_NAME ?? undefined
        },
        redirectUrl: {
            type: String,
            default: process.env.MIX_APP_URL ?? undefined
        },
        requestAccess: {
            type: String,
            default: "write",
            validator: value => ["read", "write"].includes(value)
        },
        size: {
            type: String,
            default: "large",
            validator: value => ["small", "medium", "large"].includes(value)
        },
        userpic: {
            type: Boolean,
            default: true
        },
        radius: {
            type: Number,
            default: 20
        }
    },
    mounted() {
        const script = document.createElement("script");
        script.async = true;
        script.src = "https://telegram.org/js/telegram-widget.js?11";
        script.setAttribute("data-size", this.size);
        script.setAttribute("data-userpic", this.userpic);
        script.setAttribute("data-telegram-login", this.telegramLogin);
        script.setAttribute("data-request-access", this.requestAccess);
        script.setAttribute("data-radius", this.radius);
        if (this.mode === "callback") {
            window.onTelegramAuth = this._telegramAuthCallback;
            script.setAttribute("data-onauth", "onTelegramAuth(user)");
        }
        else if (this.mode === "redirect"){
            script.setAttribute("data-auth-url", this.redirectUrl);
        }
        this.$refs.telegram.appendChild(script);
    },
    methods: {
        _telegramAuthCallback(user) {
            this.$emit("callback", user);
        }
    }
};
</script>
