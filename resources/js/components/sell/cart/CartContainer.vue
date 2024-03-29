<template>
    <div class="card-body bg__light__dark">
        <div class="clearfix">
            <span>{{ activeCard.name}}</span> | <a href="#">add customer</a>
            <div class="float-right">
                <a href="#">clear</a> | <a href="#">swap</a>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control">
        </div>
        <div class="">
            <table class="table">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <cart-item v-for="item in activeCard.items" :item="item" :key="'item'+ item.id"></cart-item>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-6"><button @click="printOrder" class="btn-primary btn-block btn">Order Ticket</button></div>
            <div class="col-sm-6"><button @click="chargeCart" class="btn-success btn-block btn">Charge {{ total}} </button></div>
        </div>

    </div>
</template>

<script>
import CartItem from "./CartItem";

export default {
    name: "CartContainer",
    props: ["activeCard"],
    components:{CartItem},
    data() {
        return {}
    },
    computed: {
        total() {
            let total = 0;
            this.activeCard.items.forEach((product) => {
                total += product.price * product.quantity
            });

            total = Math.round((total + Number.EPSILON) * 100) / 100;
            this.calculatedTotal = total;
            return total;
        }
    },
    methods: {
        chargeCart() {
            if (this.activeCard.items.length > 0) {
                this.$emit("completeCheckout")
            } else {
                alert("you cant charge empty cart.")
            }
        },
        printOrder() {
            alert("This will order the ticket.")
        }
    }
}
</script>
