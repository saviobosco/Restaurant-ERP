<template>
    <div>
        <div class="card-body complete__checkout">
            <div class="row">
                <div class="col-sm-6">
                    <div>
                        <div class="form-group" v-if="activeCard.type === 'delivery'|| activeCard.type === 'table' ">
                            <label for="immediate">
                                <input id="immediate" type="radio" v-model="saleType" value="immediate"> Immediate Sale
                            </label>
                            <label for="booking">
                                <input id="booking" type="radio" v-model="saleType" value="booking"> Booking
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">Order Notes</label>
                            <input type="text" class="form-control" v-model="orderNote">
                        </div>

                        <div v-if="(activeCard.type === 'delivery'|| activeCard.type === 'table') && saleType === 'booking' ">

                            <div class="form-group">
                                <label for="">Booking Date & Time</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="doorDelivery">
                                    <input id="doorDelivery" type="checkbox" v-model="isDoorDelivery" value="1"> is Door Delivery?
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">Booking Notes</label>
                                <input type="text" v-model="bookingNote" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Booking Advance</label>
                                <input type="number" v-model="bookingAdvance" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <button @click="$emit('goBack')" class="btn btn-default">Back</button>
                            <button class="btn btn-default">Complete</button>
                            <button @click.prevent="printReceipt" class="btn btn-success">Print receipt</button>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customerPhone">Customer Phone</label>
                        <input id="customerPhone" v-model="customerPhone" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="customerName">Customer Name</label>
                        <input id="customerName" v-model="customerName" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Customer Email</label>
                        <input id="customerEmail" v-model="customerEmail" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "CompleteCheckout",
    props: ['activeCard'],
    data() {
        return {
            saleType: null,
            orderNote: null,
            bookingTime: null,
            isDoorDelivery: null,
            bookingNote: null,
            bookingAdvance: null,
            customerName: null,
            customerEmail: null,
            customerPhone: null,
        }
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
        async printReceipt(event) {
            let postData = {
                //id: this.activeCard.id,
                items: this.activeCard.items,
                total: this.total,
                order_note: this.orderNote,
                booking_note: this.bookingNote,
                booking_time: this.bookingTime,
                booking_advance: this.bookingAdvance,
                is_door_delivery: this.isDoorDelivery,
                sale_type: this.saleType,
                customer: {
                    name: this.customerName,
                    email: this.customerEmail,
                    phone_number: this.customerPhone
                }

            };


            this.$swal.fire({
                title: 'Are you sure?',
                text: "Proceed with action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Generate Receipt!'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    this.isLoading = true;
                    try {
                        await axios.post(window.origin + '/sell/create', {
                            ...postData
                        }).then(response => {
                            this.isLoading = false;
                            console.log(response);
                            let generatedInvoice = response.data.data;

                            this.$swal.fire({
                                title: 'Receipt Generated!',
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                // call the windows print
                                /*if (result.isConfirmed) {
                                    window.location = window.origin + '/invoices/view/' + generatedInvoice.id;
                                }*/

                                // show the modal
                                this.$emit("removeOrder", this.activeCard)
                            });
                            // redirect to same page
                        });
                    } catch (err) {
                        this.isLoading = false;
                        this.$swal.fire(
                            'Error Occurred!',
                            'dont try again!',
                            'error'
                        );
                    }
                }
            })
            // make checks
        }
    }

}
</script>
