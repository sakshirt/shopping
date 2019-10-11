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
    mounted : function(){
        this.url.current = window.location.href
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        registerUser : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/store";
            
            var params = {
                //pass parameters with request
                first_name: this.users.first_name,
                last_name: this.users.last_name,
                email: this.users.email,
                password: this.users.password,
                confirm_password: this.users.confirm_password
            };
            //url, parameters, callback method
            this.processApiRequest(url, params, this.registerUserAfter, true);
        },

        registerUserAfter : function(data){
            this.list = data;
            console.log('also working');
            this.stopProgressBar();
        },
    },
    //----------------------------------------------
});