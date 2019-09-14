<template>
    <div class="body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p class="lead">Dodaj uplatu</p>
                <form>
                    <br/>
                    <div class="form-group">
                        <label for="price_id"><p><i>Paket:</i></p></label>
                        <br/>
                        <select name="price_id" id="price_id" v-model="price_id" required>
                            <option v-for="price in prices" :value="price.id">{{ price.title }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_date"><p><i>Datum uplate:</i></p></label>
                        <div class="form-line">
                            <input name="payment_date" id="payment_date" type="date" class="form-control" v-model="payment_date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valid_thru"><p><i>Datum isteka:</i></p></label>
                        <div class="form-line">
                            <input name="valid_thru" id="valid_thru" type="date" class="form-control" v-model="valid_thru" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" name="paymentBtn" id="paymentBtn" class="btn btn-dark waves-effect waves-light" @click="storePayment()">Dodaj</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id', 'operator_id'],
        data() {
            return {
                price_id: 1,
                payment_date: '',
                valid_thru: '',
                prices: [],
                price: {
                    id: '',
                    title: ''
                }
            }
        },
        mounted() {
            this.getPrices()
        },
        methods: {
            getPrices() {
                axios.get('/api/prices').then(response => {
                    this.prices = response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            storePayment() {
                axios.post('/api/payments', {
                    price_id: this.price_id,
                    payment_date: this.payment_date,
                    valid_thru: this.valid_thru,
                    user_id: this.user_id,
                    operator_id: this.operator_id
                }).then(response => {
                    window.location.replace('/energijapp/profile/'+this.user_id)
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
