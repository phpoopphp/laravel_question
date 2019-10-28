<template>
    <div></div>
</template>

<script>
    export default {
        name: "Answer",
        props:['answer'],
        data(){
            return{
                editing:false
            }
        },
        methods:{
            update(){
                alert('Update');
            }
        }
    }
</script>

<style scoped>

</style>
