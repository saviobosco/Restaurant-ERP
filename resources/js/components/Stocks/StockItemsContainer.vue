<template>
    <div>
        <form action="#" method="POST">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="partner">Partner</label>
                        <auto-complete-text-input input-name="partner" @valueSelected="setPartner" :fetch-url="fetchPartnerNamesURL"></auto-complete-text-input>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <h4>Select Item</h4>
                    <hr>
                    <search-item @search-results="getSearchResults"></search-item>
                    <div class="items__container vld-parent" style="min-height: 25vh; height: 30vh; overflow: auto;">
                        <loading :active.sync="isLoadingItems"
                                 :can-cancel="true"
                                 :height="30"
                                 :color="loadingColor"
                                 :is-full-page="false">
                        </loading>
                        <stock-item v-for="item in items" :item="item" :key="item.id" @click="addItemToStock(item.id)"></stock-item>
                    </div>
                </div>


                <div class="col-sm-6">
                    <h4>Stock In Item</h4>
                    <hr style="margin-bottom: 0;">
                    <div  style="min-height: 30vh; height: 35vh;">
                        <stock-item-input v-for="stockItem in stockItems" :item="stockItem" :key="stockItem.id" @remove-item="removeItemFromStock"></stock-item-input>
                    </div>
                    <div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2"><h4>Total</h4></div>
                            <div class="col-sm-7"><h4>Items: {{ totalItems }}</h4></div>
                            <div class="col-sm-3"><h4>Total: <span class="text-primary">+{{ totalItemsCount }}</span> </h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="total_items" :value="totalItemsCount">

            <div class="form-group">
                <textarea class="form-control" v-model="memo" cols="30" rows="2" placeholder="Input memo"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" @click.prevent="submitStockInForm" class="btn btn-primary">Stock In</button>
            </div>
        </form>


    </div>
</template>

<script>
import StockItem from "./StockItem.vue";
import StockItemInput from "./StockItemInput.vue";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    components: {StockItemInput, StockItem, Loading},
    data() {
        return {
            memo: "",
            partner: "",
            items: [],
            stockItems: [],
            stockItemCountTotal: 0,
            isLoadingItems: false,
            loadingColor: "#007bff",
            fetchPartnerNamesURL: window.origin + '/partners/get-names'
        }
    },
    computed: {
        totalItems() {
            return this.stockItems.length;
        },
        totalItemsCount() {
            let totalCount = 0;
            if (this.stockItems.length <= 0) {
                return 0;
            }
            this.stockItems.forEach(item => {
                totalCount += +item.quantity;
            });
            this.stockItemCountTotal = totalCount;
            return totalCount;
        }
    },
    methods: {
        setPartner(partner) {
            this.partner = partner;
        },
        loadItems() {
            this.isLoadingItems = true;
            fetch(window.origin+'/api/items').then(function(response){
                if (response.ok) {
                    return response.json();
                }
            }).then((data) => {
                this.isLoadingItems = false;
                const items = [];
                for (const i in data) {
                    items.push({
                        id : data[i].id,
                        name : data[i].name,
                        current_quantity : data[i].quantity,
                        //attributes: data[i].item_attributes,
                    });
                }
                this.items = items;
            });
        },
        addItemToStock(item_id) {
            let selectedItem = this.items.find((item) => item.id === item_id);

            if (this.stockItems.length === 0) {
                this.stockItems.push({
                    id: selectedItem.id,
                    name: selectedItem.name,
                    current_quantity: selectedItem.current_quantity,
                    quantity: 1,
                    attributes: selectedItem.attributes
                });
            } else {
                let itemInStock = this.stockItems.find((item) => item.id === selectedItem.id);
                if (itemInStock !== undefined) {
                    itemInStock.quantity++;
                } else {
                    this.stockItems.push({
                        id: selectedItem.id,
                        name: selectedItem.name,
                        current_quantity: selectedItem.current_quantity,
                        quantity: 1,
                        attributes: selectedItem.attributes
                    });
                }
            }
        },
        removeItemFromStock(item_id) {
            this.stockItems = this.stockItems.filter((item) => item.id !== item_id);
        },
        getSearchResults(data) {
            const items = [];
            for (const i in data) {
                items.push({
                    id : data[i].id,
                    name : data[i].name,
                    current_quantity : data[i].current_quantity,
                    quantity : data[i].quantity,
                    attributes: data[i].item_attributes
                })
            }
            this.items = items;
        },
        submitStockInForm() {
            if (this.stockItems.length === 0) {
                this.$swal.fire({
                    icon: 'error',
                    title: 'No items added!. Select items',
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    showConfirmButton: false
                });
                return;
            }
            let postData = {
                partner: this.partner,
                memo: this.memo,
                total_items_count: this.stockItemCountTotal,
                stock_items: this.stockItems
            };

            // check if all the necessary information are fulfilled
            this.$swal.fire({
                title: 'Are you sure?',
                text: "The selected items will be added to the inventory!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Proceed!'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    this.isLoading = true;
                    try {
                        await axios.post(window.origin + '/stocks/add', {
                            ...postData
                        }).then(response => {

                            console.log(response);
                            this.isLoading = false;
                            this.$swal.fire({
                                title: 'Items Stock-in Successful!',
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                // clear all inputs
                                this.partner = "";
                                this.stockItems = [];
                                this.memo = "";
                                this.stockItemCountTotal = 0;
                                this.loadItems()
                            });
                            // redirect to same page
                        });
                    } catch (err) {
                        this.isLoading = false;
                        this.$swal.fire(
                            'Error Occurred!',
                            'Click ok to close!',
                            'error'
                        );
                    }
                }
            })
        }

    },
    mounted() {
        this.loadItems();
    }
}
</script>
