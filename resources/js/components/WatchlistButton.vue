<template>
    <div class="container">
        <button class="text-primary w-100 border-0 bg-black" @click = "addToWatchlist" v-text="buttonText"></button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        methods:{
            addToWatchlist(){
                axios.post('/watchlist/' + this.movie_id).then(response =>{
                    console.log(response.data);
                }).catch(errors =>{
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });
            }
        },
        props:['movie_id'],
        data:function(){

        },
        computed:{
            buttonText(){
                return "+Watchlist";
            }
        }
    }
</script>
