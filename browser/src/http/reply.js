import { http } from '../config/http.js';

export default {
    get: (id) => { return http.get(`replies/${id}`) },
    store: (payload => { return http.post('replies', payload) }),
};
