<?php  require_once 'member-header.php' ?>
    
    <link rel="stylesheet" href="./member-order.css">
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
    $count_orders = 0;
    $sql = "SELECT * 
                        FROM `orders`
                        WHERE `email` = '{$_SESSION['email']}'
                        ORDER BY `created_at` DESC, `id` DESC ";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        $count_orders = $stmt->rowCount();
    ?>

        <div class="page-input">
            <h3>共<?= $count_orders ?>筆 每頁顯示10筆</h3>
            <div class="page-input-item">
                第<input type="text" id="page-input" value="1" />頁
            </div>
        </div>

        <?php
        $arr = $stmt->fetchAll();
        foreach ($arr as $obj) {

            $obj['paid'] = true;

            $paid = ($obj['paid']) ? '已付款' : '尚未付款';
            // $total_m = $obj['total'];

            $sql1 = "SELECT * 
                        FROM `orders_detail`
                        WHERE `order_id` = '{$obj['order_id']}' AND `func_name` = '0' ";
            $stmt1 =  $pdo->query($sql1);
            $arr1 = $stmt1->fetchAll();

            $sql2 = "SELECT * 
                        FROM `orders_detail`
                        WHERE `order_id` = '{$obj['order_id']}' AND `func_name` = '21' ";
            $stmt2 =  $pdo->query($sql2);
            $arr2 = $stmt2->fetchAll();

            $sql3 = "SELECT * 
                        FROM `orders_detail`
                        WHERE `order_id` = '{$obj['order_id']}' AND `func_name` = '17' ";
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
        ?>

            <div class="order-box">
                <div class="order-top">
                    <div class="order-left">
                        <span>訂單編號:<?= $obj['order_id'] ?><br><?= $countTrip . " " . $countGoods . " " . $countRent ?></span>
                    </div>
                    <div class="order-right">
                        <span><?= $paid ?></span>
                        <h3>TWD <?= number_format($obj['total']) ?></h3>
                    </div>
                </div>

                <?php
                if ($stmt1->rowCount() > 0) {
                    foreach ($arr1 as $obj1) {
                ?>

                        <a href="" class="order-main">
                            <div class="order-title">
                                <div class="img"><img src="./images/<?= $obj1['prod_main_img'] ?>"></div>
                                <p><?= $obj1['prod_name'] ?></p>
                            </div>
                            <div class="order-cols">
                                <div class="order-col">
                                    <img src="./SVG/member-system/calender.svg" alt="">
                                    <p><?= $obj1['travel_day'] ?></p>
                                </div>
                                <div class="order-col">
                                    <p>TWD <?= number_format($obj1['subtotal']) ?></p>
                                </div>
                            </div>
                        </a>

                    <?php
                    }
                }
                if ($stmt2->rowCount() > 0) {
                    foreach ($arr2 as $obj2) {
                    ?>

                        <a href="" class="order-main">
                            <div class="order-title">
                                <div class="img"><img src="./images/<?= $obj2['prod_main_img'] ?>"></div>
                                <p><?= $obj2['prod_name'] ?></p>
                            </div>
                            <div class="order-cols">
                                <div class="order-col">
                                    <p><?= $obj2['prod_qty'] ?>件</p>
                                </div>
                                <div class="order-col">
                                    <p>TWD <?= number_format($obj2['subtotal']) ?></p>
                                </div>
                            </div>
                        </a>

                    <?php
                    }
                }
                if ($stmt3->rowCount() > 0) {
                    foreach ($arr3 as $obj3) {
                    ?>

                        <a href="" class="order-main">
                            <div class="order-title">
                                <div class="img"><img src="./images/<?= $obj3['prod_main_img'] ?>"></div>
                                <p><?= $obj3['prod_name'] ?></p>
                            </div>
                            <div class="order-cols">
                                <div class="order-col">
                                    <p><?= $obj3['prod_qty'] ?>件</p>
                                </div>
                                <div class="order-col">
                                    <p>TWD <?= number_format($obj3['subtotal']) ?></p>
                                </div>
                            </div>
                        </a>

                <?php
                    }
                }
                ?>


                <div class="order-button">
                    <a href="./member-order-detail.php?email=<?= $_SESSION['email'] ?>&order_id=<?= $obj['order_id'] ?>"><button class="btn-green" value="">查看訂單</button></a>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <p>尚未有訂單紀錄</p>
    <?php
    }
    ?>

    <div class="pagination">
        <div class="page-group">
            <a class="prev-page disable" href=""></a>
            <a class="page-item nowpage" href="">1</a>
            <a class="next-page disable" href=""></a>
        </div>
    </div>
</div>
</div>
<footer></footer>
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/member-system.js"></script>
</body>

</html>