<?php
    include 'partial/head.php';
?>
    <div class="container">
        <h1>Sign up</h1>
        <form>
            <div class="mb-3">
                <label class="form-label" for="signupID">ID</label>
                <input class="form-control" type="text" name="signup_id" id="signupID"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="signupPassword">Password</label>
                <input class="form-control" type="password" name="signup_id" id="signupPassword"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php
    include 'partial/footer.php';