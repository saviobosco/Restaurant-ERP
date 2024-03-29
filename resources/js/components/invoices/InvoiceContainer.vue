<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading"
                 :can-cancel="false"
                 :height="30"
                 :color="loadingColor"
                 :is-full-page="false">
        </loading>
        <div class="card card-default">
            <!-- /.box-header -->
            <div class="card-body">
<!--                <div class="clearfix mb-3">-->
<!--                    <div class="float-right">-->
<!--                        <b-button v-b-modal.modal-add-customer variant="success">Add New Customer</b-button>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="row">
                    <div class="col-sm-8">
                        <products-container></products-container>
                    </div>
                    <div class="col-sm-4">
                        <div>
                            <!-- customer section -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width: 60%">#Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <invoice-item v-for="product in invoiceProducts" :product="product" :key="product.id" @remove-product="removeProduct"></invoice-item>
                                </tbody>
                            </table>
                            <!--                        <div class="clearfix">
                                                        <button class="pull-right btn btn-primary" @click="addEmptyItem">Add Item</button>
                                                    </div>-->

                            <div>
                                <a @click.prevent="isDiscountAdded = !isDiscountAdded" href=""> {{ (isDiscountAdded) ? 'Remove' : 'Add' }} discount</a>
                                <a class="ml-4" @click.prevent="isTaxAdded = !isTaxAdded" href="">{{ (isTaxAdded) ? 'Remove' : 'Add' }} tax</a>
                            </div>
                            <div style="margin-top: 20px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr v-if="isDiscountAdded">
                                                <th style="width: 60%;">Discount</th>
                                                <td>
                                                    <input name="discount" type="number" class="form-control" v-model.number="discount">
                                                </td>
                                            </tr>
                                            <tr v-if="isTaxAdded">
                                                <th>Tax (7%)</th>
                                                <td>
                                                    <input name="tax" type="text" class="form-control" v-model.number="calculateTax">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sub Total</th>
                                                <td>
                                                    <input name="sub_total" type="hidden" class="form-control" v-model.number="subTotal">
                                                    &#8358; {{ subTotal }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td>
                                                    <input name="total" type="hidden" class="form-control" v-model.number="total">
                                                    &#8358; {{ total}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" @click.prevent="submitInvoice">Issue Receipt</button>

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" v-if="bikeDetails">
                            <div class="card-header">
                                <i class="float-right text-danger far fa-2x fa-times-circle" title="Remove" @click="bikeDetails=null"></i>
                                <h6>Customer Details</h6>
                            </div>
                            <div class="card-body">
                                <p>{{ bikeDetails.customer.name }} - ({{ bikeDetails.license_number}}/{{ bikeDetails.make}}/{{bikeDetails.model}})</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST">
                    <input type="hidden" name="license_number" v-model="bikeLicenseNumber">
                    <input type="hidden" name="customer_id" v-model="customerId">

<!--
                    <invoice-search @add-product="addProductToInvoice"></invoice-search>
-->

                   <div class="mb-2">
                       <b-button v-b-modal.modal-1 variant="primary">Add Item</b-button>
                   </div>

                    <div class="row">
                        <div class="col-sm-12">

                        </div>
                    </div>


                    <div class="form-group">
<!--
                        <button type="submit" class="btn btn-primary mr-4" @click.prevent="submitInvoice">Park Invoice</button>
-->

                    </div>


                </form>

            </div>
        </div>



        <b-modal id="modal-1" title="Add Items">
            <add-invoice-item-component @add-item="addProductToInvoice"></add-invoice-item-component>
        </b-modal>

        <b-modal id="modal-add-customer" title="Add Customer">
            <new-bike-component @attach-bike="addCustomerFromForm"></new-bike-component>
        </b-modal>
        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.box -->
</template>
<script>
import LicenseNumberSearch from "./LicenseNumberSearch";
import SearchItem from "./SearchItem";
import NewBikeComponent from "./NewBikeComponent";
import InvoiceSearch from "./InvoiceSearch";
import InvoiceItem from "./InvoiceItem";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import AddInvoiceItemComponent from "./AddInvoiceItemComponent";


