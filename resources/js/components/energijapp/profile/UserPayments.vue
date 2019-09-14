<template>
    <div role="tabpanel" class="tab-pane fade in" id="user_payments">
        <h3><a :href="'/energijapp/payments/create/user/'+user_id" class="btn btn-dark waves-effect">Dodaj uplatu</a><p class="pull-right">Ukupno uplaćeno: {{ userPaymentSum }} Din.</p></h3>
        <hr/>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="dark">
                <tr>
                    <th>Paket</th>
                    <th>Datum uplate</th>
                    <th>Datum isteka</th>
                    <th>Izmeni</th>
                    <th>Obriši</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(payment, index) in payments">
                    <td>{{ payment.price.title }}</td>
                    <td>{{ new Date(payment.payment_date).getDate()+'.'+(new Date(payment.payment_date).getMonth()+1)+'.'+new Date(payment.payment_date).getFullYear()+'.' }}</td>
                    <td>{{ new Date(payment.valid_thru).getDate()+'.'+(new Date(payment.valid_thru).getMonth()+1)+'.'+new Date(payment.valid_thru).getFullYear()+'.' }}</td>
                    <td><a :href="'/energijapp/payments/'+payment.id+'/edit'" class="btn btn-dark waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                    <td>
                        <button class="btn dtp-btn-clear waves-effect btn-xs" @click="deletePayment(payment.id, index)">
                            <i class="material-icons">delete_forever</i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <button class="btn btn-dark" @click="fetchPaginateUserPayments(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
                <
            </button>

            <span>{{ pagination.current_page }} od {{ pagination.last_page }}</span>

            <button class="btn btn-dark" @click="fetchPaginateUserPayments(pagination.next_page_url)" :disabled="!pagination.next_page_url">
                >
            </button>
        </div>
        <br/>
    </div>
</template>

<script>
    export default {
        props: ['user_id'],
        data() {
            return {
                payments: [],
                payment: {
                    id: '',
                    payment_date: '',
                    valid_thru: '',
                    price_id: '',
                    user_id: '',
                    price: {
                        title: ''
                    }
                },
                userPaymentSum: 0,
                url: '/api/payments/user/'+this.user_id,
                pagination: []
            }
        },
        created() {
            this.getUserPayments()
        },
        methods: {
            getUserPayments() {
                let $this = this;

                axios.get(this.url)
                    .then(response => {
                        this.payments = response.data[0].data;
                        this.userPaymentSum = response.data[1];
                        $this.pagination = response.data[0]
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            deletePayment(id, index) {
                axios.delete('/api/payments/'+id).then(response => {
                    this.payments.splice(index, 1);
                }).catch(error => {
                    console.log(error)
                })
            },

            makePagination(data) {
                this.pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
            },

            fetchPaginateUserPayments(url) {
                this.url = url;
                this.getUserPayments()
            }
        }
    }
</script>
