<?php
    /**
     **** AppzStory Free Code ****
    * PHP Basic Login MySQLi
    * 
    * @link https://appzstory.dev
    * @author Yothin Sapsamran (Jame AppzStory Studio)
    */
    
    require_once('php/connect.php'); /*=== ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งานผ่านโฟลเดอร์ php ===*/
    /**
     * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
     */
    if(isset($_POST['submit'])){
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);       
        /**
         * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
         * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
         */
        $sqlUser = "SELECT * FROM `users` WHERE `username` = '".$username."'";
        $checkUser = $conn->query($sqlUser);
        if( !$checkUser->num_rows ) {
            $sql = "INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`, `created_at`) 
            VALUES ('".$username."', 
                    '".$passwordHashed."', 
                    '".$_POST['first_name']."', 
                    '".$_POST['last_name']."', 
                    '".$_POST['email']."', 
                    '".date("Y-m-d H:i:s")."')";
            $result = $conn->query($sql);
            /**
             * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
             */
            if($result){
                echo '<script> alert("สมัครสมาชิกสำเร็จ")</script>';
                header('Refresh:0; url=login.php');
            }else{
                echo '<script> alert("ระบบผิดพลาด โปรดติดต่อผู้ดูแลระบบ")</script>';
                header('Refresh:0; url=index.php');
            }
        } else {
            echo '<script> alert("ชื่อผู้ใช้นี้ ถูกใช้ไปเรียบร้อยแล้ว")</script>';
            header('Refresh:0; url=register.php');
        }
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" >
    <title>สมัครสมาชิก</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt" >
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-0 shadow">
                        <!-- action ด้วยค่าว่าง "" คือการส่ง Form นี้เข้าสู่หน้าปัจจุบัน -->
                        <!-- method POST คือการส่ง Form ให้อยู่ในรูปของ POST เพื่อส่งข้อมูล Form ในพื้นหลังการทำงาน -->
                        <form action="" method="POST">
                            <h4 class="card-header text-center">กรอกข้อมูลเพื่อสมัครสมาชิก</h4>
                            <div class="card-body px-4">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="first_name" class="col-form-label">ชื่อจริง:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="col-form-label">นามสกุล:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="col-form-label">อีเมลล์:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username" class="col-form-label">ชื่อผู้ใช้งาน:</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="col-form-label">รหัสผ่าน:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                    </div>
                                    <div class="col-12 text-center py-3">
                                        <input type="submit" name="submit" class="btn btn-primary d-grid mx-auto w-75" value="สมัครสมาชิก">
                                        <a href="login.php">เข้าสู่ระบบ</a>
                                        <a href="index.php">กลับหน้าหลัก</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>