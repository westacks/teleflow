import axios from 'axios'
import store from "../store";
import router from "../router";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = process.env.MIX_APP_URL;

axios.interceptors.request.use(
    config => {
        let token = localStorage.getItem("token");
        if(token) {
            token = JSON.parse(token)
            config.headers = {...config.headers,
                "Authorization": "Bearer " + token.access_token,
            };
        }
        return config;
    },

    error => {
        return Promise.reject(error);
    }
);

axios.interceptors.response.use(
    response => {
        return response;
    },

    error => {
        if(error?.response?.status == 401) {
            localStorage.removeItem("token");
            store.commit("setUser", null);
            router.push({ name: 'login' });
        }
    }
);

export default axios;
