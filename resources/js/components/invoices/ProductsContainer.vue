<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading"
                 :can-cancel="false"
                 :height="30"
                 :color="loadingColor"
                 :is-full-page="false">
        </loading>

        <input type="text"
               class="form-control"
               placeholder="Search Item">
    </div>
    <!-- /.box -->
</template>
<script>
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';



export default {
    name: "ProductsContainer",
    components: {
        Loading,
    },
    data() {
        return {
            products: [
                {
                    "id": 1,
                    "name": "Fried Rice",
                    "price": "1000"
                },
                {
                    "id": 2,
                    "name": "Soup",
                    "price": "1000"
                }
            ],
            isLoading: false,
            loadingColor: "#007bff",
        }
    },
}
</script>

