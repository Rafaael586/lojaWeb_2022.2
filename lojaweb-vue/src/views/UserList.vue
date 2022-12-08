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
                    this.Usuarios = res
                }).catch(error => {
                    console.log(error);
                    alert("Erro ao pegar a lista de usuário!");
                })
        },
        get(id) {
            userService.get(id)
                .then(res => {
                    this.usuario = res
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
                <tr v-for="usuario in Usuarios" :key="usuario">
                    <td>{{ usuario.id_usuario }}</td>
                    <td>{{ usuario.nome }}</td>
                    <td>{{ usuario.email }}</td>
                    <td>{{ usuario.data_nasc }}</td>
                    <td>{{ usuario.cpf }}</td>
                    <td>{{ usuario.foto }}</td>
                    <!-- <td>{{ usuario.senha }}</td> -->
                    <td>{{ usuario.telefone }}</td>
                    <td>{{ usuario.ativo }}</td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<style>

</style>