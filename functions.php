<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function getAllUser()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findUserById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByEmail($email)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByUsername($username)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function changePass($id, $password)
{
    try {
        global $db;
        $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute(array($password, $id));
    } catch (PDOException $e) {
        echo 'Lỗi' . "<br>" . $e->getMessage();
    }
}

function createUser($username, $password, $email, $full_name, $phone_number, $code)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users (username, password, email, full_name, phone_number, activation) VALUES(?,?,?,?,?,?)");
    $stmt->execute(array($username, $password, $email, $full_name, $phone_number, $code));
    return findUserById($db->lastInsertId());
}

function getCurrentUser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
}

function upload_avatar($userId, $avatar)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    $stmt->execute(array($avatar, $userId));
}

// ===================IMG============================
function resizeImage($filename, $max_width, $max_height)
{
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    # taller
    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    # wider
    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);

    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

    return $image_p;
}

function repquireLoggedIn()
{
    $currentUser = getCurrentUser();
    if (!$currentUser) {
        header('Location: login.php');
        exit();
    }
}


// Send mail
function sendMail($to, $subject, $content)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'nmhieu03032000@gmail.com';                     // SMTP username
        $mail->Password   = 'hhiieeuu11';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('nmhieu03032000@gmail.com', 'Hờ Mờ Channel');
        $mail->addAddress($to);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  $subject;
        $mail->Body = $content;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function activateUser($userId)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET activation = NULL WHERE id = ?");
    $stmt->execute(array($userId));
}
function allUsers()
{

}
