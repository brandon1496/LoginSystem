<?php include "includes/header.php";?>
<div class="row justify-content-center">
    <div class="col-md-8 col-xs-12">
        <h3>Sign Up</h3>
        <p>Please fill this form to create an account.</p>
        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="FirstName">
                </div>
                <div class="form-group col-md-6">
                    <label >Last Name</label>
                    <input type="text" class="form-control" name="LastName">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="Email">
                </div>
                <div class="form-group col-md-6">
                    <label >Password</label>
                    <input type="password" class="form-control" name="Password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="Phone">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</div>
<?php include "includes/footer.php";?>