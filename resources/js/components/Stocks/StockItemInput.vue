<template>
    <div class="item__single">
        <!-- hidden inputs for the data --->
        <input type="hidden" :name="inputNameForId" :value="item.id">
        <input type="hidden" :name="inputNameForName"  :value=" item.name">
        <div class="row">
            <div class="col-sm-2">
                <div style="height: 40px; width: 70%; background-color: gray; border-radius: 6px;">
                </div>
            </div>
            <div class="col-sm-6">
                <div>{{ item.name}}</div>
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control" :name="inputNameForQuantity" v-model="item.quantity" min="1">
            </div>
            <div class="col-sm-1" style="padding: 0">
                <i class="fa fa-window-close text-danger" @click="removeItem(item.id)"></i>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
    data() {
        return {
            inputNameForId: "",
            inputNameForName: "",
            inputNameForQuantity: "",
        }
    },
    methods: {
        removeItem(item_id) {
            this.$emit('remove-item', item_id);
        }
    },
    beforeMount() {
        this.inputNameForId = "items["+this.item.id+"][item_id]";
        this.inputNameForName = "items["+this.item.id+"][name]";
        this.inputNameForQuantity = "items["+this.item.id+"][quantity]";
    }
}
</script>
