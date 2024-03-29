<template>
    <tr>
        <td>{{ item.name }}</td>
        <td style="width: 20px;">
            <div>
                <div></div>
                <div>
                    <input type="number" v-model="item.quantity" class="form-control" disabled>
                </div>
                <div></div>
            </div>
        </td>
        <td>{{ item.total }}</td>
        <td>
            <a href="javascript:;"><i class="fa fa-edit"></i> </a>
        </td>
    </tr>
</template>

<script>
export default {
    name: "CartItem",
    props: ["item"],
    components:{},
    data() {
        return {}
    },
    methods: {

    }
}
</script>
