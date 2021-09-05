<?php  require_once 'member-header.php' ?>

    <link rel="stylesheet" href="./member-point.css">
    <link rel="stylesheet" href="./member-achieve.css">
    <style>
        .member-container > h2 {
            color: #707070;
            margin-bottom: 36px;
        }
        .point-detail-box h2 {
            padding-left: 0;
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

        <div class="member-container">  
            <h2>我的成就</h2>      
            
            <?php
            $ach_id = $_GET['ach_id'];

            $sql1 = "SELECT * FROM `reward` WHERE `ach_id` = '{$ach_id}'";
            $arr1 = $pdo->query($sql1)->fetch();

            ?>
            <div class="point-detail-box">
                <div class="img"><img src="./images/<?= $arr1['prod_main_img'] ?>" alt=""></div>
                <article>
                    <h2><?= $arr1['prod_name'] ?></h2>
                    <h3 class="mypoint"><img src="./SVG/member-system/trophy.svg" alt="">完成<?= $arr1['achieve'] ?>即可兌換</h3>
                    <p><?= $arr1['prod_description'] ?></p>
                </article>  
                <article class="ex0">
                    <h3>商品詳情</h3>
                    <p><?= $arr1['prod_description2'] ?></p>
                    <h3>注意事項</h3>
                    <p>
                        1.本商品為僅為活動贈品，不可要求兌換現金。<br />
                        2.本商品圖片僅供參考，實際商品顏色及尺寸以實物為準<br />
                        3.折扣碼為商品優惠，僅做折價使用，需依一般商品結帳流程完成交易。<br />
                        4.寶島旅人瘋保有對優惠商品更改、終止的權利。<br />
                        
                    </p>
            <?php
            if ($arrUser[$ach_id] == "") {
            ?>
                    <div class="point-btn">
                        <p class="mypoint"><img src="./SVG/member-system/trophy.svg" alt="">完成<?= $arr1['achieve'] ?>即可兌換</p> 
                        <a href="./member-ahieve.php"><button class="btn-black">回上一頁</button></a>
                    </div> 

            <?php
            } else if ($arrUser[$ach_id] == "completed") {
            ?>

                    <div class="point-btn">
                        <p class="mypoint"><img src="./SVG/member-system/trophy.svg" alt="">您已完成!</p> 
                        <button class="btn-green">領取</button>
                        <a href="./member-ahieve.php"><button class="btn-black">回上一頁</button></a>
                    </div> 
            <?php
            } else if ($arrUser[$ach_id] == "completed recieved") {
            ?>


                    <div class="point-btn">
                        <p class="mypoint"><img src="./SVG/member-system/trophy.svg" alt="">您已領取!</p> 
                        <a href="./member-ahieve.php"><button class="btn-black">回上一頁</button></a>
                    </div> 

            <?php
            }
            ?>
                  </article>
                  <article class="ex1">
                    <h2>請填寫收件人資訊</h2>
                    <form id="exchange-form">
                      <div class="exchange-input">
                        <div>
                          <input type="checkbox" id="same" data-name="<?= $arrUser['last_name'].$arrUser['first_name'] ?>" data-phone="<?= $arrUser['phone_number'] ?>" data-email="<?= $arrUser['email'] ?>" data-address="<?= $arrUser['address'] ?>"/>
                          <label for="same"><i class="checkbox"></i>同會員資料</label>
                          <label for="name">姓名</label>
                          <input type="text" placeholder="Fullname" id="name" />
                          <label for="">電話號碼</label>
                          <input type="text" placeholder="Phone number" id="phone" />
                        </div>
                        <div>
                          <label for="">E-mail</label>
                          <input
                            type="text"
                            placeholder="formosa123@gmail.com"
                            class="input-long"
                            id="email"
                          />
                          <label for="">地址</label>
                          <input
                            type="text"
                            placeholder="Address"
                            class="input-long"
                            id="address"
                          />
                        </div>
                      </div>
                      <div class="point-btn">
                        <button class="btn-green" prod-id="<?= $arr1['ach_id'] ?>" id="ach-exchange">確定</button>
                        <button class="btn-black">取消</button>
                      </div>
                    </form>
                  </article>
                  <article class="ex2">
                    <div class="submit-success">
                      <h2>
                        <img src="./SVG/member-system/correct.svg" alt="" />兌換成功!
                      </h2>
                      <strong>商品已新增至您的訂單中，請確認</strong>
                      <div class="success-btn">
                        <a href="./member-ahieve.php"><button class="btn-green">確定</button></a>
                      </div>
                    </div>
                  </article>                                    
            </div> 
            
            <?php
            
            ?>

        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
</body>
</html>