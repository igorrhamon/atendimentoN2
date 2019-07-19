<template>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong> Laravel Vue JS Infinite Scroll - ItSolutionStuff.com</strong></div>

                    <div class="card-body">
                        <div>
                            <p v-for="item in list">
                                <a v-bind:href="'https://itsolutionstuff.com/post/'+item.slug" target="_blank">{{item.id}}</a>
                            </p>
                            <infinitytecnico @distance="1" @infinite="infiniteHandler"></infinitytecnico>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'infinitytecnico',
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                list: [],
                page: 1,
            };
        },
        methods: {
            infiniteHandler($state) {
                let vm = this;

                this.$http.get('api/infinityTecnicos?page='+this.page)
                    .then(response => {
                        return response.json();
                    }).then(data => {
                    $.each(data.data, function(key, value) {
                        vm.list.push(value);
                    });
                    $state.loaded();
                });

                this.page = this.page + 1;
            },
        },
    }
</script>