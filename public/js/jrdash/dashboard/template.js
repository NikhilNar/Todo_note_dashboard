var Template=function(){
    //--------------------------------------------------------------------------

    this.__construct=function(){
        console.log("Template created");
    };
    //--------------------------------------------------------------------------

    this.todo=function(obj){
        var output='';
        if(obj.completed==1){
            output +='<div id="todo_'+obj.todo_id+'" class="todo_complete">';
        }
        else{
            output +='<div id="todo_'+obj.todo_id+'">';
        }


        output +='<span>'+obj.content+'</span>';

        if(obj.completed==1){
            output +='<a class="todo_update" data-id="'+obj.todo_id+'" data-completed="0" href="api/update_todo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        }
        else{
            output +='<a class="todo_update" data-id="'+obj.todo_id+'" data-completed="1" href="api/update_todo"><i class="fa fa-check" aria-hidden="true"></i></a>';
        }

        output +='<a data-id="'+obj.todo_id+'"  class="todo_delete" href="api/delete_todo"> <i class="fa fa-times" aria-hidden="true"></i></a>';
        output +='</div>';
        return output;
    };
    //--------------------------------------------------------------------------

    this.note=function(obj){
        var output='';
        output +='<div id="'+obj.note_id+'">';
        output +='<span>'+obj.title+'</span>';
        output +='<span>'+obj.content+'</span>';
        output +='</div>';
        return output;
    };

    //--------------------------------------------------------------------------

    this.__construct();
}