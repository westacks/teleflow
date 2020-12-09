import axios from 'axios'
import store from "../store";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = process.env.MIX_APP_URL;

axios.interceptors.request.use(

    (config) => {
        let token = localStorage.getItem("api_token");
        if(token) {
            let tokenObj = JSON.parse(token);
            if(tokenObj.expire > (new Date).getTime()) {
                config.headers = {...config.headers,
                    "Authorization": "Bearer " + tokenObj.token
                };
            }
            else {
                localStorage.removeItem("api_token");
            }
        }

        return config;
    },

    (error) => {
        return Promise.reject(error);
    }
);

axios.interceptors.response.use(response => {
    return response;
}, error => {
    if(error?.response?.status == 401) {
        localStorage.removeItem("api_token");
        store.commit("setUser", null);
    }
});

export default axios;
