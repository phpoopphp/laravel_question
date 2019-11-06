<template>
    <div>
        <a href="#" title="Click to mark as favorite (Click again to undo)"
           :class="classes" @click.prevent="toggle">
            <i class="fas fa-star fa-2x"></i> <span class="favorites-count">
            {{count}}
        </span>
        </a>

    </div>
</template>

<script>
    export default {
        name: "Favorite",
        props: ['question'],
        data() {
            return {
                count: this.question.favorites_count,
                isFavorited: this.question.is_favorited,

            }
        },
        methods: {
            toggle() {
                if(! this.signedIn){
                    return this.$toast.warning('Istifadeci girisi etmelisiz','Warning',{
                        position:'bottomLeft',
                        timeout:3000
                    });
                    return ;
                }
                this.isFavorited ? this.destroy() : this.create();
            },

            destroy() {
                this.count--;
                this.isFavorited = false;
                axios.delete(this.endpoint)
                    .then((res) => {

                        this.$toast.info(res.data.message, 'Diqqet !!');
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            },

            create() {
                this.count++;
                this.isFavorited = true;
                axios.post(this.endpoint)
                    .then((res) => {
                        this.$toast.success(res.data.message, 'Tebrikler');
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            }
        },
        computed: {
            classes() {
                return [
                    'favorite ', 'mt-2',
                    !this.signedIn ? 'off' : (this.isFavorited ? 'favorited' : '')
                ]
            },
            endpoint(){
                return `/questions/${this.question.slug}/favorites`;
            }
        }
    }
</script>

<style scoped>

</style>
