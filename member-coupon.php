<?php  require_once 'member-header.php' ?>

    <link rel="stylesheet" href="./member-coupon.css" />
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
            <h2>我的優惠卷</h2>
            <nav class="coupon-cat">
                <h3>全部</h3>
                <h3>最新獲得</h3>
                <h3>即將到期</h3>
            </nav>
            <h3 class="coupon-cat2">會員好禮</h3>
            <div class="coupon-cat2-box">
                <div class="coupon-group new-coupon">
                    <div class="coupo">
                        <div class="coupon-card">
                            <div class="coupon-main">
                                <span>新用戶好禮</span>
                                <span>全站
                                    <h2>200元</h2>
                                    折價卷
                                </span>
                            </div>
                            <div class="coupon-deadline">
                                <span>有效期限</span>
                                <span>2021.10.31</span>
                            </div>
                        </div>
                    </div>
                    <div class="coupon-num">
                        <strong>x1</strong>
                        <p>說明</p>
                    </div>
                </div>
                <div class="coupon-discri0">
                    <div class="coupon-discri">
                        <div class="coupon-arc">
                            <h3>優惠內容</h3>
                            <p>全站200元折扣</p>
                            <h3>有效期限</h3>
                            <p>2021.09.03 00:00 - 2021.10.31 23:59</p>
                            <h3>付款</h3>
                            <p>適用於所有付款方式</p>
                            <h3>物流</h3>
                            <p>適用於所有物流方式</p>
                            <h3>注意事項</h3>
                            <p>
                                優惠券可以和禮物卡同時使用。
                                優惠券不能和首購優惠、紅利、站方活動折抵同時使用，且已成立訂單不能以未使用優惠券為由取消訂單。
                            </p>
                        </div>
                        <div class="coupon-btn">
                            <button class="btn-green">確定</button>
                        </div>
                    </div>
                </div>
                <div class="coupon-group new-coupon">
                    <div class="coupon-card">
                        <div class="coupon-main">
                            <span>開幕好禮</span>
                            <span>全站
                                <h2>95折</h2>
                                折價卷
                            </span>
                        </div>
                        <div class="coupon-deadline">
                            <span>有效期限</span>
                            <span>2021.11.31</span>
                        </div>
                    </div>
                    <div class="coupon-num">
                        <strong>x2</strong>
                        <a href="">
                            <p>說明</p>
                        </a>
                    </div>
                </div>
                <div class="coupon-discri0">
                    <div class="coupon-discri">
                        <div class="coupon-arc">
                            <h3>優惠內容</h3>
                            <p>全站95折</p>
                            <h3>有效期限</h3>
                            <p>2021.09.03 00:00 - 2021.11.31 23:59</p>
                            <h3>付款</h3>
                            <p>適用於所有付款方式</p>
                            <h3>物流</h3>
                            <p>適用於所有物流方式</p>
                            <h3>注意事項</h3>
                            <p>
                                優惠券可以和禮物卡同時使用。
                                優惠券不能和首購優惠、紅利、站方活動折抵同時使用，且已成立訂單不能以未使用優惠券為由取消訂單。
                            </p>
                        </div>
                        <div class="coupon-btn">
                            <button class="btn-green">確定</button>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="coupon-cat2">好手氣</h3>
            <div class="coupon-cat2-box">
                <div class="coupon-group new-coupon old-coupon">
                    <div class="coupon-card coupon-card2">
                        <div class="coupon-main">
                            <span>好手氣</span>
                            <span>全站
                                <h2>150元</h2>
                                折價卷
                            </span>
                        </div>
                        <div class="coupon-deadline">
                            <span>有效期限</span>
                            <span>2021.9.30</span>
                        </div>
                    </div>
                    <div class="coupon-num">
                        <strong>x1</strong>
                        <a href="">
                            <p>說明</p>
                        </a>
                    </div>
                </div>
                <div class="coupon-discri0">
                    <div class="coupon-discri">
                        <div class="coupon-arc">
                            <h3>優惠內容</h3>
                            <p>全站200元折扣</p>
                            <h3>有效期限</h3>
                            <p>2021.09.03 00:00 - 2021.9.30 23:59</p>
                            <h3>付款</h3>
                            <p>適用於所有付款方式</p>
                            <h3>物流</h3>
                            <p>適用於所有物流方式</p>
                            <h3>注意事項</h3>
                            <p>
                                優惠券可以和禮物卡同時使用。
                                優惠券不能和首購優惠、紅利、站方活動折抵同時使用，且已成立訂單不能以未使用優惠券為由取消訂單。
                            </p>
                        </div>
                        <div class="coupon-btn">
                            <button class="btn-green">確定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
</body>

</html>