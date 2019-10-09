const app = new Extendable({
    el : '#app',
    //----------------------------------------------
    data : {
        // define variables here
        url : [],
        list : [],

        // for pagination
        pagination : [],
        current_page : 1,
        total_page : null,
        per_page : null,
        //end pagination

        // user data
        users : {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            confirm_password: '',
        }
    },
    //----------------------------------------------
    mounted : {

        // this.url.current = window.location.href;
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        registerUser : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/register/store/user";

            var params = {
                //pass parameters with request
            };
            //url, parameters, callback method
            this.processApiRequest(url, params, this.registerUserAfter);
        },

        registerUserAfter : function(data){
            this.list = data;

            this.stopProgressBar();
        },
    },
    //----------------------------------------------
});