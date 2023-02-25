<template>
    <div class="container">
        <button class="text-primary w-100 border-0 bg-black" @click = "addToWatchlist" v-text="setButtonText"></button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        created(){
            axios.get('/isWatchlisted/' + this.movie_id).then(response =>{
                this.isWatchlisted = response.data;
            });
        },
        methods:{
            addToWatchlist(){
                axios.post('/watchlist/' + this.movie_id).then(response =>{
                    this.isWatchlisted = !this.isWatchlisted;
                }).catch(errors =>{
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }

                });
            }
        },
        props:['movie_id'],
        data:function(){
            return{
                isWatchlisted : false
            }
        },
        computed:{
            setButtonText(){
                return this.isWatchlisted ? "-Watchlist" : "+Wathclist";
            }
        }
    }
</script>
