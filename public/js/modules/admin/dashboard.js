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
        image_name : ""
    },
    //----------------------------------------------
    mounted : function(){
        this.url.current = window.location.href;
        this.listLoader(false);
    },
    //----------------------------------------------
    methods : {
        //define your methods here
        listLoader : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/list";

            var params = {};
            //url, parameters, callback method
            this.processApiRequest(url, params, this.listLoaderAfter);
        },

        listLoaderAfter : function(data){
            this.stopProgressBar();
            this.list = data;
        },

        saveProduct : function(event){
            if(event){
                event.preventDefault();
            }
            var url = this.url.current+"/productSave";

            var params = this.product;
            /* url, parameters, callback method */
            this.processApiRequest(url, params, this.saveProductAfter);
        },

        saveProductAfter : function(data){
            this.listLoader();
            $("#add-product").modal("hide");
        },

        openPopup : function(product = {}){
            this.product = product;
            $("#add-product").modal("show");
        },

        //---------------------------------------------------------------------
        uploadFile : function (event) {
            event.preventDefault();
            let formData = new FormData();

            let file_name = this.image_name.substr(0, this.image_name.indexOf('.'));


            formData.append('file', this.file);
            formData.append('name', Date.now()+"_"+file_name);
            formData.append('dir','product');
            let url = this.url.current+"/upload";

            if (this.image_name.split('.').pop().toLowerCase()==="jpg"
                || this.image_name.split('.').pop().toLowerCase()==="png"){
                // console.log(file);
                this.processApiRequest(url, formData, this.uploadAfter);
                return;
            }
        },
        //---------------------------------------------------------------------
        handleImage: function (event) {
            event.preventDefault();
            console.warn(event);
            this.file = event.target.files[0];
            this.image_name =  this.file.name;
            this.uploadFile(event)
        },
        //---------------------------------------------------------------------
        uploadAfter : function (data) {
            this.product.image_url = data;
            NProgress.done();
        },
    },
    //----------------------------------------------
});
