<template>
    <div>

        <div v-if="selectedCategory !== null">
            <div class="row">
                <div class="col-sm-2 col-xs-4">
                    <a @click="clearSelectedCategory" href="#"><i class="fa fa-angle-left"></i> Back</a>
                </div>
                <div class="col-sm-10 col-xs-8">
                    <p>Category : {{ selectedCategory.name}}</p>
                </div>
            </div>
            <div>
                <a v-for="item in items" :key="item.id" @click.prevent="addItem(item)" style="display: block;" class="btn btn-default mb-3" href=""> {{ item.name }} - ${{ item.price }}</a>

<!--                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in selectedItems" :key="item.id">
                        <td>{{ item.name }}</td>
                        <td>{{ item.price }}</td>
                    </tr>
                    </tbody>
                </table>-->

            </div>
        </div>
        <div v-else>
            <p>Select Category</p>
            <a v-for="category in categories" style="display: block"
               :key="category.id"
               class="btn btn-default mb-3"
               @click="selectCategory(category)"
               href="#">{{ category.name }}</a>
        </div>
    </div>
</template>

<script>
export default {
    emits: ['add-item'],
    data() {
        return {
            selectedCategory: null,
            categories: [
                /*{
                    id: 1,
                    name: "Engine Oil",
                },
                {
                    id: 2,
                    name: "Brake Pads"
                },
                {
                    id: 3,
                    name: "Tires"
                },
                {
                    id: 4,
                    name: "Shanfs"
                }*/
            ],
            items: [
                /*{
                    id: 1,
                    name: "10W-10 Oil",
                    category_id: 1,
                    price: 16.05,
                    item_id: 1
                },
                {
                    id: 2,
                    name: "10W-11 Oil",
                    category_id: 1,
                    price: 20.07,
                    item_id: 2
                },
                {
                    id: 3,
                    name: "10W-12 Oil",
                    category_id: 1,
                    price: 15.5,
                    item_id: 3
                },
                {
                    id: 4,
                    name: "10W-13 Oil",
                    category_id: 1,
                    price: 18.05,
                    item_id: 4
                },
                {
                    id: 5,
                    name: "10W-10 Brake",
                    category_id: 2,
                    price: 20.05,
                    item_id: 5
                },
                {
                    id: 6,
                    name: "10W-11 Brake",
                    category_id: 2,
                    price: 25.05,
                    item_id: 6
                }*/
            ]
        }
    },
    methods: {
        selectCategory(category) {
            this.selectedCategory = category;
            this.loadItems(category.id);
        },
        clearSelectedCategory() {
            this.selectedCategory = null;
        },
        addItem(item) {
            this.$emit('add-item', item);
        },
        loadCategories() {
            axios.get(window.origin + '/data-center/categories/index')
            .then(response => {
                this.categories = response.data.data;
            });
        },
        loadItems(category_id) {
            axios.get(window.origin + '/items/index?category_id=' + category_id)
                .then(response => {
                    console.log(response);
                    this.items = response.data.data;
                });
        }
    },
    mounted() {
        this.loadCategories();
    }
}
</script>
