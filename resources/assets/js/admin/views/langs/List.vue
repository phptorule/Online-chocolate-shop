<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List Langs
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</td>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <!-- <th>Default</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="langs.length" v-for="o in langs" v-bind:key="o.id">
                                        <td>{{ o.id }}</td> 
                                        <td>{{ o.name }}</td>
                                        <td>{{ o.code }}</td>
                                        <!-- <td>
                                            <input type="radio" :value="o.id" v-model="radio" @change="updateDefault(o.id)" />
                                        </td>  -->
                                    </tr>
                                    <tr v-if=" ! langs.length">
                                        <td colspan="7" class="text-center">
                                            Records not found !
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'ListLangs',
        data() {
            return {
                langs : [],
                radio : 0
            }
        },
        mounted() {
            this.getLangs();
        },
        methods : {
            getLangs() {
                let self = this;
                axios.get('/api/langs/get')
                    .then((response) => {
                        self.langs = response.data;
                        self.radio = self.langs.filter((e) => { return e.default == true; }).shift().id;
                    });
            },
            updateDefault(langs_id) {
                
                let self = this;
                axios.put('/api/langs/update', {'langs_id' : langs_id})
                    .then((response) => {
                        window.location.reload();
                    });
            }
        }
    }
</script>