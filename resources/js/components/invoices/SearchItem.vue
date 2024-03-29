<template>
    <div>
        <div class="form-group" style="position: relative; margin-bottom: 20px;">
            <div class="input-group input-group">
                <input type="text"
                       class="form-control "
                       v-model="licenseNumberQuery"
                       @input="searchForLicenseNumber"
                       placeholder="Search Item">
                <div class="input-group-btn">
                    <button class="btn btn-primary"
                            @click.prevent="searchForLicenseNumber">
                        <i class="fa fa-search"></i>Search
                    </button>
                </div>
            </div>
            <div v-if="searchResults.length > 0 && licenseNumberQuery" class="search-results">
                <ul>
                    <li v-for="result in searchResults" @click="addCustomer(result)"> {{result.name}}</li>
                </ul>
            </div>
            <div class="search-results" v-else-if="licenseNumberQuery && searchResults.length <= 0">
                <ul>
                    <li>No items found!</li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>


export default {
    emits: ['search-bike', 'add-customer'],
    data() {
        return {
            licenseNumberQuery: null,
            searchResults:[]
        }
    },
    methods: {
        async searchForLicenseNumber() {
            try {
                await axios.get(window.origin + '/inventory/items/index', {
                    params: {
                        _q: this.licenseNumberQuery
                    }
                }).then(response => {
                    console.log(response);
                    this.searchResults = response.data.data;
                });
            } catch (err) {
                //this.$emit('search-bike', false);
                //console.error(err.response);
                console.log(err.response);
            }
        },
        addCustomer(customer) {
            this.$emit('add-customer', customer);
            this.licenseNumberQuery = null;
        }
    }

}
</script>

<style scoped>
.search-results {
    border: 1px solid #d2d6de;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    position: absolute;
    z-index: 999;
    background-color: #FFFFFF;
    width: 100%;
}

.search-results ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.search-results li {
    padding: 5px 20px;
    border-bottom: 1px solid #d2d6de;
    cursor: pointer;
}
.search-results li:last-child {
    border-bottom: none;
}
.search-results li:hover {
    background-color: #d2d6de;
}
</style>
