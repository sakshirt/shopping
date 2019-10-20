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
        user : {
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

            var params = this.user;
            //url, parameters, callback method
            this.processApiRequest(url, params, this.registerUserAfter);
        },

        registerUserAfter : function(data){
            this.stopProgressBar();
            if (data.redirect_url) {
                window.location = data.redirect_url;
            }
        },
    },
    //----------------------------------------------
});