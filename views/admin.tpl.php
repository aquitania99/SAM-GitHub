<div class="container">
    <div class="alert alert-warning alert-dismissible hidden text-center" role="alert" id="alert">
        <button type="button" onclick="reset()" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> The details entered don't match the values in the Database, please try again!
    </div>
    <form class="form-signin" id="loginForm" method="post" action="admin">
        <h2 class="form-signin-heading"><?= $title ?></h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember-me" value="remember-me"> Remember me
            </label>
        </div>
        <input type="hidden" name="submit" value="login">
        <button class="btn btn-lg btn-primary btn-block" name="submit" value="submit" type="submit">Sign in</button>
    </form>

</div>
<script type="text/javascript" src="js/processData.js"></script>