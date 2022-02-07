import { http } from '../config/http.js';

export default {
    index: () => { return http.get(`posts`) },
    get: (id) => { return http.get(`posts/${id}`) },
};
