<form class = "m-auto col-lg-6 col-12"action="login.php" method="POST">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="form-group">
        <label>Password</label> </label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="d-flex justify-content-between m-4">
        <a class="text-dark" href="forgetPass.php">Forget password ??</a>
        <a class="text-dark" href="register.php">Register</a>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Login</button>
</form>