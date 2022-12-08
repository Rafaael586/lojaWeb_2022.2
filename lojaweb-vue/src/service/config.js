import axios from 'axios';

const configure = {
    //local: location.origin.replace(location.port, ""),
    //local: location.origin.replace(location.port, "") + "/api/"
    local: "http://localhost/api"
};

const http = axios.create({
    baseURL: configure.local,
    headers: {
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'application/json;charset=utf-8',
    }
});

// http.interceptors.request.use(
//     function (config) {
//         const token = localStorage.getItem('token');
//         config.headers.Authorization = token ? "Bearer " + token : '';
//         return config;
//     }
// );

export default http;