import axios from 'axios';

const configure = {
    //local: location.origin.replace(location.port, "") + "/api/" // Produção
    //local: "http://localhost:8000/api/" // Desenvolvimento
    local: "http://fabianomoreira.gratisphphost.info/api/" // Desenvolvimento
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