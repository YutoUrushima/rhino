<?php
include_once __DIR__ . '/partial/head.php'; ?>
    <h1>Sign Up</h1>
    <form action="<?php __DIR__; ?>/system/enroll.php" method="post">
        <div class="mb-3">
            <label class="form-label" for="signupID">ID</label>
            <input class="form-control" type="email" name="signup_id" id="signupID"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="signupPassword">Password</label>
            <input class="form-control" type="password" name="signup_password" id="signupPassword"/>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
<?php include_once __DIR__ . '/partial/footer.php';
