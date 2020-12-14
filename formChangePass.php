<form class = "m-auto col-lg-6 col-12" action="changePass.php" method="POST">
    <div class="form-group">
        <label>Current password</label>
        <input type="password" class="form-control" name="currentPass" required>
    </div>
    <div class="form-group">
        <label>New password</label> 
        <input type="password" class="form-control" name="newPass" required>
    </div>
    <div class="form-group">
        <label>New password confirm</label>
        <input type="password" class="form-control" name="newPassConfirm" required>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Change</button>
</form>