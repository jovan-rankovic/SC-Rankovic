<template>
    <div role="tabpanel" class="tab-pane fade in" id="change_password">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="NewPassword" class="col-sm-3 control-label">Nova lozinka</label>
                <div class="col-sm-9">
                    <div class="form-line">
                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="Nova lozinka" v-model="newPassword" required />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Nova lozinka ponovo</label>
                <div class="col-sm-9">
                    <div class="form-line">
                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="Nova lozinka ponovo" v-model="newPasswordConfirm" required />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-dark" id="btnChangePass" name="btnChangePass" @click="changePassword">POTVRDI</button>
                </div>
            </div>
        </form>

        <div class="text-center error" v-if="isFail">Lozinke se moraju poklapati, imati 6 karaktera i bar jedno veliko slovo i broj.</div>
        <div class="text-center text-success" v-if="isSuccess">Lozinka promenjena.</div>
    </div>
</template>

<script>
    export default {
        props: ['user_id'],
        data() {
            return {
                newPassword: '',
                newPasswordConfirm: '',
                isSuccess: false,
                isFail : false
            }
        },
        methods: {
            changePassword() {
                axios.patch('/api/users/'+this.user_id+'/change_password', {
                    newPassword: this.newPassword,
                    newPasswordConfirm: this.newPasswordConfirm
                }).then(response => {
                    this.isSuccess = true;
                    this.isFail = false
                }).catch(error => {
                    console.log(error.message);
                    this.isFail = true;
                    this.isSuccess = false
                })
            }
        }
    }
</script>
