<template>
    <div class="card-body">
        <div class="form-group">
            <input id="search-tab" type="text" class="form-control" autofocus>
        </div>

        <div class="row">
            <div class="col-sm-2">

                <ul class="sale__side__tab">
                    <li class="side__nav__item"><a class="side__nav__link" href="">All </a> </li>
                    <li><a class="side__nav__link" href=""> Take Away</a> </li>
                    <li><a class="side__nav__link" href="">Delivery</a></li>
                    <li><a class="side__nav__link" href=""> Tables </a></li>
                    <li><a class="side__nav__link" href=""> Free</a> </li>
                    <li><a class="side__nav__link" href=""> Occupied </a></li>
                    <li><a class="side__nav__link" href="">Unpaid</a></li>
                </ul>
            </div>

            <div class="col-sm-10">
                <div class="row">

                    <div class="col-lg-2 col-6">
                        <div @click="$emit('addNewTakeout');" class="small-box sale-tab sale__tab_default">
                            <div class="inner text-center">
                                <p>New <br> Take-Away</p>
                            </div>
                        </div>
                    </div>

                    <take-out-card v-for="takeOut in takeOuts" :activeCard="activeCard" :takeOut="takeOut" :key="takeOut.id" @cardSelected="cardSelected"></take-out-card>


                    <div class="col-lg-2 col-6">
                        <div @click="$emit('addNewDelivery');" class="small-box sale-tab sale__tab_default">
                            <div class="inner text-center">
                                <p>New <br> Delivery</p>
                            </div>
                        </div>
                    </div>

                    <delivery-card v-for="delivery in deliveries" :activeCard="activeCard" :delivery="delivery" :key="delivery.id" @cardSelected="cardSelected"></delivery-card>


                    <table-card v-for="dinInTable in dinInTables" :activeCard="activeCard"  @cardSelected="cardSelected" @tableSelected :dinInTable="dinInTable" :key="dinInTable.id" @remove-product=""></table-card>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TableCard from "./TableCard";
import TakeOutCard from "./TakeOutCard";
import DeliveryCard from "./DeliveryCard";


export default {
    name: "SellTypeContainer",
    emits: [],
    props: ['activeCard',"deliveries","dinInTables","takeOuts"],
    components:{TableCard, TakeOutCard, DeliveryCard},
    data() {
        return {}
    },
    methods: {
        tableSelected(updatedTable) {
            this.$emit("tableSelected", updatedTable)
        },
        cardSelected(card) {
            this.$emit("card-selected", card)
        }
    }
}
</script>
