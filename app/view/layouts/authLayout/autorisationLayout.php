<div class="row" style="margin-top: 20%" >
    <div class="col-md-3 col-md-offset-3">
        <form role="form" action="/UserAuthentication/login" method="POST">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" id="usr" name="user">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <a  class="btn btn-default" href="/UserAuthentication/registration">registration</a>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</div>

