<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List Product
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</td>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</td>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="products.length" v-for="p in products" v-bind:key="p.id">
                                        <td>{{ p.id }}</td>
                                        <td>
                                            <span v-for="t in p.translate" v-bind:key="t.id"><span class="badge badge-secondary">{{ t.lang.name }}</span> : {{ t.translate.name }} </span>
                                        </td>
                                        <td>{{ p.category.name }}</td>
                                        <td>{{ p.price }}</td>
                                        <td>{{ p.status }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <router-link class="btn btn-primary" :to="{ path: '/products/edit/' + p.id}">Edit</router-link>
                                                <!-- <a :href="'#/products/edit/' + p.id" class="btn btn-primary">Edit</a> -->
                                                <button type="button" @click="deleteProduct(p.id)" class="btn btn-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if=" ! products.length">
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

import axios from 'axios';

export default {
    name: 'ListProducts',
    data() {
        return {
            products : []
        }
    },
    mounted() {
        this.getProduct();
    },
    methods : {
        getProduct() {
            let self = this;
            axios.get('/api/product/get')
                .then((response) => {
                    self.products = response.data;
                });
        },
        deleteProduct(id) {
            axios.delete('/api/product/delete/' + id)
                .then((response) => {
                    window.location.reload();
                });
        }
    }
}
</script>
