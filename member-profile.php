<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.metro.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.metro.mobile.min.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <style>
        input[type="checkbox"] {
            display: inline-block;
        }
        .title4_lty {
            font-size: 26px;
            font-weight: 600;
        }

        .link2_lty a {
            height: 60px;
            width: 160px;
            color: white;
            background-color: #00A878;
            text-align: center;
            line-height: 60px;
            border-radius: 3px;
            box-shadow: 3px 3px #cececea2;
            font-weight: 700;
        }

        .link3_lty a {
            height: 60px;
            width: 160px;
            color: white;
            background-color: #5E6472;
            text-align: center;
            line-height: 60px;
            border-radius: 3px;
            box-shadow: 3px 3px #cececea2;
            font-weight: 700;
        }

        .change_password_lty .link2_lty a {
            margin: 0 auto;
        }

        .link2_lty a:hover, .link3_lty a:hover {
            text-decoration: none;
            opacity: .7;
        }

        .type1_lty {
            font-size: 18px;
            line-height: 26px;

        }

        .password_create_lty {
            display: block;
            margin: 1rem;
        }

        @media (max-width:880px) {
            .type1_lty {
                margin-bottom: 0rem;

            }

            .link2_lty a {

                float: none;
                margin: 1rem auto;

            }

            .link3_lty a {

                float: none;

                margin: 1rem auto;
            }

            .title4_lty {
                text-align: center;

            }

            .password_create_lty {
                display: block;
                margin: 1rem auto;
            }
        }
    </style>


</head>

<body>
    
    <?php
    $sqlUser = "SELECT *
    FROM `users`
    WHERE `email` = '{$_SESSION['email']}'";
    $arrUser = $pdo->query($sqlUser)->fetch();
    ?>
    
    <?php require_once 'header.php' ?>

    <div class="member-body">

        <?php require_once 'member-menu.php' ?>

        <div class="member-container d-xl-flex d-block">
            <div class="col-xl-3 col-12 title4_lty">
                會員資訊
            </div>

            
            <div class="col-xl-9  col-12">
                <div class="username_lty d-xl-flex d-block">
                    <div class="userLastname_lty col-xl-6">
                        <span class="type1_lty mb-xl-1">姓</span>
                        <input type="lastname" placeholder="Last Name" value="<?= $arrUser['last_name'] ?>">
                    </div>
                    <div class="userfirstname_lty col-xl-6">
                        <span class="type1_lty mb-xl-1">名</span>
                        <input type="firstname" placeholder="First Name" value="<?= $arrUser['first_name'] ?>">
                    </div>
                </div>
                <div class="gender_birth d-xl-flex d-block">
                    <div class="gender_lty mt-xl-5 col-xl-6">
                    <span class="type1_lty mb-xl-1">性別</span>
                    <div class="select-group">
                  <div class="select" ><?= $arrUser['gender'] ?></div>
                  <div class="option-wrap gender">
                    <ul class="option">
                      <li>男</li>
                      <li>女</li>
                    </ul>
                  </div>
                </div>
                    </div>
                    <div class="birth_lty mt-xl-5 col-xl-6">
                        <span class="type1_lty mb-xl-1">生日</span>
                        <input type="bith" id="birthdate" placeholder="birthdate" value="<?= $arrUser['birthdate'] ?>">
                    </div>
                </div>

                <div class="emailphone_lty d-xl-flex d-block">
                    <div class="phone_lty col-xl-6 mt-xl-5">
                        <span class="type1_lty mb-xl-1">電話</span>
                        <input type="phone" placeholder="Phone Number" value="<?= $arrUser['phone_number'] ?>">
                    </div>
                    <div class="email_lty col-xl-6 mt-xl-5">
                        <span class="type1_lty mb-xl-1">email</span>
                        <input type="email" placeholder="Email" value="<?= $arrUser['email'] ?>" disabled>
                    </div>
                </div>

                <div class="checkboxaddress_lty d-xl-flex d-block  ">
                    <div class="address_lty col-xl-6 mt-xl-5">
                        <span class="type1_lty mb-xl-1">地址</span>
                        <input type="address" style="width: 100%;" placeholder="Address" value="<?= $arrUser['address'] ?>">
                    </div>
                    <div class="checkbox_lty col-xl-6 mt-xl-5">
                        <span class="type1_lty mb-xl-1"><input type="checkbox" id="eq1" class="k-checkbox"
                                checked="checked">
                            訂閱電子報</span>
                        <span class="type1_lty"><input type="checkbox" id="eq1" class="k-checkbox" checked="checked">
                            emial優惠通知</span>
                    </div>
                </div>

                <div class="submit_lty d-xl-flex b-block">

                    <div class="col-xl-6 mt-xl-5 change_password_lty ">
                        <div class="link2_lty">
                            <a href="">修改密碼</a>
                        </div>

                    </div>

                    <div class="col-xl-6 mt-xl-5 d-xl-flex">
                        <div class="link3_lty ">
                            <a href="" data-last-name="<?= $arrUser['last_name'] ?>" data-first-name="<?= $arrUser['first_name'] ?>" data-gender="<?= $arrUser['gender'] ?>" data-birthdate="<?= $arrUser['birthdate'] ?>" data-phone="<?= $arrUser['phone_number'] ?>" data-address="<?= $arrUser['address'] ?>">復原</a>
                        </div>
                        <div class="link2_lty ml-xl-2">
                            <a href="">儲存</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="./js/member-system.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="https://kendo.cdn.telerik.com/2021.2.616/js/kendo.all.min.js"></script>
    <script>
        //選擇生日
        $("input#birthdate").datepicker({
            dateFormat: "yy-mm-dd",
        });
    </script>

</body>

</html>