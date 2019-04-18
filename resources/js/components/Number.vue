<template>
    <tile :position="position" class="center">
        <div v-if="loaded">
            <div class="text-grey">{{ title }}</div>
            <div class="text-4xl">{{ value }}</div>
        </div>
    </tile>
</template>

<script>
    import Tile from './atoms/Tile';

    export default {
        components: {Tile},
        props: [
            'position',
            'title',
            'url'
        ],
        data() {
            return {
                data: {},
                loaded: false
            }
        },
        computed: {
            value() {
                return _.last(this.data).amount;
            }
        },
        mounted() {
            this.loadData();
            setInterval(() => this.loadData(), 30000);
        },
        methods: {
            loadData: function() {
                axios
                    .get(this.url)
                    .then(({data}) => {
                        this.data = data;
                        console.log(this.data);

                        this.loaded = true;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
    }
</script>
