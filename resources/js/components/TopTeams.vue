<template>
    <tile :position="position" class="">
        <div>
            <h1 class="text-2xl mb-3">
                Top teams
            </h1>

            <div v-for="team in data" class="flex mb-2">
                <div class="w-1/2">
                    <h2 class="text-lg">
                        {{ team.name || team.username || 'someone' }}
                    </h2>

                    <span class="text-sm text-gray-700">
                        {{ team.amount }}
                        reports
                    </span>
                </div>

                <div class="w-1/2 text-right">
                    <span class="block text-lg text-shadow text-right">
                        {{ team.score }}
                    </span>

                    <span class="block text-xs text-gray-600">
                        score
                    </span>
                </div>
            </div>
        </div>
    </tile>
</template>

<script>
    import Tile from './atoms/Tile';

    export default {
        components: {Tile},
        props: {
            position: String
        },
        data() {
            return {
                data: {}
            }
        },
        mounted() {
            this.loadData();
            setInterval(() => this.loadData(), 15000);
        },
        methods: {
            loadData: function() {
                axios
                    .get('/api/leaderboard')
                    .then(response => {
                        this.data = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
    }
</script>
