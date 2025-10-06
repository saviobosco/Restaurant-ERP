<template>
    <div class="card" style="border-radius: 0">
        <div style="background-color:#ededed;">
            <ul class="quick__nav__tab">
                <li class="quick__nav__item">
                    <a @click="orderTabSelected" class="quick__nav__link"
                       :class="{ 'active':this.isOrder}"  href="javascript:;">Order
                        <span class="badge badge-secondary right">{{ count }}</span>
                    </a>
                </li>
                <li class="quick__nav__item">
                    <a @click="currentTabSelected" class="quick__nav__link inactive"
                       :class="{'pointer_good': this.activeCard , 'active':this.isCurrent}"
                       href="javascript:;">Current {{ (activeCard)!== null ?  '-' + activeCard?.name : ''}} </a>
                </li>
            </ul>
        </div>

        <sell-type-container
            :deliveries="deliveries"
            :takeOuts="takeOuts"
            :dinInTables="dinInTables"
            @addNewDelivery="addNewDelivery"
            @addNewTakeout="addNewTakeout"
            @tableSelected
            v-if="isOrder" @card-selected="cardSelected"
            :activeCard="activeCard" ></sell-type-container>

        <checkout-container
            v-if="isCurrent"
            :activeCard="activeCard"
            :products="products"
            @updateRecord
            @removeOrder="removeOrder"
        ></checkout-container>

    </div>

</template>

<script>
import SellTypeContainer from "./SellTypeContainer";
import CheckoutContainer from "./CheckoutContainer";
export default {
    name: "SellMainContainer",
    emits: [],
    components:{SellTypeContainer, CheckoutContainer},
    data() {
        return {
            takeOuts: [],
            deliveries: [],
            dinInTables: [],
            activeCard : null,
            isOrder: true,
            isCurrent: false,
            products: [
                {
                    id: 1,
                    name: "Burger",
                    price: "1500.00"

                }
            ]
        }
    },
    created() {
        let numberOfTables = 15;
        for (let i = 1; i <= 15; i++) {
            this.dinInTables.push({
                id: "dinInTable" + i,
                name: "Table-"+i,
                type: "table",
                items:[],
                active: false
            })
        }
        this.loadProducts();


    },
    computed: {
        count () {
            let count = 0;
            count = this.deliveries.length + this.takeOuts.length;
            let tableCount = this.dinInTables.filter(x => {
                return x.active;
            })
            count += tableCount.length
            return count;
        }
    },
    methods: {
        async loadProducts() {
            await axios.get(window.origin + '/products/index', {}).then(response => {
                this.products = response.data.data;
            })
        },
        addNewDelivery() {
            let newDelivery = {
                id: "delivery" + this.deliveries.length + 1,
                name: "New Delivery - " + (this.deliveries.length + 1),
                type: "delivery",
                items:[],
            };
            this.deliveries.push(newDelivery);
            this.cardSelected(newDelivery);

        },
        addNewTakeout() {
            let newTakeOut = {
                id: "takeOut" + this.takeOuts.length + 1,
                name: "New Take-Away - " + (this.takeOuts.length + 1),
                type: "takeOut",
                items:[],
            };
            this.takeOuts.push(newTakeOut);
            this.cardSelected(newTakeOut);
        },
        tableSelected(updatedTable) {
            console.log(updatedTable);
            this.dinInTables = this.dinInTables.map( x => {
                if (x.id === updatedTable.id) {
                    x = updatedTable
                }
                return x;
            })
        },
        cardSelected(card) {
            this.activeCard = card;
            this.isOrder = false;
            this.isCurrent = true;
        },
        orderTabSelected() {
            this.isOrder = true;
            this.isCurrent = false;
        },
        currentTabSelected() {
            if (this.activeCard) {
                this.isOrder = false;
                this.isCurrent = true;
            }

        },
        updateRecord(record) {
            if (record.type === "table") {
                this.dinInTables = this.dinInTables.map( x => {
                    if (x.id === record.id) {
                        x = record
                    }
                    return x;
                })
            } else if (record.type === "delivery") {
                this.deliveries = this.deliveries.map( x => {
                    if (x.id === record.id) {
                        x = record
                    }
                    return x;
                })

            } else if (record.type === "takeOut") {
                this.takeOuts = this.takeOuts.map( x => {
                    if (x.id === record.id) {
                        x = record
                    }
                    return x;
                })
            }
            this.activeCard = record;
        },
        removeOrder(record) {
            console.log("inside remove main >>>", record);
            if (record.type === "table") {
                this.dinInTables = this.dinInTables.filter( x => {
                    return (x.id !== record.id);
                })
            } else if (record.type === "delivery") {
                this.deliveries = this.deliveries.filter( x => {
                    return (x.id !== record.id)
                })

            } else if (record.type === "takeOut") {
                this.takeOuts = this.takeOuts.filter( x => {
                    return (x.id !== record.id)
                })
            }
            this.isOrder = true;
            this.isCurrent= false;
            this.activeCard = null;
        }
    }
}
</script>
