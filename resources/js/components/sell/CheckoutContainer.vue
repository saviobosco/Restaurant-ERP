<template>

    <div>
        <div class="card-body" v-if="!isCompleteCheckout">
            <div class="row">
                <div class="col-sm-1">

                    <ul class="sale__side__tab">
                        <li class="side__nav__item"><a class="side__nav__link" href="">All </a> </li>
                        <li><a class="side__nav__link" href=""> Top</a> </li>
                        <li><a class="side__nav__link" href="">General</a></li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <product-container @addItem="addItem" :products="products"></product-container>
                </div>

                <div class="col-sm-5">
                    <cart-container @completeCheckout="completeCheckout" :activeCard="activeCard"></cart-container>
                </div>
            </div>
        </div>

        <div v-if="isCompleteCheckout">
            <complete-checkout @removeOrder="removeOrder"  @goBack="goBack" :activeCard="activeCard"></complete-checkout>
        </div>



    </div>

</template>

<script>

import ProductContainer from "./product/ProductContainer";
import CartContainer from "./cart/CartContainer";
import CompleteCheckout from "./CompleteCheckout";

export default {
    name: "CheckoutContainer",
    emits: [],
    props: ["products", "activeCard"],
    components:{ProductContainer, CartContainer, CompleteCheckout},
    data() {
        return {
            isCompleteCheckout: false
        }
    },
    methods: {
        addItem(item) {
            console.log(item);
            const index = this.activeCard.items.findIndex(element => {
                if (element.id === item.id) {
                    return true;
                }
                return false;
            });
            if (index !== -1) {
                item = this.activeCard.items[index];
                item.quantity += 1;
                item.total = item.quantity * item.price;
                this.activeCard.items[index] = item;
            } else {

                this.activeCard.items.push({
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    quantity : 1,
                    total: item.price});
            }
            this.$emit("updateRecord", this.activeCard);
        },
        completeCheckout() {
            this.isCompleteCheckout = true;
        },
        goBack() {
            this.isCompleteCheckout = false;
        },
        removeOrder(order) {
            console.log("inside checkout >>>>", order);
            this.$emit("removeOrder", order);
        }
    }
}
</script>
