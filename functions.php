<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function getCartDetails($idUser)
{
    global $db;
    $stmt = $db->prepare("SELECT cd.id,p.id_product,p.name,p.image,cd.size,cd.price,cd.quantity,cd.total
                            FROM cart c JOIN cart_detail cd ON c.id = cd.id_cart
                            JOIN products p ON cd.id_product = p.id_product
                            WHERE c.id = ?  
                            ORDER BY cd.created_at DESC;");
    $stmt->execute(array($idUser));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE id_product = ?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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


// ===========================     POST  ==============================


function getPosts()
{
    global $db;
    $stmt = $db->query("SELECT * FROM post ORDER BY created desc");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPostsOfUser(int $userid)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM post WHERE userId = ? ORDER BY created DESC");
    $stmt->execute(array($userid));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function findPostByID(int $postID)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM post WHERE id = ?");
    $stmt->execute(array($postID));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllPost()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM post ORDER BY created DESC");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function renderNewFeed()
{
    global $posts;
    foreach ((array)$posts as $post) {
        renderNews($post);
    }
}

function renderNews($post)
{
    $elementImg = $post['images']  == NULL ? '' : '<img src="mediaPost.php?id=' . $post['id'] . '"  alt="" class="newfeed__item--img w-100">';
    $str = '<div class="newfeed__item">
        <div class="d-flex">
            <!-- Avatar -->
            <a href="#" class="newfeed__item--img"> 
                <img class="newfeed--avatar--img" src="avatar.php?id=' . $post['userId'] . '" alt="">
            </a>
            <!-- Info post -->
            <div class="newfeed__item--info ml-3 flex-grow-1">
                <div class = "d-flex justify-content-between">
                    <a href="#" class="info--username">' . findUserById($post['userId'])['full_name'] . '</a>
                    <a class="newfeed__item--more">
                        <i class="fas fa-angle-down"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <span class="info--time">' . $post['created'] . '</span>
                    <div class="info--separator">-</div>
                    <a href="#" class="info--privacy">
                        <i class="fas fa-globe-americas"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Content text -->
        <p class="newfeed__item--caption">'
        . $post['content'] .
        '</p>
        <!-- content media -->
        <div class="newfeed__item--media">'
        . $elementImg .
        '</div>
        <!-- Interactives -->
        <div class="newfeed__item--interactives">
            <div class="interactives__item">
                <div class="interactives__item--icon" onclick="like(this)">
                    <i class="far fa-heart"></i>
                </div>
                <span class="interactives__item--number">0</span>
            </div>
            <div id="interactives__item--comment" class="interactives__item">
                <a class="interactives__item--icon">
                    <i class="fas fa-comment-alt"></i>
                </a>
                <span class="interactives__item--number">0</span>
            </div>
            <div id="interactives__item--share" class="interactives__item">
                <a class="interactives__item--icon">
                    <i class="fas fa-share-alt"></i>
                </a>
                <span class="interactives__item--number">0</span>
            </div>
        </div>
    
    </div>';
    echo ($str);
}

function createNewPost($userId, $connent, $image)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO post (userId,content,images) VALUES(?, ?,?)");
    $stmt->execute(array($userId, $connent, $image));
    return $db->lastInsertId();
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
        $mail->Username   = 'gunostoresaigon@gmail.com';                     // SMTP username
        $mail->Password   = 'gunosaigon';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('gunostoresaigon@gmail.com', 'GunoStore');
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


function getLastIDProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT MAX(id) as max_id FROM users");
    $stmt->execute();
    return $stmt -> fetch(PDO::FETCH_ASSOC)['max_id'];
}



// ==========================================================================================
//                                RENDER FUNCTIONS
// ========================================================================================

function renderCart($id){
    
    $cartDetails = getCartDetails($id);
    $strCart = '';
    foreach ($cartDetails as $cartDetail){
        $strCart = $strCart.'
         <!-- Product card -->
         <div id = "cart-detail-'.$cartDetail["id"] . '" class = "cart-detail--item">
         <div class="row mb-4">
         <div class="col-md-5 col-lg-3 col-xl-3">
             <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                 <img class="product-img img-fluid w-100" src="./assets/img/pro_2-500x500.jpg" alt="Sample">
                 <a class = "product-link" href="/products.php?id='. $cartDetail["id_product"] . '">
                     <div class="mask waves-effect waves-light">
                         <div class="mask rgba-black-slight waves-effect waves-light"></div>
                     </div>
                 </a>
             </div>
         </div>
         <div class="col-md-7 col-lg-9 col-xl-9">
             <div>
                 <div class="d-flex justify-content-between">
                     <div class="cart__product-info w-75">
                         <a href="/products.php?id='. $cartDetail["id_product"] . '">
                             <h5 class="cart__product-info--heading">'. $cartDetail["name"] . '</h5>
                         </a>
                         <p id = "id_product-'. $cartDetail["id"] . '" class=" cart__product-info--dsc mb-3 text-muted text-uppercase small">'. $cartDetail["id_product"] . '</p>
                         <p class="cart__product-info--dsc mb-3 text-muted text-uppercase small">Size:<span id="size_product-'. $cartDetail["id"] . '" class=" cart__product-info--size">'. $cartDetail["size"] . '<span></p>
                         <p class=" mb-3 text-muted text-uppercase small"><span class="font-weight-bold">Giá: </span> <span id="price_product-'. $cartDetail["id"] . '">'. (string)number_format($cartDetail["price"], 0, ',', '.') . '</span> VND</p>  
                     </div>
                     <div class="text-right">
                         <div class="def-number-input number-input safari_only mb-0 w-100">
                             <button onClick="decrement_quantity(' . $cartDetail["id"] . ')" class="minus">-</button>
                             <input id="input_quantity-' .$cartDetail["id"] . '" class="quantity w-50" min="0" name="quantity" value="'. $cartDetail["quantity"] . '" type="number">
                             <button onClick="increment_quantity(' . $cartDetail["id"] . ')" class="plus">+</button>
                         </div>
                     </div>
                 </div>
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <a type="button" onClick="sendEventRemoveCartDetail(' . $cartDetail["id"] . ')" class="btn-remove card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Xóa sản phảm</a>
                         <a type="button" onClick="addWishList(' . $cartDetail["id"] . ')"class="btn-addWishList card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> Thêm vào danh sách yêu thích </a>
                     </div>
                     <p class="mb-0"><strong class="cart__product-info--price"><span class = "total_product" id= "total_product-' . $cartDetail["id"] . '">'. (string)number_format($cartDetail["total"], 0, ',', '.') . '</span> VND</strong></p>
                 </div>
             </div>
         </div>
     </div>
     <!-- End product card -->
     <hr class="mb-4">
     </div>';
    }
    return $strCart;
}

// ==========================================================================================
//                                ADD FUNCTIONS
// ========================================================================================

function addCartDetail($id_cart,$id_cartDetail, $size, $quantity,$price){
    global $db;
    $stmt = $db->prepare("INSERT INTO cart_detail(id_cart,id_product,size,quantity,price,total) VALUES(?,?,?,?,?,?)");
   $stmt->execute(array($id_cart,$id_cartDetail, $size, $quantity,$price,$quantity*$price));
}



// ==========================================================================================
//                                UPDATE FUNCTIONS
// ========================================================================================

function updateCartDetail($id_cart,$id_cartDetail,$newQuantity){
    global $db;
    $stmt = $db->prepare("UPDATE cart_detail cd 
                            SET cd.quantity = ?, cd.total = cd.price * ?
                            WHERE id_cart = ? AND cd.id = ?");
    $stmt->execute(array($newQuantity,$newQuantity,$id_cart,$id_cartDetail));
}


// ==========================================================================================
//                                REMOVE FUNCTIONS
// ========================================================================================

function removeCartDetail($id_cart,$id_cartDetail){
    global $db;
    $stmt = $db->prepare("DELETE cd
                         FROM cart_detail cd 
                         WHERE cd.id_cart = ? AND cd.id = ?");
    $stmt->execute(array($id_cart,$id_cartDetail));
}

// ==========================================================================================
//                                GET FUNCTIONS
// ========================================================================================
function getCountCartDetail($id_cart){
    global $db;
    $stmt = $db->prepare("SELECT *
                         FROM cart_detail cd 
                         WHERE cd.id_cart = ? ");
    $stmt->execute(array($id_cart));
    return $stmt->rowCount();
}

function getPriceProdurt($id_product){
    global $db;
    $stmt = $db->prepare("SELECT price
                         FROM product  
                         WHERE id_product = ? ");
    $stmt->execute(array($id_product));
    return $stmt->fetchColumn();;
}


function getTotalCart($id_cart){
    global $db;
    $stmt = $db->prepare("SELECT total_cart
                         FROM cart  
                         WHERE id = ? ");
    $stmt->execute(array($id_cart));
    return $stmt->fetchColumn();;
}

function formatCurrency($number){
    return number_format($number, 0, ',', '.');
}
