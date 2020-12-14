<form class = "m-auto col-lg-6 col-12" action="register.php" method="POST">
    <div class="form-group">
        <label>Full name</label>
        <input type="text" class="form-control" name="fullname" required>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label>Password confirm</label>
        <input type="password" class="form-control" name="passwordConfirm" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
        <label>Number phone</label>
        <input type="number" class="form-control" name="phone">
    </div>

    <!-- SELECT ADDRESS  -->

    <!-- <div class="row justify-content-around mb-4">
        <div class="col-4">
            <div class="select-address-box">
                <label>Tỉnh/Thành phố</label>
                <select class="js-example-basic-single" name="city" required>
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="select-address-box">
                <label>Quận/Huyện</label>
                <select class="js-example-basic-single" name="county" required>
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="select-address-box">
                <label>Phường/Xã</label>
                <select class="js-example-basic-single" name="warms" required>
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
        </div>
    </div> -->
    <div class="d-flex justify-content-end m-4">
        <a class="text-primary" href="login.php">Go to login</a>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Register</button>
</form>
</div>