<template>
    <div>
        <form>
            <div class="form-group">
                <div class="form-line">
                    <input name="first_name" id="first_name" type="text" class="form-control" placeholder="Ime" v-model="first_name" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="title" id="title" type="text" class="form-control" placeholder="Prezime" v-model="last_name" />
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active" name="active" v-model="active" />
                <label class="form-check-label" for="active">
                    Samo aktivni
                </label>
            </div>
            <br/>
            <div class="form-group">
                <button type="button" name="searchUsrBtn" id="searchUsrBtn" class="btn btn-dark waves-effect waves-light" @click="nameSearch"><i class="material-icons">search</i> Nađi</button>
                <a href="/energijapp/users/create" class="btn btn-dark pull-right"><i class="material-icons">add</i> Dodaj korisnika</a>
            </div>
        </form>

        <div class="table-responsive" v-if="isVisible">
            <table class="table table-striped">
                <thead>
                <tr class="dark">
                    <th>Broj kartice</th>
                    <th>Ime i prezime</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users">
                    <td>{{ user.card_number }}</td>
                    <td><a :href="'/energijapp/profile/'+user.id">{{ user.first_name }} {{ user.last_name }}</a></td>
                </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-dark" @click="fetchPaginateUsers(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
                    <
                </button>

                <span>{{ pagination.current_page }} od {{ pagination.last_page }}</span>

                <button class="btn btn-dark" @click="fetchPaginateUsers(pagination.next_page_url)" :disabled="!pagination.next_page_url">
                    >
                </button>
            </div>
            <br/>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                first_name: '',
                last_name: '',
                active: '',
                users: [],
                user: {
                    id: '',
                    card_number: '',
                    first_name: '',
                    last_name: ''
                },
                isVisible: false,
                url: '/api/users/name_search',
                pagination: []
            }
        },
        methods: {
            nameSearch() {
                let $this = this;

                axios.get(this.url, {
                    params: {
                        first_name: this.first_name,
                        last_name: this.last_name,
                        active: this.active
                    }
                })
                .then(response => {
                    this.isVisible = true;
                    this.users = response.data.data;
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

            fetchPaginateUsers(url) {
                this.url = url;
                this.nameSearch()
            }
        }
    }
</script>
