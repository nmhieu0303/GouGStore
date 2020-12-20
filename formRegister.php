<form class = "m-auto col-lg-6 col-12" action="register.php" method="POST">
    <div class="mb-3">
        <label for="fullname" class="form-label">Full name</label>
        <input type="text" class="form-control" id="fullname" placeholder="Full name">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="mb-3">
        <label for="passwordConfirm" class="form-label">Password Confirm</label>
        <input type="password" class="form-control" id="passwordConfirm" placeholder="Password Confirm">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="number" class="form-control" id="phone" placeholder="Phone">
    </div>



    <!--<div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="text" name="full_name" class="form-control">
                <label for="full_name" class="">Full name</label>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="text" name="username" class="form-control">
                <label for="username" class="">Username</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="password" name="password" class="form-control">
                <label for="password" class="">Password</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="password" name="passwordConfirm" class="form-control">
                <label for="password" class="">Password confirm</label>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="email" name="email" class="form-control">
                <label for="email" class="">Email</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="number" id="phone" name="number_phone" class="form-control">
                <label for="phone" class="">Phone</label>
            </div>
        </div>
    </div>-->

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