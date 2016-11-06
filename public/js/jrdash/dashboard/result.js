/**
 * Created by Nikhil on 06-11-2016.
 */
var Result=function(){
    //--------------------------------------------------------------------------

    this.__construct=function(){
        console.log("Result created");
    };

    this.success=function(){
        console.log('success');
    };

    this.error=function(){
        console.log('error');
    };


    this.__construct();
}