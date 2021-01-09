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


function getAllProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProduct($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE id_product = ?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getCurrentUser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
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

function allUsers()
{
    $user = getAllUser();
    return json_encode($user);
}

function getLastIDProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT MAX(id) as max_id FROM products");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
}

function createProduct($id_prd, $name, $id_type, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO products(id_product,name,id_type,gender,description,import_price,price,promotion_price,image,new,hot)
    VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($id_prd, $name, $id_type, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot));
}

function updateProduct($id_prd, $name, $id_type, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot)
{
    global $db;
    $stmt = $db->prepare("UPDATE products 
                            SET  name = ?, id_type = ? , gender = ?,
                            description = ?, import_price = ?,
                            price = ?, promotion_price = ?,
                            image = ?, new = ?, hot = ?, updated_at = NULL
                            WHERE id_product = ?");
    $stmt->execute(array($name, $id_type, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot,$id_prd));
}

function updateType($id,$name){
    global $db;
    $stmt = $db->prepare("UPDATE type_product SET name = ? WHERE id = ?");
    $stmt->execute(array($name,$id));
}

function removeType($id){
    global $db;
    $stmt = $db->prepare("DELETE FROM type_product WHERE id = ?");
    $stmt->execute(array((int)$id));
}

function removeProduct($id_product){
    global $db;
    $stmt = $db->prepare("DELETE FROM products WHERE id_product = ?");
    $stmt->execute(array($id_product));
}

function addType($name){
    global $db;
    $stmt = $db->prepare("INSERT INTO type_product(name) VALUES(?)");
    $stmt->execute(array($name));
}

function renderTableCustomers(){
    $users = getAllUser();
    $strUsers = '';
    foreach($users as $user){
        $strUsers = $strUsers.
            '<tr>
                <td>' . $user["id"].'</td>
                <td>' . $user["full_name"] . '</td>
                <td>' . $user["address"] . '</td>
                <td>' . $user["create_at"] . '</td>
                <td>' . $user["phone_number"] . '</td>
                <td>' . $user["email"] . '</td>
                <td class="text-center">
                    <a href="" class="btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>';
    }
    return $strUsers;
}

function renderTableUsers(){
    $users = getAllUser();
    $strUsers = '';
    foreach($users as $user){
        $strUsers = $strUsers.
            '<tr>
                <td>' . $user["username"].'</td>
                <td>' . $user["phone_number"] . '</td>
                <td>' . $user["email"] . '</td>
                <td>' . $user["create_at"] . '</td>
                <td class="text-center">
                    <a href="" class="btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>';
    }
    return $strUsers;
}

function renderTableProduct(){
    $products = getAllProduct();
    $strProducts = '';
    foreach($products as $product){
        $strProducts = $strProducts.
            '<tr>
                <td>' . $product["id_product"].'</td>
                <td>' . $product["name"] . '</td>
                <td>' . $product["id_type"] . '</td>
                <td>' . $product["import_price"] . '</td>
                <td>' . $product["price"] . '</td>
                <td>' . $product["promotion_price"] . '</td>
                <td><img id="img_load" src="../uploads/'. $product["image"] . '" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a href ="./admin_editProduct.php?id='. $product["id_product"].'" title="edit" id="btn-edit-prd" class="btn-edit  btn-control text-success">
                        <i class="far fa-edit"></i>
                    </a>
                    <a  title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#removeModal">
                    <i class="far fa-times-circle"></i>
                </a>
                </td>
            </tr>';
    }
    return $strProducts;
}

function renderTableTpyeProduct(){
    $types = getAllTypeProduct();
    $strTypes = '';
    foreach($types as $type){
        $strTypes = $strTypes.
            '<tr>
                <td class = "id">' . $type["id"].'</td>
                <td>' . $type["name"] . '</td>
                <td>' . $type["created_at"] . '</td>
                <td>' . $type["updated_at"] . '</td>
                <td class="text-center">
                    <a  title="edit" class="btn-edit  btn-control text-success" data-toggle="modal" data-target="#updateModal">
                        <i class="far fa-edit"></i>
                    </a>
                    <a  title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#removeModal">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>';
    }
    return $strTypes;
}

function renderSelectType(){
    $types = getAllTypeProduct();
    $str = '<option selected> -- Loại sản phẩm -- </option>';
    foreach ($types as $type){
        $str = $str . '<option value="'. $type["id"] .'">'. $type["name"] .'</option>';
    }
    return $str;
}

// ======================================================================================================
//                                             ADD FUNCTIONS
//  ======================================================================================================

function addImageProduct($id_product,$image)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO product_images( id_product, image) VALUES (?,?)");
    $stmt->execute(array($id_product,$image));
}

// ======================================================================================================
//                                             GET FUNCTIONS
//  ======================================================================================================


function getAllTypeProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM type_product ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


