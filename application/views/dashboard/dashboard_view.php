<div class="container">
    <div class="row">
        <div class="col-md-4" id="dashboard-side">
            <form class="form-inline" id="create_todo" method="post" action="<?=base_url()?>api/create_todo">
                <div class="form-group">
                    <input type="text" name="content" class="form-control"  placeholder="Create New Todo Item">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            <div id="list_todo"></div>
        </div>
        <div class="col-md-7" id="dashboard-main">
            <form class="form-inline" id="create_note" method="post" action="<?=base_url()?>api/create_note">
                <div class="form-group">
                    <input type="text" name="content" class="form-control"  placeholder="Note title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Text input"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>