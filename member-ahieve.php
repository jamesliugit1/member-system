<?php  require_once 'member-header.php' ?>

    <link rel="stylesheet" href="./member-achieve.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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

            $ach1 = $arrUser['ach1'];
            $ach2 = $arrUser['ach2'];
            $ach3 = $arrUser['ach3'];
            $ach4 = $arrUser['ach4'];
            $ach5 = $arrUser['ach5'];
            $ach6 = $arrUser['ach6'];
            $ach7 = $arrUser['ach7'];
            $ach8 = $arrUser['ach8'];
            $ach9 = $arrUser['ach9'];

            $achImg1 = ($arrUser['ach1']) ? 'complete' : 'yet';
            $achImg2 = ($arrUser['ach2']) ? 'complete' : 'yet';
            $achImg3 = ($arrUser['ach3']) ? 'complete' : 'yet';
            $achImg4 = ($arrUser['ach4']) ? 'complete' : 'yet';
            $achImg5 = ($arrUser['ach5']) ? 'complete' : 'yet';
            $achImg6 = ($arrUser['ach6']) ? 'complete' : 'yet';
            $achImg7 = ($arrUser['ach7']) ? 'complete' : 'yet';
            $achImg8 = ($arrUser['ach8']) ? 'complete' : 'yet';
            $achImg9 = ($arrUser['ach9']) ? 'complete' : 'yet';
            ?>
            <section class="gold-trophy">
                <div class="achieve-box <?= $ach1 ?>">
                    <img src="./SVG/member-system/<?= $achImg1 ?>.svg" alt="">
                    <div class="achieve-img">
                        <img src="./SVG/member-system/gold-trophy.svg" alt="">
                        <img src="./SVG/member-system/shine.svg" alt="" class="shine">
                        <img src="./SVG/member-system/shine.svg" alt="" class="shine">
                        <img src="./SVG/member-system/shine.svg" alt="" class="shine">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>寶島大師</h3>
                            <p>完成環島、登玉山、泳渡日月潭3項或完成1+1+1即可獲得</p>
                            <span><?php if ($ach1) echo "你和"?>11.6的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">                      
                            <a href="./member-achieve-detail.php?ach_id=ach1"><p>完成獎勵: <b>新環島台灣行李箱套</b></p></a>
                            <a href="./1+1+1_index.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach1"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
            </section>
            <h2 class="sliver-h2">旅人三項</h2>          
            <section class="sliver-trophy">
                <div class="achieve-box <?= $ach2 ?>" id="achieve-round">
                    <img src="./SVG/member-system/<?= $achImg2 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>蓬萊仙人</h3>
                            <p>完成環島行程</p>
                            <span><?php if ($ach2) echo "你和"?>56.8%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach2"><p>完成獎勵: <b>紀念明信片</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach2"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box <?= $ach4 ?>" id="achieve-jade">
                    <img src="./SVG/member-system/<?= $achImg4 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>巔峰極限</h3>
                            <p>完成登玉山行程</p>
                            <span><?php if ($ach4) echo "你和"?>26.2%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach4"><p>完成獎勵: <b>抗UV頭巾-玉山</b></p></a>
                            <a href="./mountain.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach4"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box <?= $ach3 ?>" id="achieve-lake">
                    <img src="./SVG/member-system/<?= $achImg3 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>有龍則靈</h3>
                            <p>完成日月潭行程</p>
                            <span><?php if ($ach3) echo "你和"?>29.6%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach3"><p>完成獎勵: <b>日月潭新八景LED燈傘</b></p></a>
                            <a href="./lake.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach3"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
            </section>
            <h2 class="copper-h2">新手啟程</h2>
            <section class="copper-trophy">
                <div class="achieve-box <?= $ach9 ?>">
                    <img src="./SVG/member-system/<?= $achImg9 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>寶島啟程瘋</h3>
                            <p>參加任一行程</p>
                            <span><?php if ($ach9) echo "你和"?>83%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach9"><p>完成獎勵: <b>紀念郵票一組</b></p></a>
                            <a href=""><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach9"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>斤斤計較</h3>
                            <p>送出5則評論</p>
                            <span>39.2%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <img src="./SVG/member-system/bobee.svg" alt=""><b>200</b></p></a>
                            <button class="btn-yellow">馬上參加</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>在地嚮導</h3>
                            <p>送出100字的評論</p>
                            <span>29%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>100元折價卷 x1</b></p></a>
                            <button class="btn-yellow">馬上參加</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>超長現象</h3>
                            <p>送出200字的評論</p>
                            <span>21.2%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <img src="./SVG/member-system/bobee.svg" alt=""><b>200</b></p></a>
                            <button class="btn-yellow">馬上參加</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>決力一元</h3>
                            <p>租借商品10天以上</p>
                            <span>49%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>100元折價卷 x1</b></p></a>
                            <button class="btn-yellow">馬上參加</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>攝影師</h3>
                            <p>上傳6張照片</p>
                            <span>79%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>100元折價卷 x1</b></p></a>
                            <button class="btn-yellow">馬上參加</button>
                        </div>
                    </div>
                </div>
            </section>
            <h2 id="copper-h2">各路好手</h2>
            <section class="copper-trophy">
                <div class="achieve-box <?= $ach5 ?>">
                    <img src="./SVG/member-system/<?= $achImg5 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>背包客</h3>
                            <p>參加任一北部行程</p>
                            <span><?php if ($ach5) echo "你和"?>67%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach5"><p>完成獎勵: <b>造型曲線杯一組</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach5"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box <?= $ach6 ?>">
                    <img src="./SVG/member-system/<?= $achImg6 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>一步一腳印</h3>
                            <p>參加任一中部行程</p>
                            <span><?php if ($ach6) echo "你和"?>54.2%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach6"><p>完成獎勵: <b>阿里山珪藻土杯墊</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach6"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box <?= $ach8 ?>">
                    <img src="./SVG/member-system/<?= $achImg8 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>實地探訪</h3>
                            <p>參加任一東部行程</p>
                            <span><?php if ($ach8) echo "你和"?>34%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach8"><p>完成獎勵: <b>花蓮太魯閣聲光卡片</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach8"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box <?= $ach7 ?>">
                    <img src="./SVG/member-system/<?= $achImg7 ?>.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>一帆風順</h3>
                            <p>參加任一離島行程</p>
                            <span><?php if ($ach9) echo "你和"?>83%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href="./member-achieve-detail.php?ach_id=ach7"><p>完成獎勵: <b>墾丁帆布地圖</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow btn-ach1">馬上參加</button></a>
                            <a href="./member-achieve-detail.php?ach_id=ach7"><button class="btn-yellow btn-ach2">領取獎勵</button></a>
                            <button class="btn-ach3">已領取</button>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>一路向北</h3>
                            <p>參加2個北部踩點</p>
                            <span>62.9%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>造型曲線杯一組</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow">馬上參加</button></a>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>滿載而歸</h3>
                            <p>參加2個中部踩點</p>
                            <span>57.2%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>阿里山珪藻土杯墊</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow">馬上參加</button></a>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>探險家</h3>
                            <p>參加2個東部踩點</p>
                            <span>23%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>花蓮太魯閣聲光卡片</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow">馬上參加</button></a>
                        </div>
                    </div>
                </div>
                <div class="achieve-box">
                    <img src="./SVG/member-system/yet.svg" alt="">
                    <div class="achieve-img">
                    </div>
                    <div class="achieve-main">
                        <div class="achieve-top">
                            <h3>海上男兒</h3>
                            <p>參加2個離島踩點</p>
                            <span>13.8%的用戶已完成</span>
                        </div>
                        <div class="achieve-bottom">
                            <a href=""><p>完成獎勵: <b>墾丁帆布地圖</b></p></a>
                            <a href="./surround_island.php"><button class="btn-yellow">馬上參加</button></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            
            ?>
        </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
</body>
</html>