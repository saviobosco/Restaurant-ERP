<template>
    <div class="clearfix" style="margin-bottom: 20px;">
        <div class="row">
            <div class="col-lg-5 col-xs-12">
                <div class="" style="position: relative;">
                    <div class="input-group input-group">
                        <input type="text"
                               id="product-name"
                               autocomplete="no"
                               v-model="queryString"
                               name="table_search"
                               class="form-control pull-right"
                               placeholder="Search Product"
                               @input="searchProducts"
                        >
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"
                                    id="search-products" @click.prevent="searchProducts">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                    <div v-if="products.length > 0 && queryString" class="search-results">
                        <ul>
                            <li v-for="product in products" @click="addProductToInvoice(product)">{{ product.name }} - {{product.price}}</li>
                        </ul>
                    </div>
                    <div class="search-results" v-else-if="queryString && products.length <= 0">
                        <ul>
                            <li>No Products found!</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "InvoiceSearch",
    data() {
        return {
            queryString: "",
            products: []
        }
    },
    methods: {
        searchProducts(event) {
            event.preventDefault();

            if (this.queryString.length > 0) {
                fetch(window.origin + '/items/search?_q='+this.queryString)
                    .then(function(response) {
                    if (response.ok) {
                        return response.json();
                    }
                }).then((data) => {
                    this.products = [];
                    data.forEach((item) => {
                        this.products.push({
                            id: item.id,
                            item_id: item.id,
                            name: item.name,
                            cost: item.cost_price,
                            price: item.sell_price,
                            quantity: item.quantity
                        });
                    });
                });
            }
        },
        addProductToInvoice(product) {
            this.$emit('add-product', product);
            this.queryString = null;
        }
    }
}
</script>



<style scoped>
.search-results {
    border: 1px solid #d2d6de;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    position: absolute;
    z-index: 999;
    background-color: #FFFFFF;
    width: 100%;
}

.search-results ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.search-results li {
    padding: 5px 20px;
    border-bottom: 1px solid #d2d6de;
    cursor: pointer;
}
.search-results li:last-child {
    border-bottom: none;
}
.search-results li:hover {
    background-color: #d2d6de;
}
</style>
