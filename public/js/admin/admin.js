var app = new Vue({
    el: '#app',
    data: {
        items: {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            confirm_password: ''
        }
    },
    methods: {
        storeRegister: function (event) {
            // `this` inside methods points to the Vue instance
            axios.get('/register/store').then(response => {
                this.items = response.data;
            });
        }
    }
})