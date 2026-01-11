<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // استقبال البيانات
    $fullName = trim($_POST['full_name']); 
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $gender     = $_POST['gender'] ?? ''; 
    $membership = $_POST['membership_type'];

    $error = "";

    // التحقق من الأخطاء (PHP Validation)
    if (empty($fullName) || empty($email) || empty($password) || empty($gender)) {
        $error = "All fields are required!";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    }
    elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match!";
    }

    // حساب الفاتورة بناءً على الجدول
    $billMessage = "";
    if (!$error) {
        if ($membership == "Free") {
            $billMessage = "You have registered with <strong>Free Membership</strong>. <br> Check your email<strong> \"$email\"</strong> for more information.";
        } 
        elseif ($membership == "Premium") {
            $billMessage = "You have registered with <strong>Premium Membership</strong> and total bill is 20 euros/month. <br> Check your email<strong> \"$email\" </strong>for more information.";
        } 
        elseif ($membership == "Unlimited") {
            $billMessage = "You have registered with <strong>Unlimited Membership</strong> and total bill is 30 euros/month. <br> Check your email <strong>\"$email\"</strong> for more information.";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration Result</title>
        <style>
            
            body { 
                font-family: "Times New Roman", Times, serif; 
                padding: 40px; 
                line-height: 1.6; 
            }
            .container { 
                border: 1px solid #767676; 
                padding: 25px; 
                max-width: 600px; 
            }
            h2 { 
                margin-top: 0; 
                font-size: 22px;
            }
            hr { 
                border: 0; 
                border-top: 1px solid #ccc; 
                margin: 20px 0; 
            }
            .info-text {
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php if ($error): ?>
                <h2>Error!</h2>
                <p class="info-text"><?php echo $error; ?></p>
                <a href="2149011074.php">Go Back</a>
            <?php else: ?>
                <h2>Registration Successful</h2>
                <div class="info-text">
                    <p><?php echo $billMessage; ?></p>
                </div>
                <hr>
                
            <?php endif; ?>
        </div>

    </body>
    </html>
<?php
} else {
    header("Location: 2149011074.php");
    exit();
}
?>


