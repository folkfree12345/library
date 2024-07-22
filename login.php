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
    if (isset($_POST['submit'])) { 
        /**
         * กำหนดตัวแปรเพื่อมารับค่า
         * ฟังก์ชัน real_escape_string()
         * ใช้สำหรับเลี่ยงการใช้ตัวอักขระพิเศษในคำสั่ง sql เช่น เครื่องหมาย " เครื่องหมาย '
         */
        $username =  $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        /**
         * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
         * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมวณผลการทำงานของคำสั่ง sql
         */
        $sql = "SELECT * FROM `users` WHERE `username` = '".$username."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        /**
         * ตรวจสอบการเข้าสู่ระบบ
         */
        if(!empty($row)){
            if(password_verify($password, $row['password'])){
                /** เก็บข้อมูล user เข้าสู่ session เพื่อนำไปใช้งานในหน้าอื่นๆ */
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];

                /** หลังจากนั้น redirect ไปยังหน้า HOME PAGE */
                header('location:index.html');
            } else {
                echo '<script> alert("รหัสผ่านไม่ถูกต้อง") </script>';
                header('Refresh:0; url=login.php');
            }
        }else{
            /**
             * แสดงข้อความเมื่อใส่ข้อมูลผิดพลาด
             * สั่ง Refresh หน้าเว็บเพื่อไม่ให้เกิดอาการ Confirm Form Resubmission
             */
            echo '<script> alert("ไม่สามารถเข้าสู่ระบบได้โปรดกรอกข้อมูลใหม่อีกครั้ง")</script>';
            header("Refresh:0");
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" >
    <title>เข้าสู่ระบบ</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt" >
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <div class="card border-0 shadow">
                        <!-- action ด้วยค่าว่าง "" คือการส่ง Form นี้เข้าสู่หน้าปัจจุบัน -->
                        <!-- method POST คือการส่ง Form ให้อยู่ในรูปของ POST เพื่อส่งข้อมูล Form ในพื้นหลังการทำงาน -->
                        <form action="" method="POST">
                            <h4 class="card-header text-center">เข้าสู่ระบบ</h4>
                            <div class="card-body px-4">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <label for="username" class="col-form-label">ชื่อผู้ใช้งาน:</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="col-form-label">รหัสผ่าน:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                    </div>
                                    <div class="col-12 text-center py-3">
                                        <input type="submit" name="submit" class="btn btn-primary d-grid mx-auto w-75" value="เข้าสู่ระบบ">
                                        <a href="register.php">สมัครสมาชิก</a>
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