export default {
    name: "InvoiceContainer",
    components: {
        AddInvoiceItemComponent,
        InvoiceItem,
        InvoiceSearch,
        NewBikeComponent,
        LicenseNumberSearch,
        SearchItem,
        Loading,
    },
    data() {
        return {
            bikeDetails: null,
            invoiceProducts: [],
            odometer: '',
            remark: '',
            discount: 0.00,
            vatTax: 0.00,
            taxPercent: 7,
            calculatedSubTotal: 0,
            calculatedTotal: 0,
            isLoading: false,
            loadingColor: "#007bff",
            isDiscountAdded: false,
            isTaxAdded: false
        }
    },
    computed: {
        bikeLicenseNumber() {
            return (this.bikeDetails) ? this.bikeDetails.license_number : '';
        },
        customerId() {
            return (this.bikeDetails) ? this.bikeDetails.customer.id : '';
        },
        calculateTax() {
            let tax = (this.taxPercent / 100) * this.calculatedSubTotal;
            tax = Math.round((tax + Number.EPSILON) * 100) / 100;
            this.vatTax = tax;
            return tax;
        },
        subTotal() {
            let subTotal = 0;
            this.invoiceProducts.forEach((product) => {
                subTotal += +product.price * product.quantity;
            })
            subTotal = Math.round((subTotal + Number.EPSILON) * 100) / 100;
            this.calculatedSubTotal = subTotal;
            return subTotal;
        },
        total() {
            let total = 0;
            this.invoiceProducts.forEach((product) => {
                total += product.price * product.quantity
            });
            if (this.isTaxAdded) {
                total = total + this.vatTax;
            }
            if (this.isDiscountAdded) {
                total = total - this.discount;
            }
            total = Math.round((total + Number.EPSILON) * 100) / 100;
            this.calculatedTotal = total;
            return total;
        }
    },
    methods: {
        attachBike(bike)
        {
            console.log(bike);
            if (bike === false) {
                if (window.confirm("No Bike found!. Add new bike?")) {
                    this.openNewBikeForm = true;
                }
            } else {
                this.bikeDetails = bike;
                this.openNewBikeForm = false;
            }
        },
        addCustomerFromForm(customer) {
            this.bikeDetails = customer;
            this.$bvModal.hide('modal-add-customer');
        },
        addCustomer(customer) {
            this.bikeDetails = customer;
        },
        addProductToInvoice(product) {
            if (this.invoiceProducts.length === 0) {
                this.invoiceProducts.push({
                    id: product.id,
                    product_id: product.id,
                    item_id: product.item_id,
                    name: product.name,
                    price: product.price,
                    quantity: 1,
                    total: product.price * 1
                });
            } else {
                // check if it exists
                let productExist = this.invoiceProducts.find((invoiceProduct) => invoiceProduct.id === product.id);
                if (productExist !== undefined) {
                    productExist.quantity++;
                    productExist.total = productExist.quantity * productExist.price
                } else {
                    this.invoiceProducts.push({
                        id: product.id,
                        product_id: product.id,
                        item_id: product.item_id,
                        name: product.name,
                        price: product.price,
                        quantity: 1,
                        total: product.price * 1
                    });
                }
            }
        },
        addEmptyItem(event) {
            event.preventDefault();
            const id = Math.random().toString(20).substr(2,6);
            this.invoiceProducts.push({
                id: id,
                item_id: null,
                product_id: null,
                name: '',
                price: 0,
                quantity: 1
            });
        },
        removeProduct(product_id) {
            this.invoiceProducts = this.invoiceProducts.filter((product) => product.id !== product_id);
        },
        async submitInvoice(event) {
            let postData = {
                odometer: this.odometer,
                remark: this.remark,
                tax: this.vatTax,
                discount: this.discount,
                products: this.invoiceProducts,
                sub_total: this.calculatedSubTotal,
                total: this.calculatedTotal
            };

            if (this.bikeDetails) {
                postData.license_number = this.bikeDetails.license_number;
                postData.customer_id = this.bikeDetails.customer.id;
            }

            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Generate Receipt!'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    this.isLoading = true;
                    try {
                        await axios.post(window.origin + '/invoices/create', {
                            ...postData
                        }).then(response => {
                            this.isLoading = false;
                            console.log(response);
                            let generatedInvoice = response.data.data;

                            this.$swal.fire({
                                title: 'Invoice Generated!',
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = window.origin + '/invoices/view/' + generatedInvoice.id;
                                }

                                // show the modal
                            });
                            // redirect to same page
                        });
                    } catch (err) {
                        this.isLoading = false;
                        this.$swal.fire(
                            'Error Occurred!',
                            'You clicked the button!',
                            'error'
                        );
                    }
                }
            })
            // make checks
        }
    }
    /*, mounted () {
        this.$modal.show('example')
    }*/
}
</script>

