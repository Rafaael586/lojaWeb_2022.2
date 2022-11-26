<script>
import userService from '@/service/userService';


export default {
    //components: { NavBar },
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
            this.Usuarios = userService.list();
        }
    }
}
</script>
<template>

</template>
<style>

</style>