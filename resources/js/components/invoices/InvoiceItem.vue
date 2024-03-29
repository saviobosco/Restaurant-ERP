<template>
    <tr>
        <td>
            <input type="hidden"  v-model="product.item_id">
            <input type="hidden" v-model="product.product_id">
            <input type="text" class="form-control" v-model="product.name" disabled>
        </td>
        <td>
            <input type="number" class="form-control" v-model="product.quantity">
        </td>
        <td>
            <input type="number" class="form-control" v-model="product.price" disabled>
        </td>

<!--        <td>
            <div>
                <select name="" id="" class="form-control">
                    <option value="">Percentage</option>
                    <option value="">Flat Amount</option>
                </select>
            </div>
            <div>
                <input type="number" class="form-control">
            </div>
        </td>-->

        <td>
            <input type="text" class="form-control" v-model="total" disabled>
        </td>
        <td>
            <i @click="removeProduct(product.id)" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></i>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['product'],
    name: "InvoiceItem",
    data() {
        return {}
    },
    computed: {
        total() {
            return this.product.quantity * this.product.price;
        }
    },
    methods: {
        removeProduct(product_id) {
            this.$emit('remove-product', product_id);
        }
    }
}
</script>
