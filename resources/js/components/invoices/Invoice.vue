<template>
    <div>
        <!-- customer section -->
        <table class="table table-responsive">
            <thead>
            <tr>
                <th style="width: 60%">#Item</th>
                <th>Quantity</th>
                <th>Unit Price</th>

<!--                <th>Discount</th>
                -->
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <invoice-item v-for="product in products" :product="product" :key="product.id" @remove-product="removeProduct"></invoice-item>
            </tbody>
        </table>

        <div class="clearfix">
            <button class="pull-right btn btn-primary" @click="addEmptyItem">Add Item</button>
        </div>

        <div style="margin-top: 20px;">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td style="width:60%;"></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tr>
                            <th colspan="3">Discount</th>
                            <td>
                                <input name="discount" type="text" class="form-control" v-model.number="discount">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">Tax</th>
                            <td>
                                <input name="tax" type="text" class="form-control" v-model.number="vatTax">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">Sub Total</th>
                            <td>
                                <input name="sub_total" type="hidden" class="form-control" v-model.number="subTotal">
                                {{ subTotal }}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">Total</th>
                            <td>
                                <input name="total" type="hidden" class="form-control" v-model.number="total">
                                {{ total}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </div>
</template>


<script>
import InvoiceSearch from "./InvoiceSearch";
import InvoiceItem from "./InvoiceItem";
export default {
    name:"Invoice",
    emits: [],
    components: {InvoiceItem, InvoiceSearch},
    data() {
        return {
            products: [],
            discount: 0,
            vatTax: 0
        }
    },
    computed: {
        subTotal() {
            let subTotal = 0;
            this.products.forEach((product) => {
                subTotal += +product.price * product.quantity;
            })
            subTotal = Math.round((subTotal + Number.EPSILON) * 100) / 100;
            return subTotal;
        },
        total() {
            let total = 0;
            this.products.forEach((product) => {
                total += product.price * product.quantity
            })
            total = Math.round((total + Number.EPSILON) * 100) / 100;
            total = total - this.discount + this.vatTax;
            return total;
        }
    },
    methods: {
        addProductToInvoice(product) {
            if (this.products.length === 0) {
                this.products.push({
                    id: product.id,
                    product_id: product.id,
                    item_id: product.item_id,
                    name: product.name,
                    price: product.price,
                    quantity: 1
                });
            } else {
                // check if it exists
                let productExist = this.products.find((invoiceProduct) => invoiceProduct.id === product.id);
                if (productExist !== undefined) {
                    productExist.quantity++;
                } else {
                    this.products.push({
                        id: product.id,
                        product_id: product.id,
                        item_id: product.item_id,
                        name: product.name,
                        price: product.price,
                        quantity: 1
                    });
                }
            }
        },
        addEmptyItem(event) {

            event.preventDefault();
            const id = Math.random().toString(20).substr(2,6)
            this.products.push({
                id: id,
                item_id: null,
                product_id: null,
                name: '',
                price: 0,
                quantity: 1
            })
        },
        removeProduct(product_id) {
            this.products = this.products.filter((product) => product.id !== product_id);
        }
    }
}
</script>
