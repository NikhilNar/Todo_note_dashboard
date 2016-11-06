<div class="container" id="main-container">
    <div class="alert alert-danger" role="alert" id="register_form_errors">
        <!--Dynamically updated based on response from server-->
    </div>
    <form method="post" id="register_form" action="<?=site_url('api/register')?>">
        <div class="form-group">
            <input type="text" name="login"class="form-control" id="login" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <input type="email" name="email"class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <input type="password" name="password"class="form-control" id="password" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <input type="text" name="confirm_password"class="form-control" id="confirm_password" aria-describedby="emailHelp" placeholder="Confirm Password">
        </div>

        <button type="submit" value="Register"name="register"class="btn btn-primary">Register</button>
    </form>

</div>
<a href="<?=site_url('/')?>">Back</a>


<script type="text/javascript">
    $("#register_form_errors").hide();
    $("#register_form").submit(function(evt){

        evt.preventDefault();
        var url=$(this).attr('action');
        var posData=$(this).serialize();

        $.post(url,posData,function(o){
            if(o.result==1){
                window.location.href="<?=site_url('dashboard')?>";
            }
            else{

                var output="<ul>";
                for(var key in o.error){
                    var value= o.error[key];
                    console.log(value);
                    output +='<li>'+value+'</li>';
                }
                output +='</ul>';
                $("#register_form_errors").show();
                $("#register_form_errors").html(output);


            }

        },'json');

    })


</script>