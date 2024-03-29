<template>
    <div class="form-group">
        <input type="text"
               class="form-control"
               placeholder="Search item name, category"
               @input="searchItems">
    </div>
</template>

<script>
export default {
    emits: ['search-results'],
    data() {
        return {
            searchText: null,
            items: []
        };
    },
    methods: {
        searchItems(event) {
            let searchText = event.target.value;
            searchText = (searchText !== "" && searchText.trim().length > 0) ? searchText : false;
            if (searchText) {
                axios.get(window.origin + '/items/search', {
                    params: {
                        _q: searchText
                    }
                })
                .then(response => {
                    console.log(response.data);
                    this.$emit('search-results', response.data);
                })
                .catch(error => {
                    console.log(error);
                })
            }
        }
    }
}
</script>
