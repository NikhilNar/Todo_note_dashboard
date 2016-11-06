/**
 * Created by Nikhil on 06-11-2016.
 */
var Result=function(){
    //--------------------------------------------------------------------------

    this.__construct=function(){
        console.log("Result created");
    };

    this.success=function(msg){
        var dom=$("#success");
        dom.html(msg).fadeIn();


        setTimeout(function(){
            dom.fadeOut();
        },5000);
        console.log("success");
    };

    this.error=function(msg){

        var dom=$("#error");

        if(typeof msg==='undefined'){
            dom.html('ERROR').fadeIn();
        }
        if(typeof msg==='object'){
            var output='';
            for(var key in msg){
                output+=msg[key]+"</br>";
            }
            dom.html(output).fadeIn();
        }
        else{
            dom.html(msg).fadeIn();
        }

        setTimeout(function(){
            dom.fadeOut();
        },5000);

    };


    this.__construct();
}