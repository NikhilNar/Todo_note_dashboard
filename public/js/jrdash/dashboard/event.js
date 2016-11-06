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

                    Result.success("Success");

                    var output=Template.todo(o.data[0]);
                    $("#list_todo").append(output);

                }
                else
                {
                    Result.error(o.error);

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

        $(document).on('click',".todo_update",function(evt){
            evt.preventDefault();
            var self=$(this).parent('div');

            var url=$(this).attr("href");
            var posData={
                'todo_id':$(this).attr("data-id"),
                'completed':$(this).attr("data-completed")
            };

            $.post(url,posData,function(o){
                if(o.result==1){
                    Result.success("Saved");
                    self.addClass('todo_complete');
                }
                else{
                    Result.error("Nothing updated");
                }


            },'json');

        });

    }

    //--------------------------------------------------------------------------


    var update_note=function(){


    }

    //--------------------------------------------------------------------------



    //--------------------------------------------------------------------------

    var delete_todo=function(){
        $(document).on('click',".todo_delete",function(evt){
            evt.preventDefault();
            var self=$(this).parent('div');

            var url=$(this).attr("href");
            var posData={
                'todo_id':$(this).attr("data-id")
            };

            $.post(url,posData,function(o){
                if(o.result==1){
                    Result.success("Item Deleted");
                    self.remove();

                }
                else{
                    Result.error(o.msg);
                }


            },'json');
        });

    }

    //--------------------------------------------------------------------------


    var delete_note=function(){


    }

    //--------------------------------------------------------------------------


    this.__construct();
}