const app = new Extendable({
    el : '#wrapper',
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
        product : {},
        file: {},
        search: "",
    },
    //----------------------------------------------
    mounted : function(){
        this.url.current = window.location.href;
        this.listLoader(false);
        $('form').submit(false);
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        listLoader : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/list";
            console.log(url);

            var params = {
                search : this.search
            };
            //url, parameters, callback method
            this.processApiRequest(url, params, this.listLoaderAfter);
        },

        listLoaderAfter : function(data){
            this.stopProgressBar();
            this.list = data;
        },

        
    },
    //----------------------------------------------
});
