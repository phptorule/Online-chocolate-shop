<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       Edit Products
                    </div>
                    <div class="card-body">
                        <form novalidate>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" v-model="product.name" class="form-control" id="name" placeholder="Name" />
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" v-model="product.category_id" class="form-control">
                                    <option :value="c.id" v-for="c in category" v-bind:key="c.id">{{ c.name }}</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="name">Picture</label>
                                <input type="file" name="form-control-file" @change="(e) => { product.tmp_image = e.target.files[0]; }" />
                                <img v-if="product.image" :src="'/storage/' + product.image.replace('public', '')" alt="Image" />
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="price" v-model="product.price" class="form-control" id="price" placeholder="Price" />
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" v-model="product.description" id="description" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control" v-model="product.short_description" id="short_description" placeholder="Short Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" v-model="product.position" class="form-control" id="position" placeholder="Position" />
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" v-model="product.status">
                                    <option value="active">Active</option>
                                    <option value="deleted">Deleted</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <div class="input-group">
                                    <div class="input-group-addon"></div>
                                    <input type="color" class="form-control" v-model="product.color" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="color">Active effect</label>
                                <div class="input-group">
                                    <div class="input-group-addon"></div>
                                    <input type="color" class="form-control" v-model="product.active_effect" />
                                </div>
                            </div>

                            <button type="button" @click="eidtProduct()" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    data() {
        return {
            category : [],
            product : {
                name : "",
                category_id : 0,
                price : 0.0,
                description : "",
                short_description : "",
                position : 0,
                status : "active",
                image : false,
                color : "#ffffff",
                tmp_image: false
            }
        }
    },
    name: 'EditProducts',
    mounted() {
        
        this.getProduct();
        this.getCategory();

    },
    methods : {
        getProduct() {
            let self = this;
            axios.get('/api/product/get/' + this.$route.params.id)
                .then((response) => {
                    self.product = response.data;
                });
        },
        eidtProduct() {
            
            let fd = new FormData
            for(let i in this.product) {
                fd.append(i, this.product[i]);
            }
            
            axios.post('/api/product/edit', fd)
                .then((response) => {
                    this.$router.push('/products/list');
                });
        },
        getCategory() {
            let self = this;
            axios.get('/api/category/get')
                .then((response) => {
                    self.category = response.data;
                });
        }
    }
}
</script>
