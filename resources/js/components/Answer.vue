<template>
    <div></div>
</template>

<script>
    export default {
        name: "Answer",
        props:['answer'],
        data(){
            return{
                editing:false,
                body:this.answer.body,
                bodyHtml:this.answer.body_html,
                id:this.answer.id,
                question:this.answer.question,
                beforeEditCache:'',
            }
        },
        computed:{
            isInvalid(){
                return this.body.length<3;
            }
        },
        methods:{
            edit(){
              this.beforeEditCache=this.body;
              this.editing=true;
            },
            cancel(){
                this.body=this.beforeEditCache;
                this.editing=false;
            },
            update(){

               axios.patch(`/questions/${this.question.slug}/answers/${this.id}`,{
                   'body':this.body
               })
                   .then((res)=>{
                       this.editing=false;
                       this.bodyHtml=res.data.body_html;
                   })
                   .catch((error)=>{
                       console.log(error.response.data.errors.body[0]);
                   })
            }
        }
    }
</script>

<style scoped>

</style>
