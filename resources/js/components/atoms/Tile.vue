<template>
    <div :style="tilePosition" :class="noClass ? [] : ['tile']">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'tile',
        props: {
            position: {
                type: String,
            },
            noClass: {
                type: Boolean,
                default: false,
            },
        },

        computed: {
            tilePosition() {
                return `grid-area: ${this.positionToGridAreaNotation(this.position)}`;
            },
        },

        methods: {
            positionToGridAreaNotation(position) {
                const [from, to = null] = position.toLowerCase().split(':');

                if (from.length < 2 || (to && to.length < 2)) {
                    return;
                }

                const areaFrom = `${from.substring(1)} / ${this.indexInAlphabet(from[0])}`;
                return to
                    ? `${areaFrom} / ${Number(to.substring(1)) + 1} / ${this.indexInAlphabet(to[0]) + 1}`
                    : areaFrom;
            },

            indexInAlphabet(character) {
                const index = character.toLowerCase().charCodeAt(0) - 96;
                return index < 1 ? 1 : index;
            },
        },
    };
</script>
