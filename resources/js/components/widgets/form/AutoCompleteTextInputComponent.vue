<template>
    <div>
        <div class="auto-complete-container">
            <input type="text" @blur="close" class="form-control" :name="inputName" v-model="inputText" @input="search" autocomplete="false">
            <div v-if="isResultOpen && results.length > 0" class="auto-complete-results">
                <ul>
                    <li v-for="result in results" @click="select(result.id)">{{ result.text }}</li>
                </ul>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    props: {
        fetchUrl: {
            type: String,
            required: true,
        },
        inputName: {
            type: String,
            required: true
        },
        inputValue: {
            type: String,
            required: false,
            default: ""
        }
    },
    emits: ['valueSelected'],
    data() {
        return {
            inputText: "",
            options: [],
            results: [],
            isResultOpen: false
        };
    },
    methods: {
        search()
        {
            if (this.inputText.trim().length > 0) {
                this.results = this.options.filter(option => {
                    return option.text.toLowerCase().includes(this.inputText.toLowerCase());
                });
            }

        },
        select(id) {
            const selectedOption = this.results.find(option => {
                return option.id === id;
            });
            if (selectedOption) {
                //this.selectedId = selectedOption.id;
                this.inputText = selectedOption.text;
                this.close();
            }
        },
        close() {
            setTimeout(() => {
                this.isResultOpen = false;
                this.results = [];
                this.$emit('valueSelected', this.inputText)
            }, 500)
        }
    },
    watch: {
        inputText: function (newInput) {
            if (newInput) {
                this.isResultOpen = true;
            } else {
                this.results = [];
            }
        }
    },
    beforeMount() {
        this.inputText = this.inputValue;

        // check for the details and ensure the url format is in order
        if (this.fetchUrl && this.fetchUrl.length > 0) {
            axios.get(this.fetchUrl)
                .then((response) => {
                    if (response.data.data.length > 0) {
                        response.data.data.forEach(option => {
                            this.options.push({
                                id: option.id,
                                text: option.option_text
                            });
                        })
                    }
                });
        }

        // fetch the options using the fetchUrl
    }
}
</script>

<style>
.auto-complete-container {
    position: relative;
}
.auto-complete-results {
    position: absolute;
    background-color: #fff;
    width: 100%;
    border: 1px solid #3c8dbc;
    border-top: none;
    z-index: 999;
}
.auto-complete-results ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.auto-complete-results li {
    margin: 0;
    padding: 5px 10px;
    border: 1px solid #d2d6de;
}
.auto-complete-results li:hover {
    background-color: #d2d6de;
    cursor: pointer;
}
</style>
