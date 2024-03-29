<template>
    <div class="item__single" @click="$emit('click')">
        <div class="clearfix">
            <div class="col-sm-2">
                <div style="height: 40px; width: 70%; background-color: #b8b6b6; border-radius: 6px;">
                </div>
            </div>
            <div class="col-sm-8">
                <div>{{ item.name }}</div>
            </div>
            <div class="col-sm-2">
                <div><small>Quantity</small>: {{ item.current_quantity }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
    data() {
        return {}
    }
}
</script>
