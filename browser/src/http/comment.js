import { http } from '../config/http.js';

export default {
    index: () => { return http.get(`comments`) }
};
