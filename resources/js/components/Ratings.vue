<template>
    <span class="container d-flex flex-column justify-content-start align-items-start align-self-start">
        <span class="imdb">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                class="ipc-icon ipc-icon--star sc-e457ee34-4 dzsYfH" id="iconContext-star" viewBox="0 0 24 24"
                fill="currentColor" role="presentation">
                <path
                    d="M12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72 3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z">
                </path>
            </svg>
            <span class="rating pr-0">{{ this.averageRating }}/10</span>
        </span>
        <span class="rate">
            <a class="text-primary w-100 border-0 bg-black d-flex mx-0" href="/review/{{this.movie_id}}/rate"
                style="text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                    class="ipc-icon ipc-icon--star-border sc-329a6734-4 jzoFML" id="iconContext-star-border"
                    viewBox="0 0 24 24" fill="currentColor" role="presentation">
                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                    <path
                        d="M19.65 9.04l-4.84-.42-1.89-4.45c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5 4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.73 3.67-3.18c.67-.58.32-1.68-.56-1.75zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z">
                    </path>
                </svg>
                Rate
            </a>
        </span>
    </span>
</template>

<script>
import axios from 'axios';
export default {
    created() {
        axios.get('/review/average/' + this.movie_id).then(response =>{
            this.averageRating = response.data;
        });
    },
    methods: {

    },
    props: ['movie_id'],
    data: function () {
        return{
            averageRating : 0.0,
        }
    },
    computed: {

    }
}
</script>
