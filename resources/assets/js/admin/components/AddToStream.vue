<template>
    <div class="message">
        <div class="message-header">
            Push
        </div>
        <div class="message-body">
            <form method="post" @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                <p class="control">
                    <textarea class="textarea" name="body" v-model="form.body"></textarea>
                    <span class="help is-danger" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></span>
                </p>
                <p class="control">
                    <input class="button is-primary" type="submit" value="Send" :disabled="form.errors.any()">
                </p>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                body: ''
            })
        };
    },
    methods: {
        onSubmit() {
            this.form.post('/statuses').then(status => this.$emit('complited', status));
        }
    }
}
</script>