<?php

session_start();

require_once 'db.inc.php';
$obj['success'] = false;
$obj['info'] = "失敗!!!!!!";
$obj['myPostArray'] = $_POST['delArray'];
//確認所有傳過來的表單資料是否完整
if( isset($_POST['delArray'])){

    //LOOP
    foreach ($_POST['delArray'] as $obj){

        try {
            $sql = "DELETE FROM `products_follow` WHERE `prod_id` = $obj AND `email` = '{$_SESSION['email']}'";
            $stmt = $pdo->query($sql);

            if($stmt->rowCount() > 0){
                // 修改預設訊息
                // $obj['success'] = true;
                // $obj['myPostArray'] = "刪除成功";
            } 
        } catch(PDOException $e){
      
            switch($pdo->errorInfo()[1]){
                case 1062:
                    $obj['info'] = '此商品已追蹤';
                break;
    
                case 1064:
                    $obj['info'] = 'SQL 語法錯誤';
                break;
            }
        }
    }

}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);