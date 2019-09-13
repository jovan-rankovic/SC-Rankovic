<template>
    <div class="body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p class="lead">Dodaj dolazak</p>
                <form>
                    <br/>
                    <div class="form-group">
                        <label for="date"><p><i>Datum:</i></p></label>
                        <div class="form-line">
                            <input name="date" id="date" type="date" class="form-control" v-model="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="training_id"><p><i>Trening:</i></p></label>
                        <br/>
                        <select name="training_id" id="training_id" v-model="training_id" required>
                            <option v-for="training in trainings" :value="training.id">{{ training.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="trainer_id"><p><i>Trener:</i></p></label>
                            <br/>
                            <select name="trainer_id" id="trainer_id" v-model="trainer_id" required>
                                <option v-for="trainer in trainers" :value="trainer.id">{{ trainer.first_name }} {{ trainer.last_name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" name="arrivalBtn" id="arrivalBtn" class="btn btn-dark waves-effect waves-light" @click="storeArrival()">Dodaj</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                    <div v-if="isFail" class="error">Termini su iskorićeni.</div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['payment_id', 'user_id'],
        data() {
            return {
                date: '',
                training_id: 1,
                trainer_id: 1,
                trainings: [],
                training: {
                    id: '',
                    name: ''
                },
                trainers: [],
                trainer: {
                    id: '',
                    first_name: '',
                    last_name: ''
                },
                isFail: false
            }
        },
        mounted() {
            this.getTrainings();
            this.getTrainers()
        },
        methods: {
            getTrainings() {
                axios.get('/api/trainings').then(response => {
                    this.trainings = response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            getTrainers() {
                axios.get('/api/trainers').then(response => {
                    this.trainers = response.data
                }).catch(error => {
                    console.log(error)
                })
            },

            storeArrival() {
                axios.post('/api/arrivals/', {
                    date: this.date,
                    training_id: this.training_id,
                    trainer_id: this.trainer_id,
                    payment_id: this.payment_id,
                    user_id: this.user_id
                }).then(response => {
                    window.location.replace('/energijapp/profile/'+this.user_id)
                }).catch(error => {
                    console.log(error);
                    this.isFail = true
                })
            }
        }
    }
</script>
