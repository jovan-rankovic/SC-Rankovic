<template>
    <div>
        <div id="reservation-list" class="text-center">
            <p class="lead">Pregled uplata</p>
            <br/>
            <form class="form-inline text-center">
                <div class="form-group form-inline-elements">
                    <label for="date_from">Datum od:</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" v-model="date_from" />
                </div>
                <div class="form-group form-inline-elements">
                    <label for="date_to">Datum do:</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" v-model="date_to" />
                </div>
                <div class="form-group form-inline-elements">
                    <label for="price_id">Paket</label>
                    <select id="price_id" name="price_id" class="form-control" v-model="price_id">
                        <option value="">Svi</option>
                        <option v-for="price in prices" :value="price.id">{{ price.title }}</option>
                    </select>
                </div>
                <div class="form-group form-inline-elements">
                    <label for="operator_id">Operater</label>
                    <select id="operator_id" name="operator_id" class="form-control" v-model="operator_id">
                        <option value="">Svi</option>
                        <option v-for="operator in operators" :value="operator.id">{{ operator.first_name }} {{ operator.last_name }}</option>
                    </select>
                </div>
                <div class="form-group form-inline-elements">
                    <button type="button" name="earningBtn" id="earningBtn" class="btn btn-dark waves-effect waves-light" @click="searchPayments"><i class="material-icons">search</i> Nađi</button>
                </div>
            </form>
        </div>
        <br/>
        <div v-if="isVisible">
            <h3 class="text-center">Zarada: {{ paymentSum }} Din.</h3>
            <br/>
            <div class="table-responsive" >
                <table class="table table-striped">
                    <thead>
                    <tr class="dark">
                        <th>Broj kartice</th>
                        <th>Član</th>
                        <th>Paket</th>
                        <th>Operater</th>
                        <th>Datum uplate</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="payment in payments">
                        <td>{{ payment.user.card_number }}</td>
                        <td>{{ payment.user.first_name }} {{ payment.user.last_name }}</td>
                        <td>{{ payment.price.title }}</td>
                        <td>{{ payment.operator.first_name }} {{ payment.operator.last_name }}</td>
                        <td>{{ new Date(payment.payment_date).getDate()+'.'+(new Date(payment.payment_date).getMonth()+1)+'.'+new Date(payment.payment_date).getFullYear()+'.' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                prices: [],
                price: {
                    id: '',
                    title: ''
                },
                operators: [],
                operator: {
                    id: '',
                    first_name: '',
                    last_name: ''
                },
                date_from: '',
                date_to: '',
                price_id: '',
                operator_id: '',
                payments: [],
                payment: {
                    payment_date: '',
                    price: {
                        title: ''
                    },
                    operator: {
                        first_name: '',
                        last_name: ''
                    },
                    user: {
                        first_name: '',
                        last_name: '',
                        card_number: ''
                    }
                },
                paymentSum: 0,
                isVisible: false
            }
        },
        mounted() {
            this.getPrices();
            this.getOperators();
        },
        methods: {
            getPrices() {
                axios.get('/api/prices').then(response => {
                    this.prices = response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            getOperators() {
                axios.get('/api/users/operators').then(response => {
                    this.operators = response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            searchPayments() {
                axios.get('/api/payments', {
                    params: {
                        date_from: this.date_from,
                        date_to: this.date_to,
                        price_id: this.price_id,
                        operator_id: this.operator_id
                    }
                })
                .then(response => {
                    this.isVisible = true;
                    this.payments = response.data[0];
                    this.paymentSum = response.data[1]
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
