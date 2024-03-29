<template>
    <div class="col-lg-3 col-6">
        <div class="small-box sale-tab sale__tab_added" @click="addItem">
            <div class="inner text-center">
                <p>{{ product.name }}</p>
                <small>( <span> {{ product.price}} </span>) </small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductCard",
    emits: [],
    props: ["product"],
    components:{},
    data() {
        return {
        }
    },
    methods: {
        addItem() {
            console.log(this.product)
            this.$emit("addItem", this.product)
        }
    }
}
</script>
