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
            password: '',
            confirm_password: ''
        }
    },
    //----------------------------------------------
    mounted : function(){
        this.url.current = window.location.href
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        resetPassword : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/reset/password";
            console.log(url);

            var params = this.user;
            //url, parameters, callback method
            // this.processApiRequest(url, params, this.resetPasswordAfter);
        },

        resetPasswordAfter : function(data){
            this.stopProgressBar();
        },
    },
    //----------------------------------------------
});
