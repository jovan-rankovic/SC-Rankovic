<template>
    <form @submit.prevent>
        <div class="form-group">
            <div class="form-line">
                <input ref="cn" name="card_number" id="card_number" type="text" maxlength="5" class="form-control text-center" placeholder="Broj kartice (skener)" v-model="card_number" @keyup="cardNumberSearch" autofocus />
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                card_number: ''
            }
        },
        methods: {
            cardNumberSearch(e) {
                axios.get('/api/users/card_number_search', {
                    params: {
                        card_number: this.card_number
                    }
                })
                    .then(response => {
                        if(response.data[0].id != null)
                            location.replace('/energijapp/profile/' + response.data[0].id)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>
