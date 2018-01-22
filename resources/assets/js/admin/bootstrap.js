import Vue from 'vue';
import VueRouter from 'vue-router';
import Form from '../libs/Form';
import $ from 'jquery';

window.Vue = Vue;
Vue.use(VueRouter);
window.Form = Form;

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
