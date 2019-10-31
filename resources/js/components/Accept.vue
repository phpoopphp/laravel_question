<template>
    <div>
        <a v-if="canAccept"
           title="Mark this answer as best answer"
           @click.prevent="create"
           :class="classes" >
            <i class="fas fa-check fa-2x"></i>
        </a>

        <a v-if="accepted" href="#" title="The question owner accepted this answer as best answer"
           :class="classes">
            <i class="fas fa-check fa-2x"></i>
        </a>
    </div>
</template>

<script>
    export default {
        name: "Accept",
        props:['answer'],
        data(){
            return {
                isBest: this.answer.is_best,
                id:this.answer.id
            }
        },
        methods:{
              create(){
                 axios.post(this.endpoint)
                     .then((res)=>{
                        this.$toast.success(res.data.message,'Succes',{
                            timeout:3000,
                            position:'bottomLeft'
                        });
                        this.isBest=true;
                     })
                     .catch((err)=>{
                         console.log(err);
                     });
              }
        },
        computed:{
            canAccept(){
                return true;
            },
            accepted(){
                return ! this.canAccept && this.isBest;
            },
            classes(){
                return [
                   this.isBest? 'vote-accepted':'',
                    'mt-2'
                ]
            },
            endpoint(){
                return `/answers/${this.id}/accept`;
            }
        },

    }
</script>

<style scoped>

</style>
