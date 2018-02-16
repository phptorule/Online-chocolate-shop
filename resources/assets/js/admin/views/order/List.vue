<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List Orders
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</td>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="orders.length" v-for="o in orders" v-bind:key="o.id">
                                        <td>{{ o.id }}</td>
                                        <td>{{ o.phone }}</td>
                                        <td>{{ o.email }}</td>
                                        <td>
                                            <span>
                                                {{ o.cart }}
                                            </span>
                                        </td>
                                        <td>
                                           {{ o.status}}
                                        </td>
                                    </tr>
                                    <tr v-if=" ! orders.length">
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
    name: 'ListOrder',
    data() {
        return {
            orders : []
        }
    },
    mounted() {
        this.getOrder();
    },
    methods : {
        getOrder() {
            let self = this;
            axios.get('/api/order/get')
                .then((response) => {
                    self.orders = response.data;
                });
        }
    }
}
</script>
