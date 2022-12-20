<script>
import NavBar from '@/components/NavBar.vue';
import userService from '@/service/userService';

export default {
    components: { NavBar },
    data() {
        return {
            usuarios: [
                //Mock
                {
                    "id_usuario": null,
                    "nome": "Maria Silva",
                    "foto": null,
                    "cpf": "4562345233",
                    "email": "maria@email.com",
                    "telefone": "(21)5555-898989",
                    "data_nasc": "2000-09-10",
                    "senha": "123456",
                    "ativo": 1
                }
            ],
            usuario: {}
        }
    },
    mounted() {
        this.list();
        this.get(1);
    },
    methods: {
        listaOld() {
            userService.listOld(dados => {
                this.usuarios = JSON.parse(dados);
            });
        },
        list() {
            userService.list()
                .then(res => {
                    console.log(res);
                    this.usuarios = res.data
                }).catch(error => {
                    console.log(error);
                    alert("Erro ao pegar a lista de usuário!");
                })
        },
        get(id) {
            userService.get(id)
                .then(res => {
                    console.log(res);
                    this.usuario = res.data
                }).catch(error => {
                    console.log(error);
                    alert("Erro ao pegar dados do usuário!");
                })
        },
    }
}
</script>

<template>
    <NavBar></NavBar>
    <section class="container">
        <h2>Usuarios</h2>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data Nasc.</th>
                <th>CPF</th>
                <th>Foto Perfil</th>
                <!-- <th>Senha</th> -->
                <th>Tel.</th>
                <th>Ativo</th>
            </thead>
            <tbody>
                <tr v-for="user in usuarios" :key="user">
                    <td>{{ user.id_usuario }}</td>
                    <td>{{ user.nome }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.data_nasc }}</td>
                    <td>{{ user.cpf }}</td>
                    <td>{{ user.foto }}</td>
                    <!-- <td>{{ user.senha }}</td> -->
                    <td>{{ user.telefone }}</td>
                    <td>{{ user.ativo }}</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="container">

        <h2>Usuarios Cards</h2>
        <div class="d-flex">
            <div class="card" style="width: 18rem;" v-for="user in usuarios" :key="user.id_usuario">
                <img :src="user.foto" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ user.nome }}</h5>
                    <p class="card-text">ID: {{ user.id_usuario }} </p>

                    <p class="card-text">{{ user.email }}</p>
                    <p class="card-text">{{ user.data_nasc }}</p>
                    <p class="card-text">{{ user.cpf }}</p>
                    <p class="card-text"></p>
                    <!-- <p class="card-text">{{ user.senha }}</p> -->
                    <p class="card-text">{{ user.telefone }}</p>
                    <p class="card-text">{{ user.ativo }}</p>
                    <a href="#" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>