<?php
require_once 'init.php';
// Xử lý logic ở đây

$title = "Login";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = findUserByUsername($username);
    if (!$user) {
        $error = 'User does not exist!';
    } else if (!password_verify($password, $user['password'])) {    
        $error = 'Incorrect password!';
    } else {       
        //Assign the user to session
        $_SESSION['userId'] = $user['id'];
        $_SESSION['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
        header('Location: index.php');
        exit();
    }
}
?>
<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <h1 class="display-4 text-center font-weight-normal mb-4"><?php echo $title ?></h1>
<<<<<<< HEAD
        
=======
>>>>>>> 1bf8665cce91058128efe89fb743acebe097a42d
        <?php if (isset($error)) : ?>
            <!--Check error message -->
            <!--Show error message -->
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
            <!--Error analysis -->
            <?php if ($error == 'Incorrect password!') : ?>
                <?php include 'formLogin.php'; ?>
            <?php else : ?>
                <?php include 'formLogin.php'; ?>
            <?php endif; ?>
        <?php else : include 'formLogin.php' ?>

        <?php endif; ?>

        <?php include 'footer.php'; ?>