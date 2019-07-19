<!-- ./resources/assets/js/components/Home.vue -->
<template>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th><a href="#" >Tempo de Atendimento</a></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts" >
                <td>{{ post.id }}</td>
                <td>{{ post.user.name }}</td>
                <td>{{ post.tempoDeAtendimento}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        mounted() {
            console.log('Teste');
            let uri = 'http://127.0.0.1:8000/api/tecnicos';
            this.axios.get(uri).then(response => {
                this.posts = response.data.data;
            });
        },
        methods: {
            ordena(){
                let uri = url('api/tecnicosOrdena');
                this.axios.get(uri).then(response =>{
                   this.posts = response.data.data;
                });
            }
        }
    }
</script>