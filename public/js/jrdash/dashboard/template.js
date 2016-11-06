var Template=function(){
    //--------------------------------------------------------------------------

    this.__construct=function(){
        console.log("Template created");
    };
    //--------------------------------------------------------------------------

    this.todo=function(obj){
        var output='';
        output +='<div id="todo_'+obj.todo_id+'">';
        output +='<span>'+obj.content+'</span>';
        output +='<a class="todo_update" data-id="'+obj.todo_id+'" data-completed="1" href="api/update_todo">Complete</a>';
        output +='<a data-id="'+obj.todo_id+'"  class="todo_delete" href="api/delete_todo">delete</a>';
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