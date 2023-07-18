<?php
$msg= "";

if(isset($_GET[error])){
    $error = $_GET[error];
    if($error == 210){
        $msg = "عدم تطابق پسوردها";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>پنل کاربر</title>
    <style>
        /* استایل‌های CSS برای فرم ثبت نام */
            body {
                font-family: B Koodak;
                background-color: #f2f2f2;
            }
            
            #signup-form {
                width: 400px;
                margin: 50px auto;
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
            }
            
            h1 {
                text-align: center;
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
            h3{
                color: red;
                text-align: center;
            }
            
            form {
                display: flex;
                flex-direction: column;
            }
            
            input[type="text"],
            input[type="password"],
            input[type="email"] {
                font-family: B Koodak;
                text-align: right;
                padding: 10px;
                margin-bottom: 20px;
                border: none;
                border-radius: 5px;
                font-size: 1.2rem;
            }
            
            input[type="text"]:focus,
            input[type="password"]:focus,
            input[type="email"]:focus {
                outline: none;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }
            
            button[type="submit"] {
                padding: 10px;
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 1.2rem;
                cursor: pointer;
            }
            
            button[type="submit"]:hover {
                background-color: #3e8e41;
            }
    </style>
</head>
<body>

    <!-- فرم ثبت نام -->
    <div id="signup-form">
        <h1>ثبت نام</h1>
        <h3><?php echo $msg;?></h3>
        <form action="admin_method.php" method="post" enctype="multipart/form-data">
            <input type="text" name="doctor_name" placeholder="نام و نام خانوادگی" required><br
            <input type="text" name="save_doctor_info" placeholder="نام کاربری" required><br>
            <input type="password" name="password" placeholder="رمز عبور" required><br>
            <input type="password" name="password2" placeholder="تکرار رمز عبور" required><br>
            <input type="text" name="personeli" placeholder="کد پرسنلی" required><br>
            <input type="file" name="myfile"> <br>
            <button type="submit">ثبت نام</button>
        </form>
    </div>


</body>
</html>
