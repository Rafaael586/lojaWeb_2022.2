<script>
import { RouterLink, useRoute } from 'vue-router';
import { User } from "@/model/User";
import router from "@/router";

//let usuario = new User();

export default {
    name: 'NavBar',
    data() {
        return {
            usuario: new User()
        }
    },
    methods: {
        getUser() {
            let user = JSON.parse(sessionStorage.getItem("user"))
            this.usuario = (typeof user == 'undefined' || user == null) ? null : user;
        },
        logoff() {
            sessionStorage.clear();
            //sessionStorage.setItem("user", null);
            this.usuario = null;
            this.$router.push("/");
        }
    },
    mounted() {
        this.getUser();
    }
}
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <RouterLink class="navbar-brand" to="/">Loja WEB</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <RouterLink class="nav-link active" aria-current="page" to="/">Home</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/about">About</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/user/list">Lista de Usuarios</RouterLink>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>

                <!-- Delogado -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" v-if="usuario == null">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/user/add">Cadastro</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/user/enter">Entrar</RouterLink>
                    </li>
                </ul>

                <!-- logado -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" v-else>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/user/add">{{ usuario.nome }}
                        </RouterLink>
                    </li>
                    <li class="nav-item pointer">
                        <a class="nav-link" @click="logoff()">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.pointer {
    cursor: pointer;
}
</style>