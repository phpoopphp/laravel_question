<template>
    <div class="card-text">
        <form method="post" @submit.prevent="create">
            <div class="form-group">
                <label for="body">You Answer</label>
                <textarea name="body" id="body" v-model="body"
                          class="form-control" cols="5" rows="5" required></textarea>

            </div>
            <div class="form-group">
                <input type="submit" :disabled="!isInvalid" value="Add" class="btn btn-block btn-primary">
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "NewAnswer",
        props: ['question'],
        computed: {
            endpoint() {
                return `/questions/${this.question.slug}/answers`;
            },
            isInvalid() {
                return (this.signedIn && (this.body.trim().length > 3));
            }
        },
        data() {
            return {
                body: ''
            }
        },
        methods: {
            create() {
                axios.post(this.endpoint, {
                    body: this.body
                }).then(({data}) => {
                    this.$toast.success(data.success,'Tebrikler');
                    this.body='';
                    window.location.reload();
                }).catch((err) => console.log('xeta var'));
            },

        }
    }
</script>

<style scoped>

</style>
