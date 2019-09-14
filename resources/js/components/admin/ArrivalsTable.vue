<template>
    <div>
        <div id="reservation-list" class="text-center">
            <p class="lead">Pregled dolazaka</p>
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
                    <label for="training_id">Trening</label>
                    <select id="training_id" name="training_id" class="form-control" v-model="training_id">
                        <option value="">Svi</option>
                        <option v-for="training in trainings" :value="training.id">{{ training.name }}</option>
                    </select>
                </div>
                <div class="form-group form-inline-elements">
                    <label for="trainer_id">Trener</label>
                    <select id="trainer_id" name="trainer_id" class="form-control" v-model="trainer_id">
                        <option value="">Svi</option>
                        <option v-for="trainer in trainers" :value="trainer.id">{{ trainer.first_name }} {{ trainer.last_name }}</option>
                    </select>
                </div>
                <div class="form-group form-inline-elements">
                    <button type="button" name="arrivalBtn" id="arrivalBtn" class="btn btn-dark waves-effect waves-light" @click="searchArrivals"><i class="material-icons">search</i> Nađi</button>
                </div>
            </form>
        </div>
        <br/>
        <div v-if="isVisible">
            <h3 class="text-center">Broj dolazaka: {{ arrivalCount }}</h3>
            <br/>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="dark">
                        <th>Broj kartice</th>
                        <th>Član</th>
                        <th>Trening</th>
                        <th>Trener</th>
                        <th>Datum dolaska</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="arrival in arrivals">
                        <td>{{ arrival.user.card_number }}</td>
                        <td>{{ arrival.user.first_name }} {{ arrival.user.last_name }}</td>
                        <td>{{ arrival.training.name }}</td>
                        <td>{{ arrival.trainer.first_name }} {{ arrival.trainer.last_name }}</td>
                        <td>{{ new Date(arrival.date).getDate()+'.'+(new Date(arrival.date).getMonth()+1)+'.'+new Date(arrival.date).getFullYear()+'.' }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-dark" @click="fetchPaginateArrivals(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
                        <
                    </button>

                    <span>{{ pagination.current_page }} od {{ pagination.last_page }}</span>

                    <button class="btn btn-dark" @click="fetchPaginateArrivals(pagination.next_page_url)" :disabled="!pagination.next_page_url">
                        >
                    </button>
                </div>
                <br/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
                date_from: '',
                date_to: '',
                training_id: '',
                trainer_id: '',
                arrivals: [],
                arrival: {
                    date: '',
                    user: {
                        first_name: '',
                        last_name: '',
                        card_number: ''
                    },
                    training: {
                        name: ''
                    },
                    trainer: {
                      first_name: '',
                      last_name: ''
                    }
                },
                arrivalCount: 0,
                isVisible: false,
                url: '/api/arrivals',
                pagination: []
            }
        },
        mounted() {
            this.getTrainings();
            this.getTrainers();
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

            searchArrivals() {
                let $this = this;

                axios.get(this.url, {
                    params: {
                        date_from: this.date_from,
                        date_to: this.date_to,
                        training_id: this.training_id,
                        trainer_id: this.trainer_id
                    }
                })
                .then(response => {
                    this.isVisible = true;
                    this.arrivals = response.data.data;
                    this.arrivalCount = response.data.total;
                    $this.pagination = response.data
                })
                .catch(error => {
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

            fetchPaginateArrivals(url) {
                this.url = url;
                this.searchArrivals()
            }
        }
    }
</script>
