import axios from './axios';

export default {
    authLogin(credentials) {
        return axios.post('api/auth/login', credentials)
    },
    authLogout() {
        return axios.post('api/auth/logout')
    },
    authUser() {
        return axios.get('api/auth/user')
    }
}
