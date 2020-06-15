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
        product : {
            id : null,
        },
        file: {},
        search: "",
    },
    //----------------------------------------------
    mounted : function(){
        this.url.current = window.location.href;
        this.product.id = this.url.current.split('/');
       
        this.detailLoader(false);
        // $('form').submit(false);
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        detailLoader : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/details";
            // console.log(this.product.id);

            var params = {
                search : this.search,
                id: this.product.id
            };
            //url, parameters, callback method
            this.processApiRequest(url, params, this.detailLoaderAfter);
        },

        detailLoaderAfter : function(data){
            this.stopProgressBar();
            this.list = data[0];
        },

    },
    //----------------------------------------------
})