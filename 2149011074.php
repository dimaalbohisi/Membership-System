<?php
// Q2: تعريف المصفوفة
$membership = array("Free", "Premium", "Unlimited");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Registration</title>
    <style>
        body { 
            font-family: "Times New Roman", Times, serif; 
            padding: 20px; 
            background-color: white;
        }

        h2 { 
            font-style: italic; 
            font-size: 22px; 
            margin-bottom: 30px; /* مسافة تحت العنوان */
        }

        /* زيادة المسافة بين كل سطر والآخر */
        .row { 
            margin-bottom: 18px; /* مسافة أكبر ليعطي شكل مريح */
        }

        label { 
            font-size: 16px; 
            color: black;
            margin-right: 8px; 
        }

        input[type="text"], 
        input[type="email"], 
        input[type="password"],
        select {
            padding: 2px;
            border: 1px solid #767676;
            border-radius: 2px;
            font-size: 14px;
            width: 200px;
        }

        .radio-label {
            font-weight: normal;
            font-size: 16px;
            margin-right: 15px;
        }

        .submit-btn {
            margin-top: 10px;
            padding: 2px 12px;
            font-size: 15px;
            background-color: #efefef;
            border: 1px solid #767676;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>To register , Fill the following Membership Form :</h2>

    <form action="output.php" method="POST">
        
        <div class="row">
            <label>Full Name:</label>
            <input type="text" name="full_name"required >
        </div>

        <div class="row">
            <label>Email Address:</label>
            <input type="email" name="email"required >
        </div>

        <div class="row">
            <label>Password:</label>
            <input type="password" name="password"required >
        </div>

        <div class="row">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password"required >
        </div>

        <div class="row">
            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" id="m"required > 
            <label for="m" class="radio-label">Male</label>
            
            <input type="radio" name="gender" value="Female" id="f"> 
            <label for="f" class="radio-label">Female</label>
        </div>

        <div class="row">
            <label>Membership Type:</label>
            <select name="membership_type">
                <?php
                foreach ($membership as $type) {
                    echo "<option value='$type'>$type</option>";
                }
                ?>
            </select>
        </div>
        
        <button type="submit" name="submit" class="submit-btn">Submit</button>
    </form>

</body>
</html>


 