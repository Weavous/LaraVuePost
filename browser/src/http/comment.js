import { http } from '../config/http.js';

export default {
    index: () => { return http.get(`comments`) },
    get: (id) => { return http.get(`comments/${id}`) },
    store: (payload) => { return http.post('comments', payload) },
    update: (id, payload) => { return http.put(`comments/${id}`, payload) },
};
