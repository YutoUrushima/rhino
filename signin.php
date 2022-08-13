<?php
include_once __DIR__ . '/partial/head.php'; ?>
    <h1>Sign In</h1>
    <form action="<?php __DIR__; ?>/system/verify.php" method="post">
        <div class="mb-3">
            <label class="form-label" for="signinID">ID</label>
            <input class="form-control" type="email" name="signin_id" id="signinID" placeholder="xxx@gmail.com"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="signinPassword">Password</label>
            <input class="form-control" type="password" name="signin_password" id="signinPassword"/>
        </div>
        <button type="submit" class="btn btn-primary">Signin</button>
    </form>
<?php include_once __DIR__ . '/partial/footer.php';
