<script>
import NavBar from '@/components/NavBar.vue';
import userService from '@/service/userService';


export default {
    components: { NavBar },
    data() {
        return {
            Usuarios: []
        }
    },
    mounted() {
        this.lista()
    },
    methods: {
        lista() {
            userService.list(dados => {
                this.Usuarios = JSON.parse(dados);
            });
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