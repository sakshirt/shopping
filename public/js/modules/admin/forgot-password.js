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
            email: '',
        }
    },
    //----------------------------------------------
    mounted : function(){
        this.url.current = window.location.href
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        forgotPassword : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/email";
            console.log(url);

            var params = this.user;
            //url, parameters, callback method
            this.processApiRequest(url, params, this.forgotPasswordAfter);
        },

        forgotPasswordAfter : function(data){
            this.stopProgressBar();
        },
    },
    //----------------------------------------------
});
