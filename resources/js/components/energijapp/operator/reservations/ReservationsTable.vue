<template>
    <div>
        <div id="reservation-list" class="text-center">
            <p class="lead">Pregled rezervacija</p>
            <form>
                <div id="date-line" class="center-block">
                    <input type="date" class="form-control" id="training_date" name="training_date" required v-model="training_date" @change="dateSearch">
                </div>
            </form>
        </div>
        <br/>
        <div class="table-responsive" v-if="isVisible">
            <table class="table table-striped">
                <thead>
                <tr class="dark">
                    <th>Broj kartice</th>
                    <th>Član</th>
                    <th>Trening</th>
                    <th>Obriši</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(reservation, index) in reservations">
                    <td>{{ reservation.user.card_number }}</td>
                    <td>{{ reservation.user.first_name }} {{ reservation.user.last_name }}</td>
                    <td>{{ reservation.training.name }}</td>
                    <td>
                        <button class="btn dtp-btn-clear waves-effect btn-xs" @click="deleteReservation(reservation.id, index)">
                            <i class="material-icons">delete_forever</i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                training_date: '',
                reservations: [],
                reservation: {
                    id: '',
                    user: {
                        first_name: '',
                        last_name: '',
                        card_number: ''
                    },
                    training: {
                        name: ''
                    }
                },
                isVisible: false
            }
        },
        methods: {
            dateSearch() {
                axios.get('/api/reservations/date_search', {
                    params: {
                        training_date: this.training_date
                    }
                })
                .then(response => {
                    this.isVisible = true;
                    this.reservations = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            },

            deleteReservation(id, index) {
                axios.delete('/api/reservations/'+id).then(response => {
                    this.reservations.splice(index, 1);
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
