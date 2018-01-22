<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="message" v-for="status in statuses">
                    <div class="message-header">
                        <p>
                            {{ status.user.name }} said ...
                        </p>
                        <p>
                            {{ status.created_at | ago | capitalize }}
                        </p>
                    </div>
                    <div class="message-body" v-text="status.body">
                        Text Text Text Text Text Text
                    </div>
                </div>
                
                <add-to-stream @complited="addStatus"></add-to-stream>
            </div>
        </div>
    </div>
</template>

<script>
    /*
    import moment from 'moment';
    import Status from '../models/Status';
    import AddToStream from '../components/AddToStream.vue';
    export default {
        components: {
            AddToStream
        },
        data() {
            return {
                statuses: []
            };
        },
        filters : {
            ago(date) {
                return moment(date).fromNow();
            },
            capitalize(value) {
                return value.toUpperCase();
            }
        },
        created() {
            Status.all(statuses => this.statuses = statuses);
        },
        methods: {
            addStatus(status) {
                this.statuses.unshift(status);
                window.scrollTo(0, 0);
            }
        }
    }*/
    export default {
        
    }
</script>
