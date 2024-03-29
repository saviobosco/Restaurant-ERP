<template>
    <div class="col-lg-2 col-6">
        <div @click="selected" class="small-box sale-tab sale__tab_added">
            <div class="inner text-center">
                <p>{{ takeOut.name }}</p>

                <small> <div class="card__active" v-if="activeCard.id === takeOut.id"></div> in progress</small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TakeOutCard",
    emits: [],
    props: ["takeOut", "activeCard"],
    components:{},
    data() {
        return {}
    },
    methods: {
        selected() {
            this.$emit("cardSelected", this.takeOut)
        }
    }
}
</script>
