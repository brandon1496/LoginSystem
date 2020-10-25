<?php include "includes/header.php";?>
<div class="row justify-content-center">
    <div class="col-md-4 col-xs-12">
        <h3>Login</h3>
        <p>Please fill this form to sign in.</p>
        <form>
            <div class="row justify-content-center">
                <div class="form-group col-12">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-12">
                    <label >Password</label>
                    <input type="password" name="Password" class="form-control" placeholder="Password">
                </div>
            </div>
            <span class="btns">
                <button type="submit" class="btn btn-primary">Sign In</button>
                <a class="btn btn-info" href="#" role="button">Forget Password</a>
            </span>
        </form>
    </div>
</div>
<?php include "includes/footer.php";?>