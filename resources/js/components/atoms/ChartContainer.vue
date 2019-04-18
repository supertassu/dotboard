<script>
    import { Bar } from 'vue-chartjs'

    export default {
        name: 'chart-container',
        extends: Bar,
        props: ['data', 'options'],
        mounted () {
            this.renderChart(this.data, this.options)
        }
    }
</script>
