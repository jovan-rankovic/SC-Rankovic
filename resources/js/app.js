
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('arrivals-table', require('./components/admin/ArrivalsTable').default);
Vue.component('payments-table', require('./components/admin/PaymentsTable').default);
Vue.component('reservations-table', require('./components/energijapp/operator/reservations/ReservationsTable').default);
Vue.component('card-number-search', require('./components/energijapp/operator/users/CardNumberSearch').default);
Vue.component('name-search', require('./components/energijapp/operator/users/NameSearch').default);
Vue.component('payment-create', require('./components/energijapp/operator/payments/PaymentCreate').default);
Vue.component('payment-edit', require('./components/energijapp/operator/payments/PaymentEdit').default);
Vue.component('arrival-create', require('./components/energijapp/operator/arrivals/ArrivalCreate').default);
Vue.component('arrival-edit', require('./components/energijapp/operator/arrivals/ArrivalEdit').default);
Vue.component('reservation-form', require('./components/energijapp/user/reservations/ReservationForm').default);
Vue.component('change-password', require('./components/energijapp/profile/ChangePassword').default);
Vue.component('user-payments', require('./components/energijapp/profile/UserPayments').default);
Vue.component('user-payment-arrivals', require('./components/energijapp/profile/UserPaymentArrivals').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
