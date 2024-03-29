<template>
    <div class="row">
        <div class="col-sm-9 col-xs-8">
            <input type="text" class="form-control" name="barcode" v-model="barcode" placeholder="Click generate to create a barcode">
        </div>
        <div class="col-sm-3 col-xs-4">
            <button class="btn btn-primary" @click.prevent="generateBarcode">Generate</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            barcode: null
        }
    },
    methods: {
        generateBarcode() {
            const time = Date.now();
            this.barcode = '20' + (new String(time)).substr(2);
        }
    }
}
</script>
