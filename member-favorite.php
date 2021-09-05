<?php require_once 'member-header.php' ?>

<link rel="stylesheet" href="./member-order.css" />
<link rel="stylesheet" href="./member-favorite.css" />
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
            <h2>我的收藏</h2>

            <?php
            $sql = "SELECT * FROM `products_follow` INNER JOIN `product`
        ON `products_follow`.`prod_id` = `product`.`id`
        WHERE `email` = '{$_SESSION['email']}'
        ORDER BY `products_follow`.`created_at` DESC";
            $stmt = $pdo->query($sql);
            $arr = $stmt->fetchAll();
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
            }
            ?>

            <div class="favorite-row">
                <input type="checkbox" id="select-all" />
                <label for="select-all"><i class="checkbox checkbox1"></i><strong>全選</strong></label>
                <strong class="favorite-delete" delete-fa="">
                    <img src="./SVG/member-system/trash-alt.svg" alt="" />刪除
                </strong>
            </div>

            <?php
            if ($stmt->rowCount() > 0) {
                foreach ($arr as $obj) {
            ?>

                    <div class="order-box">
                        <div class="order-main">
                            <div class="order-title">
                                <div class="favorite-checkbox">
                                    <input type="checkbox" id="<?= $obj['id'] ?>" />
                                    <label for="<?= $obj['id'] ?>"><i class="checkbox"></i></label>
                                </div>
                                <div class="img"><img src="./images/<?= $obj['prod_main_img'] ?>"></div>
                                <p>
                                    <?= $obj['prod_name'] ?>
                                    <span>
                                        <?= $obj['prod_description'] ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="order-button fa">
                            <div>
                                <?php
                                if ($obj['location']) {
                                ?>

                                    <p>
                                        <img src="./SVG/member-system/locate.svg" alt="" class="locate-icon" /><?= $obj['location'] ?>, Taiwan
                                    </p>

                                <?php
                                } else {
                                ?>

                                    <p>裝備小屋</p>

                                <?php
                                }
                                ?>

                                <img src="./SVG/member-system/5star.svg" alt="" class="rate-icon" />
                            </div>

                            <?php if ($obj['prod_price']) {?>

                            <button class="btn-yellow" value="">TWD <?= number_format($obj['prod_price']) ?></button>

                            <?php
                            } else {    
                            ?>

                            <button class="btn-yellow" value="">TWD <?= number_format($obj['rental_charge']) ?></button>    

                            <?php
                            }
                            ?>

                        </div>
                    </div>

                <?php
                }
            } else {
                ?>

                <p>沒有收藏商品</p>

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