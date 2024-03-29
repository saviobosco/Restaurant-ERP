<template>
    <div class="col-lg-2 col-6">
        <div @click="tableSelected" class="small-box sale-tab sale__tab__default"
             :class="{ 'sale__tab_added':this.dinInTable.active}"
        >
            <div class="inner text-center">
                <p>{{ dinInTable.name }}</p>
                <small v-if="dinInTable.active"> <div class="card__active" v-if="activeCard.id === dinInTable.id"></div>  in progress</small>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "TableCard",
    emits: [],
    props: ['dinInTable', 'activeCard'],
    components:{},
    data() {
        return {

        }
    },
    methods: {
        tableSelected() {
            if (!this.dinInTable.active) {
                this.dinInTable.active = true;
                this.$emit("tableSelected", this.dinInTable)
            }
            this.$emit("cardSelected", this.dinInTable)

        }
    }
}
</script>
