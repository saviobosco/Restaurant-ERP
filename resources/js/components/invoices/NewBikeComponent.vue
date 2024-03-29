<template>
    <div class="box box-primary">
        <loading :active.sync="isLoading"
                 :can-cancel="true"
                 :height="20"
                 :color="loadingColor"
                 :is-full-page="false">
        </loading>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group required">
                    <label for="license_number">License Number</label>
                    <input type="text" v-model="license_number" id="license_number" class="form-control">
                    <span v-if="licenseNumberError" class="text-danger">{{ licenseNumberError }}</span>
                </div>

                <div class="form-group">
                    <label for="bike_make">Bike Make</label>
                    <input type="text" v-model="bike_make" id="bike_make" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="bike_model">Bike Model</label>
                    <input type="text" v-model="bike_model" id="bike_model" class="form-control">
                </div>

                <div class="form-group">
                    <label for="memo">Bike Memo</label>
                    <textarea id="memo" v-model="bike_memo" cols="30" rows="2" class="form-control"></textarea>
                </div>

                <div class="form-group required">
                    <label for="customer_phone_number">Customer Phone Number</label>
                    <input type="text" v-model="customer_phone_number" id="customer_phone_number" class="form-control" required>
                    <span v-if="customerPhoneNumberError" class="text-danger">{{ customerPhoneNumberError }}</span>
                </div>

                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" v-model="customer_name" id="customer_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="customer_email">Customer Email</label>
                    <input type="text" v-model="customer_email" id="customer_email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="customer_memo">Customer Memo</label>
                    <textarea id="customer_memo" v-model="customer_memo" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" @click.prevent="saveBike">Add Customer</button>
        </div>
    </div>
</template>

<script>
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    emits: ['close', 'attach-bike'],
    components: {
        Loading
    },
    data() {
        return {
            loadingColor: "#007bff",
            isLoading: false,
            license_number: "",
            bike_make: "",
            bike_model: "",
            bike_memo: "",
            customer_phone_number: "",
            customer_name: "",
            customer_email: "",
            customer_memo: "",
            licenseNumberError: "",
            customerPhoneNumberError: ""
        };
    },
    methods: {
        async saveBike() {
            // validate the data
            this.isLoading = true;
            this.licenseNumberError = "";
            this.customerPhoneNumberError= "";
            try {
                await axios.post(window.origin + '/bikes/add-customer-bike',{
                    license_number: this.license_number,
                    bike_make: this.bike_make,
                    bike_model: this.bike_model,
                    bike_memo: this.bike_memo,
                    customer_phone_number: this.customer_phone_number,
                    customer_name: this.customer_name,
                    customer_email: this.customer_email,
                    customer_memo: this.customer_memo,
                }).then(response => {
                    this.isLoading = false;
                    this.$emit('attach-bike', response.data.data);

                });

            } catch (err) {
                this.isLoading = false;
                if (err.response.status === 422) {
                    let errors = err.response.data.errors;
                    if (errors.license_number) {
                        this.licenseNumberError = errors.license_number;
                    }
                    if (errors.customer_phone_number) {
                        this.customerPhoneNumberError = errors.customer_phone_number;
                    }
                }
            }
        }
    }
}
</script>
