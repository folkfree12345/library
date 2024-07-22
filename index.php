<?php 
/**
 **** AppzStory Free Code ****
 * PHP Basic Login MySQLi
 * 
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 */

 require_once 'php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" >
    <title>Home Page</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt" >
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AppzStory Studio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <!-- ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_SESSION['id'] ได้ถูกกำหนดขึ้นมาหรือไม่ -->
                    <?php if (isset($_SESSION['id'])) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ยินดีต้อนรับ คุณ <?php echo $_SESSION['first_name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="php/logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <?php } else {?>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="login.php">เข้าสู่ระบบ</a>
                        <a class="btn btn-warning" href="register.php">สมัครสมาชิก</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- carousel สไลด์ภาพ -->
    <section id="carouselExampleIndicators" class="container carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/images/appzstory.png" alt="Image">
                <div class="carousel-caption d-block">
                    <a href="https://appzstory.dev" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://appzstory.dev/_nuxt/img/sclass1.abd0c97.jpg" alt="Image">
                <div class="carousel-caption d-block">
                    <a href="https://appzstory.dev/c/sclass1-full-courses_0-100/" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://appzstory.dev/_nuxt/img/sclass2.b99e196.jpg" alt="Image">
                <div class="carousel-caption d-block">
                    <a href="https://appzstory.dev/c/sclass2-weblog-vuejs-php/" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://appzstory.dev/_nuxt/img/main.a1b2c33.jpg" alt="Image">
                <div class="carousel-caption d-block">
                    <a href="https://appzstory.dev/script/bos-template-admin/" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://appzstory.dev/_nuxt/img/basic-rest-api.a986d56.jpg" alt="Image">
                <div class="carousel-caption d-block">
                    <a href="https://www.youtube.com/watch?v=SyoQVokfrnU&list=PLqJ2z9Opzq8JF0fBj4e6KKdYoOZSZNrD9&index=2" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://appzstory.dev/_nuxt/img/main2.622c103.png" alt="Image">
                <div class="carousel-caption d-block">
                    <a href="https://appzstory.dev/c/basic1-php-ajax-basic-report/" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <!-- Section Header -->
    <section class="py-5 bg-white text-center">
        <div class="container">
            <h2 class="fw-bold">AppzStory Studio</h2>
            <p class="lead text-muted">
                ช่วยเหลือ แก้ปัญหา ให้ความรู้ การเขียนเว็บไซต์
            </p>
            <p class="lead text-muted">
                ต้องการสอนให้นักเรียนทุกคนสามารถสร้างเว็บไซต์ขึ้นมาได้ด้วยตัวเอง  และเรียนรู้องค์ประกอบทุกอย่างที่จำเป็นต่อการเริ่มเขียนเว็บไซต์<br>
                เพื่อให้สามารถ ประกอบอาชีพ, เข้าสมัครงาน, ทำโปรเจคจบ, หรือทำโปรเจคที่ตัวเองคาดหวังไว้ ให้สำเร็จ
            </p>
        </div>
    </section>

    <pre><?php echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?></pre>

    <!-- Content เนื้อหา -->
    <section class="container mb-5">
        <div class="row g-3">
            <?php if(isset($_SESSION['id'])): ?>
            <div class="col-12 text-center py-3">
                <h3>ยินดีต้อนรับคุณ <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></h3>
                <p>เข้าสู่เนื้อหาฝึกฝนการเขียนเว็บไซต์</p>
            </div>
            <?php endif ?>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <img src="assets/images/appzstory.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-tex"> ช่วยเหลือ แก้ปัญหา ให้ความรู้</b> การเขียนเว็บไซต์  ให้สามารถสร้างเว็บไซต์ขึ้นมาด้วยตัวเอง  และเรียนรู้องค์ประกอบ ทุกอย่างที่จำเป็นต่อการเริ่มสร้างเว็บไซต์ขึ้นมา</p>
                    </div>
                    <div class="card-footer bg-white border-0 d-grid">
                        <a href="https://www.facebook.com/WebAppzStory/" target="_blank" class="btn btn-primary">Facebook AppzStory</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <img src="https://appzstory.dev/_nuxt/img/basic-rest-api.a986d56.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"> <b> PHP PDO REST API </b> สอนเขียนเว็บไซต์ในรูปแบบของ Web Servie API และใช้ Vuejs เป็นส่วนของหน้าบ้านในการแสดงผล</p>
                    </div>
                    <div class="card-footer bg-white border-0 d-grid">
                        <a href="https://bit.ly/youtube_appzstory" target="_blank" class="btn btn-danger">Youtube AppzStory</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <img src="https://appzstory.dev/_nuxt/img/login-admin.a301a6a.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"> 
                            <b> สอนทำระบบ Login Admin ระบบจัดการหลังบ้าน </b> 
                            สอนเขียนโค้ด้วย jQuery Ajax + PHP REST API สำหรับทำระบบ Login แบบใช้งานจริง!
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 d-grid">
                        <a href="https://appzstory.dev/" target="_blank" class="btn btn-success">Website AppzStory</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="card bg-secondary text-white text-center p-3">
        <a href="https://line.me/R/ti/p/%40xes6269f"><img height="36" alt="เพิ่มเพื่อน" src="https://scdn.line-apps.com/n/line_add_friends/btn/en.png"></a>
        <span> COPYRIGHT © 2021
            <a class="text-white" href="https://www.facebook.com/WebAppzStory" target="_blank">AppzStory Studio</a>
            ALL Right Reserved
        </span>
    </footer>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>