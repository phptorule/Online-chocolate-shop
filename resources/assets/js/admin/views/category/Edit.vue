<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Category
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
                                    <input type="text" v-if="category.translate && l.code in category.translate" v-model="category.translate[l.code].name" class="form-control" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Short description</label>
                                    <input type="text" v-if="category.translate && l.code in category.translate" v-model="category.translate[l.code].short_description" class="form-control" placeholder="Short Description" />
                                </div>
                            </div>
                        </div>

                        <form novalidate>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" disabled readonly v-model="category.code" class="form-control" id="code" placeholder="Code" />
                            </div>

                            <div class="form-group">
                                <label for="code">Position</label>
                                <input type="text" v-model="category.position" class="form-control" id="position" placeholder="Position" />
                            </div>

                            <div class="form-group">
                                <label for="code">Image</label>
                                <input type="file" @change="(e) => { category.tmp_image = e.target.files[0]; }" />
                                <img class="img-fluid" v-if="category.image" :src="'/storage/' + category.image.replace('public', '')" alt="Image" />
                            </div>

                            <div class="form-group" v-if=" ! (['70g', '12g', '200g', '2000g'].indexOf(category.code) + 1)">
                                <label for="code">Color</label>
                                <!-- <input type="color" class="form-control" v-model="category.color" /> -->
                                <photoshop-picker v-model="category.color" />
                            </div>

                            <button type="button" @click="eidtCategory()" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import { Photoshop } from 'vue-color';

export default {
    data() {
        return {
            langs : [],
            category : {
                name : "",
                code : "",
                position : 0,
                image : "",
                short_description : "",
                color : { hex : "#ffffff" },
                translate : {}
            }
        }
    },
    name: 'EditCategory',
    mounted() {
        this.getLangs();
        this.getCategory();
    },    
    components: {
        'photoshop-picker': Photoshop
    },
    methods : {
         changeLange(id) {
            this.langs = this.langs.map((l) => {
                l.default = l.id == id ? true : false;
                return l; 
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
        getLangs() {
            let self = this;
            axios.get('/api/langs/get')
                .then((res) => {
                   self.langs = res.data;
                });
        },
        getCategory() {
            let self = this;
            axios.get('/api/category/get/' + this.$route.params.id)
                .then((response) => {
                    
                    self.category.translate = {};
                    self.langs.map(function(l) {
                       self.category.translate[l.code] = {};
                    });

                     if (response.data.translate) {                         
                        for(let i in response.data.translate) {
                            self.category.translate[response.data.translate[i].lang.code] = response.data.translate[i].translate;
                        }
                    }

                    self.category.id = response.data.id;
                    self.category.code = response.data.code;
                    self.category.position = response.data.position;
                    self.category.image = response.data.image;
                    self.category.color = { hex : response.data.color };
                });
        },
        eidtCategory() {
            let convertedField = [
                'translate'
            ];
            
            this.category.color = this.category.color.hex;

            let fd = new FormData;

            for(let i in this.category) {
                if (convertedField.indexOf(i) + 1) {
                    fd.append(i, JSON.stringify(this.category[i]));
                    continue;
                }
                fd.append(i, this.category[i]);
            }

            axios.post('/api/category/edit', fd)
                .then((response) => {
                    this.$router.push('/category/list');
                });
        }
    }
}
</script>
