<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
if (!isset($_SESSION['email']) || $_GET['email'] !== $_SESSION['email']) {
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
            <h2>訂單紀錄</h2>

            <?php
            $sql = "SELECT * 
        FROM `orders_detail`
        WHERE `order_id` = '{$_GET['order_id']}'";
            $stmt = $pdo->query($sql);
            $arr = $stmt->fetchAll();

            $sql1 = "SELECT * 
        FROM `orders_detail`
        WHERE `order_id` = '{$_GET['order_id']}' AND `func_name` = '0' ";
            $stmt1 =  $pdo->query($sql1);
            $arr1 = $stmt1->fetchAll();

            $sql2 = "SELECT * 
        FROM `orders_detail`
        WHERE `order_id` = '{$_GET['order_id']}' AND `func_name` = '21' ";
            $stmt2 =  $pdo->query($sql2);
            $arr2 = $stmt2->fetchAll();

            $sql3 = "SELECT * 
        FROM `orders_detail`
        WHERE `order_id` = '{$_GET['order_id']}' AND `func_name` = '17' ";
            $stmt3 =  $pdo->query($sql3);
            $arr3 = $stmt3->fetchAll();

            $countTrip = "";
            $countGoods = "";
            $countRent = "";
            if ($stmt1->rowCount() > 0) {
                $countTrip = $stmt1->rowCount() . '個行程';
            }
            if ($stmt2->rowCount() > 0) {
                $countGoods = $stmt2->rowCount() . '個商品';
            }
            if ($stmt3->rowCount() > 0) {
                $countRent = $stmt3->rowCount() . '個租借';
            }

            $sql0 = "SELECT * 
        FROM `orders`
        WHERE `order_id` = '{$_GET['order_id']}'";
            $arr0 = $pdo->query($sql0)->fetch();

            $arr0['paid'] = true;

            $paid = ($arr0['paid']) ? 'paid' : 'not-paid';
            ?>

            <div class="detail-title">
                <span>訂單編號:<?= $_GET['order_id'] ?><br /><?= $countTrip . " " . $countGoods . " " . $countRent ?></span>
                <img class="paid-icon" src="./SVG/member-system/<?= $paid ?>.svg" alt="" />
            </div>

            <?php
            if ($stmt1->rowCount() > 0) {
                foreach ($arr1 as $obj1) {
            ?>

                    <div class="order-box">
                        <div class="order-top">
                            <div class="order-left">
                                <h3>行程</h3>
                            </div>
                            <div class="order-right">
                                <img src="./SVG/member-system/greenarrow.svg" alt="" />
                            </div>
                        </div>
                        <a href="" class="order-main sp">
                            <div class="order-title">
                                <div class="img"><img src="./images/<?= $obj1['prod_main_img'] ?>" /></div>
                                <p>
                                    <?= $obj1['prod_name'] ?>
                                    <span>商品ID: <?= $obj1['prod_id'] ?></span>
                                </p>
                            </div>
                            <div class="order-cols">
                                <div class="order-col">
                                    <img src="./SVG/member-system/person.svg" alt="" />
                                    <p><?= $obj1['prod_qty'] ?>人</p>
                                </div>
                                <div class="order-col">
                                    <img src="./SVG/member-system/calender.svg" alt="" />
                                    <p><?= $obj1['travel_day'] ?></p>
                                </div>
                                <div class="order-col">
                                    <strong>TWD <?= number_format($obj1['subtotal']) ?></strong>
                                </div>
                            </div>
                        </a>
                        <div class="order-detail">
                            <article class="rate0">
                                <div class="qr-article">
                                    <div class="qr">
                                        <img src="./images/qr.png" alt="" id="qrCode" />
                                        <span>出發時請使用此QRcode<br />或出示此頁面&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<ins>?說明</ins></span>
                                        <button class="btn-yellow">點我評價</button>
                                        <span>待行程完成後即可評價</span>
                                    </div>
                                    <p><?= $obj1['prod_description'] ?></p>
                                </div>
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

                <?php
                }
            }
            if ($stmt2->rowCount() > 0) {
                ?>

                <div class="order-box">
                    <div class="order-top">
                        <div class="order-left">
                            <h3>商品</h3>
                        </div>
                        <div class="order-right">
                            <img src="./SVG/member-system/greenarrow.svg" alt="" />
                        </div>
                    </div>

                <?php
            }
            foreach ($arr2 as $obj2) {
                ?>

                    <a href="" class="order-main sp">
                        <div class="order-title">
                            <div class="img"><img src="./images/<?= $obj2['prod_main_img'] ?>" /></div>
                            <p>
                                <?= $obj2['prod_name'] ?>
                                <span>商品ID: <?= $obj2['prod_id'] ?></span>
                            </p>
                        </div>
                        <div class="order-cols">
                            <div class="order-col">
                                <p><?= $obj2['prod_qty'] ?>件</p>
                            </div>
                            <div class="order-col">
                                <strong>TWD <?= number_format($obj2['subtotal']) ?></strong>
                            </div>
                        </div>
                    </a>

                <?php
            }
            if ($stmt2->rowCount() > 0) {
                ?>

                    <div class="order-detail">
                        <article class="rate0">
                            <h3>配送狀態</h3>
                            <div class="qr">
                                <img src="./SVG/member-system/traking.svg" alt="" class="tracking" />
                                <div class="tracking-overall">
                                    <p>已收到訂單</p>
                                    <p>貨物配送中</p>
                                    <p>商品已送達</p>
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
                                    <td><?= $arr0['recipient_last_name'].$arr0['recipient_first_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>運送方式</td>
                                    <td>宅配</td>
                                </tr>
                                <tr>
                                    <td>配送地址</td>
                                    <td><?= $arr0['recipient_address'] ?></td>
                                </tr>
                                <tr>
                                    <td>連絡電話</td>
                                    <td><?= $arr0['recipient_phone_number'] ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><?= $arr0['recipient_email'] ?></td>
                                </tr>
                            </table>
                            <h3>退換貨說明</h3>
                            <p>
                                依照消費者保護法規定，消費者享有商品到貨7天鑑賞期（包含例假日)之權益，七日鑑賞期屬『考慮期』並非『試用期』，若商品如經拆
                                封、使用、以致缺乏完整性即失去再販售價值時，恕無法退貨。<br />
                                超過7天鑑賞期　<br /><br />
                                商品明細不全、吊牌已剪或弄丟發票(電子發票則免)
                                *若您有索取紙本或公司戶紙本發票,請於退貨時一併寄回*<br />
                                商品有明顯使用/洗過痕跡、損壞或人為造成髒污、沾染粉妝、毀損、異味
                                *收到商品試穿時請注意臉上妝容並先保留吊牌,確認OK後再剪標*<br />
                            </p>
                        </article>
                        <article class="rate1">
                            <form action="" class="rate">
                                <h3>選擇評論項目</h3>
                                <?php
                                foreach ($arr2 as $key => $obj2) {
                                ?>

                                    <input type="radio" id="goods<?= $key ?>" name="rate-goods" checked>
                                    <label for="goods<?= $key ?>" class="rate-goods">
                                        <p><?= $obj2['prod_name'] ?></p>
                                    </label>

                                <?php
                                }
                                ?>

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

            <?php
            }
            if ($stmt3->rowCount() > 0) {
            ?>

                <div class="order-box">
                    <div class="order-top">
                        <div class="order-left">
                            <h3>租借</h3>
                        </div>
                        <div class="order-right">
                        </div>
                    </div>
                <?php
            }
            foreach ($arr3 as $obj3) {
                ?>
                    <a href="" class="order-main mr">
                        <div class="order-title">
                            <div class="img"><img src="./images/<?= $obj3['prod_main_img'] ?>" /></div>
                            <p>
                                <?= $obj3['prod_name'] ?>
                                <span>商品ID: <?= $obj3['prod_id'] ?></span>
                            </p>
                        </div>
                        <div class="order-cols">
                            <div class="order-col">
                                <p><?= $obj3['prod_qty'] ?>件</p>
                            </div>
                            <div class="order-col">
                                <strong>TWD <?= number_format($obj3['subtotal']) ?></strong>
                            </div>
                        </div>
                    </a>
                    <div class="order-button mr">
                        <a href="./member-rent-detail.php?email=<?= $_SESSION['email'] ?>&order_id=<?= $arr0['order_id'] ?>&prod_id=<?= $obj3['prod_id'] ?>"><button class="btn-green" value="">查看我的租借</button></a>
                    </div>

                <?php
            }
            if ($stmt3->rowCount() > 0) {
                ?>

                </div>

            <?php
            }
            $paid1 = ($arr0['paid']) ? "已付款 ({$arr0['updated_at']})" : '尚未付款';
            ?>

            <div class="order-box">
                <div class="order-top">
                    <div class="order-left">
                        <h3>訂單資訊</h3>
                    </div>
                </div>
                <article>
                    <table>
                        <tr>
                            <td>訂單編號</td>
                            <td><?= $_GET['order_id'] ?></td>
                        </tr>
                        <tr>
                            <td>訂單時間</td>
                            <td><?= $arr0['created_at'] ?></td>
                        </tr>
                        <tr>
                            <td>姓名</td>
                            <td><?= $arr0['recipient_last_name'].$arr0['recipient_first_name'] ?></td>
                        </tr>
                        <tr>
                            <td>電話號碼</td>
                            <td><?= $arr0['recipient_phone_number'] ?></td>
                        </tr>
                        <tr>
                            <td>E-Mail</td>
                            <td><?= $arr0['recipient_email'] ?></td>
                        </tr>
                        <tr>
                            <td>商品小計</td>
                            <td>TWD <?= $arr0['total'] ?></td>
                        </tr>
                        <tr>
                            <td>使用優惠卷</td>
                            <td><?= $arr0['coupon_code'] ?></td>
                        </tr>
                        <tr>
                            <td>付款金額</td>
                            <td><strong>TWD <?= $arr0['total'] ?></strong></td>
                        </tr>
                    </table>
                </article>
            </div>
            <div class="order-box">
                <div class="order-top">
                    <div class="order-left">
                        <h3>付款資訊</h3>
                    </div>
                </div>
                <article class="reply0">
                    <table>
                        <tr>
                            <td>付款方式</td>
                            <td><?= $arr0['transport_payment'] ?></td>
                        </tr>
                        <?php
                        if ($arr0['transport_payment'] == "ATM轉帳") {
                        ?>

                            <tr>
                                <td>轉帳帳號</td>
                                <td>0123372045834356572</td>
                            </tr>

                        <?php
                        }
                        if ($arr0['total'] !== 0) {
                        ?>
                            <tr>
                                <td>付款狀態</td>
                                <td><?= $paid1 ?></td>
                            </tr>
                            <tr>
                                <td>交易序號</td>
                                <td>000000000001</td>
                            </tr>
                            <tr>
                                <td>發票號碼</td>
                                <td>HA0000000001(應稅)</td>
                            </tr>
                            <tr>
                                <td>發票狀態</td>
                                <td>開立完成</td>
                            </tr>
                            <tr>
                                <td>發票載具</td>
                                <td><?= $arr0['invoice_carrier'] ?></td>
                            </tr>
                            <tr>
                                <td>發票載具編號</td>
                                <td><?= $arr0['invoice_carrier_number'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </article>

                <?php
                if (!$arr0['paid']) {
                ?>

                    <div class="order-button">
                        <button class="btn-green" value="" id="reply">回覆繳款</button>
                    </div>

                <?php
                }
                ?>

                <article class="reply1">
                    <form action="" class="reply-paid">
                        <div>
                            <h3>請輸入銀行帳號</h3>
                            <div class="input-bank">
                                <div class="select-group">
                                    <div class="select">銀行代碼</div>
                                    <div class="option-wrap">
                                        <ul class="option">
                                            <li>222</li>
                                            <li>333</li>
                                            <li>444</li>
                                            <li>555</li>
                                            <li>666</li>
                                            <li>777</li>
                                        </ul>
                                    </div>
                                </div>
                                <input type="text" placeholder="銀行帳號" />
                            </div>
                        </div>
                        <div class="reply-btn">
                            <button class="btn-green">確定</button>
                            <button class="btn-black">取消</button>
                        </div>
                    </form>
                </article>
                <article class="reply2">
                    <div class="submit-success">
                        <h2>
                            <img src="./SVG/member-system/correct.svg" alt="" />送出成功!
                        </h2>
                        <strong>需要2~3天的時間為您確認，請耐心等候</strong>
                        <div class="success-btn">
                            <button class="btn-green">確定</button>
                        </div>
                    </div>
                </article>
            </div>
            <div class="order-button">
                <button class="btn-yellow" value="">取消訂單</button>
                <span></span>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
</body>

</html>