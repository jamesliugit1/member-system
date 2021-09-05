<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
if (!isset($_SESSION['email']) || !isset($_GET['order_id']) || !isset($_GET['prod_id']) || $_GET['email'] !== $_SESSION['email']) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./reset.css" />
    <link rel="stylesheet" href="./template.css" />
    <link rel="stylesheet" href="./nav-footer.css" />
    <link rel="stylesheet" href="./member-order.css" />
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
            <h2>我的租借</h2>
            <div class="order-box">
                <div class="order-top rent">
                    <div class="order-left">
                        <h3>租借</h3>
                    </div>
                    <div class="order-right">
                    </div>
                </div>

                <?php
                $sql = "SELECT * FROM `orders_detail`
                  WHERE `order_id` = '{$_GET['order_id']}' AND `prod_id` = '{$_GET['prod_id']}'";
                $arr = $pdo->query($sql)->fetch();
                $sql1 = "SELECT * FROM `orders`
                  WHERE `order_id` = '{$_GET['order_id']}'";
                $arr1 = $pdo->query($sql1)->fetch();
                ?>

                <a href="" class="order-main sp">
                    <div class="order-title">
                        <div class="img"><img src="./images/<?= $arr['prod_main_img'] ?>"></div>
                        <p>
                            <?= $arr['prod_name'] ?>
                            <span>商品ID: <?= $arr['prod_id'] ?></span>
                        </p>
                    </div>
                    <div class="order-cols">
                        <div class="order-col">
                            <p><?= $arr['prod_qty'] ?>件</p>
                        </div>
                        <div class="order-col">
                            <img src="./SVG/member-system/time.svg" alt="" />
                            <p>~<?= $arr['rental_day'] ?></p>
                        </div>
                        <div class="order-col">
                            <strong>配送中</strong>
                        </div>
                    </div>
                </a>
                <div class="order-detail rent">
                    <article class="rate0">
                        <h3>配送狀態</h3>
                        <div class="qr">
                            <img src="./SVG/member-system/traking.svg" alt="" />
                            <div class="tracking-overall">
                                <p>配送中</p>
                                <p>使用中</p>
                                <p>已歸還</p>
                            </div>
                        </div>
                        <div class="qr rb">
                            <button class="btn-yellow">點我評價</button>
                            <span>收到商品後即可評價</span>
                        </div>
                        <h3>收件人資料</h3>
                        <table>
                            <tr>
                                <td>姓名</td>
                                <td><?= $arr1['recipient_last_name'].$arr1['recipient_first_name'] ?></td>
                            </tr>
                            <tr>
                                <td>配送地址</td>
                                <td><?= $arr1['recipient_address'] ?></td>
                            </tr>
                            <tr>
                                <td>連絡電話</td>
                                <td><?= $arr1['recipient_phone_number'] ?></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?= $arr1['recipient_email'] ?></td>
                            </tr>
                        </table>

                        <?php

                        ?>

                        <h3>退換貨說明</h3>
                        <p>
                            依照消費者保護法規定，消費者享有商品到貨7天鑑賞期（包含例假日)之權益，七日鑑賞期屬『考慮期』並非『試用期』，若商品如經拆
                            封、使用、以致缺乏完整性即失去再販售價值時，恕無法退貨。<br />
                            超過7天鑑賞期　<br />
                            商品明細不全、吊牌已剪或弄丟發票(電子發票則免)
                            *若您有索取紙本或公司戶紙本發票,請於退貨時一併寄回*<br />
                            商品有明顯使用/洗過痕跡、損壞或人為造成髒污、沾染粉妝、毀損、異味
                            *收到商品試穿時請注意臉上妝容並先保留吊牌,確認OK後再剪標*<br />
                        </p>
                    </article>
                    <article class="rate1">
                        <form action="" class="rate">
                            <h3>點一下評分
                                <div class="order-col rate-star" data-rate="">
                                    <img src="./SVG/member-system/star-gray.svg" alt="">
                                    <img src="./SVG/member-system/star-gray.svg" alt="">
                                    <img src="./SVG/member-system/star-gray.svg" alt="">
                                    <img src="./SVG/member-system/star-gray.svg" alt="">
                                    <img src="./SVG/member-system/star-gray.svg" alt="">
                                </div>
                            </h3>
                            <h3>分享照片</h3>
                            <div class="order-col upload">
                                <div><input type="file"></div>
                                <div><input type="file"></div>
                                <div><input type="file"></div>
                                <div><input type="file"></div>
                                <div><input type="file"></div>
                                <div><input type="file"></div>
                            </div>
                            <h3>評論（可留空）</h3>
                            <textarea cols="30" rows="10"></textarea>
                            <div class="order-button">
                                <button class="btn-green" value="">送出</button>
                                <button class="btn-black" value="">取消</button>
                            </div>
                        </form>
                    </article>
                    <article class="rate2">
                        <div class="submit-success">
                            <h2>
                                <img src="./SVG/member-system/correct.svg" alt="" />完成評價!
                            </h2>
                            <strong>恭喜您得到10點！</strong>
                            <div class="success-btn">
                                <button class="btn-green">確定</button>
                                <a href="./member-point.php"><button class="btn-yellow">查看積點</button></a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
</body>

</html>