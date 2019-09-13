<template>
    <div role="tabpanel" class="tab-pane fade in active" id="user_arrivals">
        <calendar-heatmap :values="calendarValues" :end-date="calendarEndDate" tooltip-unit="trainings" :range-color="['#e6e6fa', '#ffc100', '#ff9a00', '#ff7400', '#ff4d00', '#ff0000']" />
        <br/><br/>
        <div v-for="payment in payments" class="panel-group" :id="'accordion_'+payment.id" role="tablist" aria-multiselectable="true">
            <div class="panel panel-col-deep-purple">
                <div class="panel-heading" role="tab" :id="'heading_'+payment.id">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" :data-parent="'#accordion_'+payment.id" :href="'#collapse_'+payment.id" aria-expanded="false" :aria-controls="'collapse_'+payment.id">
                            {{ payment.price.title }} <p class="pull-right">{{ new Date(payment.payment_date).getDate()+'.'+(new Date(payment.payment_date).getMonth()+1)+'.'+new Date(payment.payment_date).getFullYear()+'.' }} - {{ new Date(payment.valid_thru).getDate()+'.'+(new Date(payment.valid_thru).getMonth()+1)+'.'+new Date(payment.valid_thru).getFullYear()+'.' }}</p>
                        </a>
                    </h4>
                </div>
                <div :id="'collapse_'+payment.id" class="panel-collapse collapse" role="tabpanel" :aria-labelledby="'heading_'+payment.id">
                    <div class="panel-body">
                        <h3><a v-if="isPrivileged" :href="'/energijapp/arrivals/create/payment/'+payment.id" class="btn btn-dark waves-effect">Dodaj dolazak</a></h3>
                        <hr v-if="isPrivileged" />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="dark">
                                <tr>
                                    <th>Trening</th>
                                    <th v-if="isPrivileged">Trener</th>
                                    <th>Datum</th>
                                    <th v-if="isPrivileged">Izmeni</th>
                                    <th v-if="isPrivileged">Obriši</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="arrival in payment.arrivals">
                                    <td>{{ arrival.training && arrival.training.name }}</td>
                                    <td v-if="isPrivileged">{{ arrival.trainer && arrival.trainer.first_name }} {{ arrival.trainer && arrival.trainer.last_name.charAt(0)+'.' }}</td>
                                    <td>{{ new Date(arrival.date).getDate()+'.'+(new Date(arrival.date).getMonth()+1)+'.'+new Date(arrival.date).getFullYear()+'.' }}</td>
                                    <td v-if="isPrivileged"><a :href="'/energijapp/arrivals/'+arrival.id+'/edit'" class="btn btn-dark waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                                    <td v-if="isPrivileged">
                                        <button class="btn dtp-btn-clear waves-effect btn-xs" @click="deleteArrival(arrival.id)">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'vue-calendar-heatmap/dist/vue-calendar-heatmap.css'
    import { CalendarHeatmap } from 'vue-calendar-heatmap/dist/vue-calendar-heatmap.common'

    export default {
        components: {
            CalendarHeatmap
        },
        props: ['user_id'],
        data() {
            return {
                isPrivileged: false,
                payments: [],
                payment: {
                    id: '',
                    payment_date: '',
                    valid_thru: '',
                    price_id: '',
                    user_id: '',
                    price: {
                        title: '',
                        sessions: ''
                    },
                    arrivals: [],
                    arrival: {
                        id: '',
                        date: '',
                        training: {
                            name: ''
                        },
                        trainer: {
                            first_name: '',
                            last_name: ''
                        }
                    },
                },
                calendarEndDate: new Date(),
                calendarValues: []
            }
        },
        created() {
            this.getPrivilege();
            this.getUserArrivals();
            this.getUserPaymentArrivals()
        },
        methods: {
            getPrivilege() {
                axios.get('/api/users/privilege')
                    .then(response => {
                        this.isPrivileged = true
                    })
                    .catch(error => {
                    })
            },

            getUserArrivals() {
                axios.get('/api/arrivals/user/' + this.user_id)
                    .then(response => {
                        this.calendarValues = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            getUserPaymentArrivals() {
                axios.get('/api/payments/user/' + this.user_id + '/arrivals')
                    .then(response => {
                        this.payments = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            deleteArrival(id) {
                axios.delete('/api/arrivals/' + id).then(response => {
                    location.reload()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
