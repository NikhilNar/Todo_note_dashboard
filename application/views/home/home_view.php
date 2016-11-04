<div class="container" id="main-container">
    <form method="post" id="login_form" action="<?=site_url('user/login')?>">
        <div class="form-group">
            <input type="text" name="login"class="form-control" id="login" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="password" name="password"class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" value="login"name="submit"class="btn btn-primary">Submit</button>
    </form>

</div>

<script type="text/javascript">
    $("#login_form").submit(function(evt){
        evt.preventDefault();
        var url=$(this).attr('action');
        var posData=$(this).serialize();

        $.post(url,posData,function(o){
            if(o.result==1){
                window.location.href="<?=site_url()?>dashboard";
            }
            else{
                alert("Bad login");
            }

        },'json');

    })


</script>