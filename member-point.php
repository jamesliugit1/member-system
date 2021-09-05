<?php  require_once 'member-header.php' ?>

    <link rel="stylesheet" href="./member-order.css" />
    <link rel="stylesheet" href="./member-point.css" />
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

            <?php

            $sql1 = "SELECT * FROM `omiyage`";
            $arr1 = $pdo->query($sql1)->fetchAll();
            ?>
            <h2>你有的積點</h2>
            <h2 class="mypoint">
                <img src="./SVG/member-system/bobee.svg" alt="" /><?= number_format($arrUser['point']) ?>
            </h2>
            <nav class="point-cat">
                <div class="cat-row">
                    <div class="point-cat-item" id="point-cat0">
                        <img src="./SVG/member-system/hex3.svg" alt="" />
                        <strong>全部</strong>
                    </div>
                    <div class="point-cat-item" id="point-cat1">
                        <img src="./SVG/member-system/hex3.svg" alt="" />
                        <strong>精品好禮</strong>
                    </div>
                    <div class="point-cat-item" id="point-cat2">
                        <img src="./SVG/member-system/hex3.svg" alt="" />
                        <strong>激殺優惠</strong>
                    </div>
                </div>
                <div class="cat-row">
                    <div class="point-cat-item" id="point-cat3">
                        <img src="./SVG/member-system/hex3.svg" alt="" />
                        <strong>飯店住宿</strong>
                    </div>
                    <div class="point-cat-item" id="point-cat4">
                        <img src="./SVG/member-system/hex3.svg" alt="" />
                        <strong>美食佳餚</strong>
                    </div>
                    <div class="point-cat-item" id="point-cat5">
                        <img src="./SVG/member-system/hex3.svg" alt="" />
                        <strong>品味生活</strong>
                    </div>
                </div>
            </nav>

            <?php
            foreach ($arr1 as $obj1) {
            ?>

                <div class="order-box type_id_<?= $obj1['type_id'] ?>">
                    <a href="./member-point-detail.php?prod_id=<?= $obj1['prod_id'] ?>" class="order-main">
                        <div class="order-title">
                            <div class="img"><img src="./images/<?= $obj1['prod_main_img'] ?>" /></div>
                            <div>
                                <h3><?= $obj1['prod_name'] ?></h3>
                                <p><?= $obj1['prod_description'] ?></p>
                            </div>
                        </div>
                        <div class="order-cols">
                            <div class="order-col">
                                <span>* 限量商品，兌完為止</span>
                            </div>
                            <div class="order-col">
                                <img src="./SVG/member-system/bobee.svg" alt="" />
                                <h2><?= number_format($obj1['change_point']) ?></h2>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
</body>

</html>