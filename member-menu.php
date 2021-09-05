<!-- 會員選單 -->
<div class="member-menu">
    <img src="./SVG/member-system/avatar.svg" alt="">
    <h3>
        <?php
        if ($arrUser['last_name'] || $arrUser['first_name']) {
            echo "{$arrUser['last_name']}{$arrUser['first_name']}";
        } else {
            echo "{$arrUser['email']}";
        };
        ?>
    </h3>
    <a href="./member-profile.php">編輯會員個人資訊</a>
    <ul>
        <li><a href="./member-order.php">訂單紀錄</a></li>
        <li><a href="./member-rent.php">我的租借</a></li>
        <li><a href="./member-favorite.php">我的收藏</a></li>
        <li><a href="./member-ahieve.php">我的成就</a></li>
        <li><a href="./member-point.php">會員積點</a></li>
        <li><a href="./member-coupon.php">會員優惠</a></li>
    </ul>
</div>