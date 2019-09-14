<template>
    <div class="body">
        <div class="row clearfix">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="training_id" class="col-sm-3 control-label">Trening:</label>
                    <div class="col-sm-9" id="training_reservation">
                        <select name="training_id" id="training_id" v-model="training_id" required>
                            <option v-for="training in trainings" :value="training.id">{{ training.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-3 control-label">Datum:</label>
                    <div class="col-sm-9">
                        <div class="form-line" id="date-line">
                            <input type="date" class="form-control" id="date" name="date" :min="current_date" :max="reservable_until" v-model="date" @change="getCount" required>
                        </div>
                    </div>
                </div>

                <div v-if="isVisible">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Broj mesta:</label>
                        <div class="col-sm-9">
                            <star-rating :rating="reservations" :max-rating="capacity" :star-size="20" inactive-color="#cdbbe9" active-color="#5b33a1" :show-rating="false" :read-only="true" :border-width="4" border-color="#d8d8d8" :rounded-corners="true" :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Moje rezervacije:</label>
                        <div class="col-sm-9">
                            <h6>{{ my_reservations }}</h6>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button v-if="isReservable" type="button" class="btn btn-dark" @click="storeReservation">REZERVIŠI</button>
                            <button v-if="isDeletable" type="button" class="btn dtp-btn-clear" @click="deleteUserReservations">OTKAŽI REZERVACIJE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating'

    export default {
        components: {
            StarRating
        },
        props: ['user_id'],
        data() {
            return {
                current_date: '',
                reservable_until: '',
                training_id: 4,
                date: '',
                trainings: [],
                training: {
                    id: '',
                    name: ''
                },
                capacity: 1,
                reservations: 0,
                my_reservations: 0,
                isVisible: false,
                isReservable: false,
                isDeletable: false
            }
        },
        mounted() {
            this.setDates();
            this.getReservableTrainings()
        },
        methods: {
            setDates() {
                  let today = new Date();
                  this.current_date = today.getFullYear() + '-' + ('0' + (today.getMonth()+1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
                  this.reservable_until = today.getFullYear() + '-' + ('0' + (today.getMonth()+1)).slice(-2) + '-' + ('0' + (today.getDate()+2)).slice(-2)
            },

            getReservableTrainings() {
                axios.get('/api/trainings/reservable').then(response => {
                    this.trainings = response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            getCount() {
                axios.get('/api/reservations/count', {
                    params: {
                        user_id: this.user_id,
                        training_id: this.training_id,
                        date: this.date
                    }
                })
                .then(response => {
                    this.isVisible = true;
                    this.capacity = response.data[0];
                    this.reservations = response.data[1];
                    this.my_reservations = response.data[2];
                    this.isReservable = response.data[3];
                    this.isDeletable = response.data[4];
                })
                .catch(error => {
                    console.log(error)
                })
            },

            storeReservation() {
                axios.post('/api/reservations', {
                    user_id: this.user_id,
                    training_id: this.training_id,
                    date: this.date
                }).then(response => {
                    this.reservations = response.data[0];
                    this.my_reservations = response.data[1];
                    this.isReservable = response.data[2];
                    this.isDeletable = true;
                }).catch(error => {
                    console.log(error)
                })
            },

            deleteUserReservations() {
                axios.delete('/api/reservations/user/'+this.user_id, {
                    params: {
                        training_id: this.training_id,
                        date: this.date
                    }
                })
                .then(response => {
                    this.reservations = response.data[0];
                    this.my_reservations = response.data[1];
                    this.isReservable = true;
                    this.isDeletable = false;
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
