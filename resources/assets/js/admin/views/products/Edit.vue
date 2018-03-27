<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       Edit Products
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item" v-for="l in langs" :key="l.id">
                                <a class="nav-link" @click="changeLange(l.id)" :class="{'active' : l.default}">{{ l.name }}</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane fade show" :class="{'active' : l.default}" v-for="l in langs" :key="l.id" >
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" v-if="product.translate && l.code in product.translate" v-model="product.translate[l.code].name" class="form-control" placeholder="Name" />
                                </div>
                            </div>
                        </div>

                        <form novalidate>
                            
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" v-model="product.category_id" class="form-control">
                                    <option :value="c.id" v-for="c in category" v-bind:key="c.id">{{ c.name }}</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="name">Picture</label>
                                <input type="file" name="form-control-file" @change="(e) => { product.tmp_image = e.target.files[0]; }" />
                                <img v-if="product.image" class="img-fluid" :src="'/storage/' + product.image.replace('public', '')" alt="Image" />
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="price" v-model="product.price" class="form-control" id="price" placeholder="Price" />
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
                                <label for="color">Active effect</label>
                                <div class="input-group">
                                    <div class="input-group-addon"></div>
                                    <input type="color" class="form-control" v-model="product.active_effect" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="color">Hover effect</label>
                                <div class="input-group">
                                    <label class="switch switch-3d switch-primary">
                                        <input type="checkbox" v-model="product.hover_check" class="switch-input" value="true" />
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                                <div class="card" v-if=" ! product.hover_check">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="hover_text">Hover Text</label>
                                            <textarea class="form-control" v-model="product.hover_text" id="hover_text" placeholder="Hover text"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="hover_text">Hover Color</label>
                                            <input type="color" class="form-control" v-model="product.hover_color" />
                                        </div>
                                    </div>
                                </div>
                                 <div class="card" v-if="product.hover_check">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="hover_text">Hover Image</label>
                                            <input type="file" @change="(e) => { product.hover_img = e.target.files[0]; }" />
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <button type="button" @click="editProduct()" class="btn btn-default">Update</button>
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
            langs : [],
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
                tmp_image: false,
                hover_img : false,
                translate : {}
            }
        }
    },
    name: 'EditProducts',
    mounted() {
        this.getLangs();
        this.getProduct();
        this.getCategory();
    },
    methods : {
        changeLange(id) {
            this.langs = this.langs.map((l) => {
                l.default = l.id == id ? true : false;
                return l; 
            });
        },
        getLangs() {
            let self = this;
            axios.get('/api/langs/get')
                .then((res) => {
                   self.langs = res.data;
                   self.langs.map(function(l) {
                       self.product.translate[l.code] = {};
                   });
                });
        },
        convert(obj) {
            for(var o in obj) {
                if (obj[o] * 1) {
                    obj[o] = obj[o] * 1;
                }
            }
            return obj;
        },
        getProduct() {
            let self = this;
            axios.get('/api/product/get/' + this.$route.params.id)
                .then((response) => {
                    self.product.id = this.$route.params.id;
                    self.product.category_id = response.data.category_id;
                    self.product.image = response.data.image;
                    self.product.price = response.data.price;
                    self.product.position = response.data.position;
                    self.product.status = response.data.status;
                    self.product.active_effect = response.data.active_effect;

                    self.product.hover_text = response.data.hover_text;
                    self.product.hover_color = response.data.hover_color;

                    if (response.data.translate) {
                        
                        for(let i in response.data.translate) {
                            self.product.translate[response.data.translate[i].lang.code] = response.data.translate[i].translate;
                        }
                    }
                });
        },
        editProduct() {
            
            this.product.hover_check = this.product.hover_check ? 1 : 0;
            
             let convertedField = [
                'translate'
            ];

            let fd = new FormData;
            for(let i in this.product) {
                 if (convertedField.indexOf(i) + 1) {
                    fd.append(i, JSON.stringify(this.product[i]));
                    continue;
                }
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
