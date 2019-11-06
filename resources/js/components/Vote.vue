<template>
        <div class="d-flex flex-column align-content-around  vote-controls">
            <a href="#"
               :title="title('up')" class="vote-up" :class="classes" >
                <i class="fas fa-caret-up fa-2x"></i>
            </a>
            <span class="votes-count">{{count}}</span>
            <a href="#" :title="title('down')"
               class="vote-down" :class="classes">
                <i class="fas fa-caret-down fa-2x"></i>
            </a>
            <favorite :question="model" v-if="name==='question'"></favorite>
            <accept :answer="model" v-else></accept>
        </div>
</template>

<script>
    import favorite from "./Favorite"
    import accept from "./Accept"
    export default {
        name: "Vote",
        props:['name','model'],
        components:{favorite,accept},
        data(){
            return {
                count:this.model.votes_count
            }
        },
        computed:{
            classes(){
                return this.signedIn ?'':'off';
            }
        },
        methods: {
            title(voteType) {
                let titles = {
                    up: `This ${this.name} is useful`,
                    down: `This ${this.name} is not useful`,
                };
                return titles[voteType];
            }
        }
    }
</script>

<style scoped>

</style>
