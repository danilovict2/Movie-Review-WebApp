<template>
    <span class="container d-flex flex-column justify-content-start align-items-start" style="margin-left: -11px;">
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
            <a class="text-primary w-100 border-0 bg-black d-flex mx-0" :href="'/review/' + this.movie_id + '/rate'"
                style="text-decoration: none;">
                <span class="rateStarUnfilled" v-if="!this.myRating">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                        class="ipc-icon ipc-icon--star-border sc-329a6734-4 jzoFML" id="iconContext-star-border"
                        viewBox="0 0 24 24" fill="currentColor" role="presentation">
                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                        <path
                            d="M19.65 9.04l-4.84-.42-1.89-4.45c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5 4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.73 3.67-3.18c.67-.58.32-1.68-.56-1.75zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z">
                        </path>
                    </svg>
                    Rate
                </span>
                <span class="rateStarFilled" v-else>
                    <svg width="29" height="29" xmlns="http://www.w3.org/2000/svg" class="ipc-icon ipc-icon--star-inline pb-1 pt-1"
                        id="iconContext-star-inline" viewBox="0 0 24 24" fill="currentColor" role="presentation">
                        <path
                            d="M12 20.1l5.82 3.682c1.066.675 2.37-.322 2.09-1.584l-1.543-6.926 5.146-4.667c.94-.85.435-2.465-.799-2.567l-6.773-.602L13.29.89a1.38 1.38 0 0 0-2.581 0l-2.65 6.53-6.774.602C.052 8.126-.453 9.74.486 10.59l5.147 4.666-1.542 6.926c-.28 1.262 1.023 2.26 2.09 1.585L12 20.099z">
                        </path>
                    </svg>
                    <span class="pt-1 pl-1">{{ this.myRating[0]['review'] }}</span>

                </span>
            </a>
        </span>
    </span>
</template>

<script>
import axios from 'axios';
export default {
    created() {
        axios.get('/review/average/' + this.movie_id).then(response => {
            this.averageRating = response.data;
        });
        axios.get('/review/isReviewed/' + this.movie_id).then(response => {
            this.myRating = response.data;
        }).catch(errors => {

        });
    },
    methods: {

    },
    props: ['movie_id'],
    data: function () {
        return {
            averageRating: 0.0,
            myRating: 0
        }
    },
    computed: {

    }
}
</script>
