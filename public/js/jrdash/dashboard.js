var Dashboard=function(){
    //--------------------------------------------------------------------------

    this.__construct=function(){
        console.log("Dashboard created");
        Template =new Template();
        Event =new Event();
        //Result=new Result();
        load_todo();
        load_note();

    };
    //--------------------------------------------------------------------------
    var load_todo=function(){

        $.get('api/get_todo', function (o) {

            var output="";
            for(var i=0;i<= o.length-1;i++){
                output+=Template.todo(o[i]);
            }

            $("#list_todo").html(output);

        },'json');

    }

    //--------------------------------------------------------------------------

    var load_note=function(){

    }

    //--------------------------------------------------------------------------



    this.__construct();
}