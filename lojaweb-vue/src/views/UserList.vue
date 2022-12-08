<script>
import NavBar from '@/components/NavBar.vue';
import userService from '@/service/userService';

export default {
    components: { NavBar },
    data() {
        return {
            usuarios: [],
            usuario: {}
        }
    },
    mounted() {
        this.list();
        this.get(14);
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
        }
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
</template>

<style>

</style>