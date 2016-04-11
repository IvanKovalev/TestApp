<div style="width: 200px; height: 200px; float: right">
    <form role="form" action="/UserAuthentication/logout">
        <div class="form-group">
            <label for="userName">Hello:</label>
            <input type="text" class="form-control" id="userName" value="<?= $_COOKIE['user'] ?>">
        </div>
        <button type="submit" class="btn btn-default"><a href="/UserAuthentication/logout">Logout</a></button>
    </form>
</div>
