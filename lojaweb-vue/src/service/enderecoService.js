import { Endereco } from '@/model/Endereco';
import http from 'config';

export default {
    add: function (endereco = new Endereco) {
        console.log(endereco);
        return http.post("endereco/add", endereco);
    },

    list: function () {
        return http.get("endereco/list");
    },

    get: function (cep) {
        return http.get("endereco/get/" + cep);
    }
};