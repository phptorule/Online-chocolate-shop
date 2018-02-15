<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List Cateogry
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</td>
                                        <th>Name</th>
                                        <th>Code</td>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="category.length" v-for="c in category" v-bind:key="c.id">
                                        <td>{{ c.id }}</td>
                                        <td>{{ c.parent_id ? '-' : '' }}
                                            <span v-for="t in c.translate" v-bind:key="t.id"><span class="badge badge-secondary">{{ t.lang.name }}</span> : {{ t.translate.name }} </span>
                                        </td>
                                        </td>
                                        <td>{{ c.code }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a :href="'#/category/edit/' + c.id" class="btn btn-primary">Edit</a>
                                                <button type="button" @click="deleteCategory(c.id)" class="btn btn-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if=" ! category.length">
                                        <td colspan="4" class="text-center">
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

import axios from 'axios';

export default {
    name: 'ListCateogry',
    data() {
        return {
            category : []
        }
    },
    mounted() {
        this.getCategory();
    },
    methods : {
        getCategory() {
            let self = this;
            axios.get('/api/category/get')
                .then((response) => {
                    self.category = response.data;
                });
        },
        deleteCategory(id) {
            let self = this;
            axios.delete('/api/category/delete/' + id)
                .then((response) => {
                   self.getCategory();
                });
        }
    }
}
</script>
