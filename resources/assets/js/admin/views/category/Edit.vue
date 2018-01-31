<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Category
                    </div>
                    <div class="card-body">
                        <form novalidate>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" v-model="category.name" class="form-control" id="name" placeholder="Name" />
                            </div>

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

                            <div class="form-group">
                                <label for="code">Short description</label>
                                <textarea type="text" v-model="category.short_description" class="form-control" id="description" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="code">Color</label>
                                <input type="color" class="form-control" v-model="category.color" />
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

export default {
    data() {
        return {
            category : {}
        }
    },
    name: 'EditCategory',
    mounted() {
        this.getCategory();
    },
    methods : {
        getCategory() {
            let self = this;
            axios.get('/api/category/get/' + this.$route.params.id)
                .then((response) => {
                    self.category = response.data;
                });
        },
        eidtCategory() {

            let fd = new FormData
            for(let i in this.category) {
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
