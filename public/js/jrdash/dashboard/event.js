/**
 * Created by Nikhil on 06-11-2016.
 */
var Event=function(){
    //--------------------------------------------------------------------------

    this.__construct=function(){
        console.log("Event created");
        Result= new Result();

        create_todo();
        create_note();
        update_todo();
        update_note();
        delete_todo();
        delete_note();

    };

    //--------------------------------------------------------------------------

    var create_todo= function () {
        $("#create_todo").submit(function(evt){
            console.log("Create todo clicked");
            evt.preventDefault();
            var url=$(this).attr('action');
            var posData=$(this).serialize();

            $.post(url,posData,function(o){
                if(o.result==1){
                    Result.success();
                }
                else
                {
                    Result.error();
                }

            },'json');

            return false;
        });
    }

    var create_note= function () {
        $("#create_note").submit(function(evt){
            console.log("Create note clicked");
            return false;
        });
    }
    //--------------------------------------------------------------------------

    var update_todo=function(){

    }

    //--------------------------------------------------------------------------


    var update_note=function(){


    }

    //--------------------------------------------------------------------------



    //--------------------------------------------------------------------------

    var delete_todo=function(){

    }

    //--------------------------------------------------------------------------


    var delete_note=function(){


    }

    //--------------------------------------------------------------------------


    this.__construct();
}