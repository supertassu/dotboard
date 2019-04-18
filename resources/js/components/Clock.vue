<template>
    <tile :position="position" class="center">
        <div>
            <div class="text-grey">{{ date }}</div>
            <div class="text-4xl">{{ time }}</div>
        </div>
    </tile>
</template>

<script>
    import moment from 'moment-timezone';
    import Tile from './atoms/Tile';

    export default {
        components: {Tile},
        props: {
            position: String
        },
        data() {
            return {
                date: '',
                time: ''
            }
        },
        mounted() {
            this.refreshTime();
            setInterval(this.refreshTime, 1000);
        },
        methods: {
            refreshTime() {
                this.date = moment()
                    .format('DD/MM/YYYY');
                this.time = moment()
                    .format('HH:mm:ss');
            }
        }
    }
</script>
