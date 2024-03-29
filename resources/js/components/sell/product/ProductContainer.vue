<template>
<div>
    <div class="form-group">
        <input id="search-tab" type="text" class="form-control" autofocus>
    </div>
    <div class="row">

        <product-card @addItem="addItem" v-for="product in products" :product="product" :key="'product' + product.id"></product-card>

    </div>
</div>
</template>

<script>
import ProductCard from "./ProductCard";

export default {
    name: "ProductContainer",
    components:{ProductCard},
    props: ["products"],
    data() {
        return {
        }
    },
    methods: {
        addItem(item) {
            console.log("inside product container >>> ", item)
            this.$emit("addItem", item)
        }
    }
}
</script>
