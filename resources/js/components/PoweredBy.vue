<template>
    <tile :no-class="true" :position="position" class="relative">
        <div class="text-sm text-gray-700 absolute left-0 bottom-0">
            <span class="text-xs block">www.tassu.me &middot; github.com/supertassu</span>
            Leaderboard created by a 14-year-old nerd.
        </div>
    </tile>
</template>

<script>
    import Tile from './atoms/Tile';

    export default {
        components: {Tile},
        props: {
            position: String
        }
    }
</script>
