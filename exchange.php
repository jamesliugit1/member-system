<!-- 用積點兌換禮品 -->
<?php
require_once 'db.inc.php';
 session_start();



$obj['success'] = false;
$obj['info'] = "兌換失敗";

if( isset($_POST['prod_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['phone']) ){
    try{
        $sql = "SELECT * FROM `omiyage`
                WHERE `prod_id` =  {$_POST['prod_id']}";
        $arr = $pdo->query($sql)->fetch();

        $sql1 = "INSERT INTO `orders` (`email`, `transport_payment`, `recipient_email`, `recipient_first_name`, `recipient_phone_number`, `recipient_address`, `total`, `invoice_carrier`, `invoice_carrier_number`) VALUES ('{$_SESSION['email']}', '免付款', '{$_POST['email']}', '{$_POST['name']}', '{$_POST['phone']}', '{$_POST['address']}', 0, '無', '無')";      
        $stmt1 = $pdo->query($sql1);

        if($stmt1->rowCount() > 0){
            $lastInsertId = $pdo->lastInsertId();
            $order_id = date("Ymd") . sprintf('%05d', $lastInsertId);
            $sqlUpdate = "UPDATE `orders` SET `order_id` = '{$order_id}' WHERE `id` = {$lastInsertId}";
            $pdo->query($sqlUpdate);

            $sql3 = "INSERT INTO `orders_detail` (`order_id`, `prod_id`, `prod_name`, `prod_main_img`, `func_name`, `prod_description`, `prod_price`, `prod_qty`, `subtotal`) VALUES ('{$order_id}', {$_POST['prod_id']}, '{$arr['prod_name']}', '{$arr['prod_main_img']}', '21', '{$arr['prod_description']}', 0, 1, 0)";
            $pdo->query($sql3);
            
            $exPoint = $arr['change_point'];
            
            $sql4 = "SELECT `point` FROM `users`
                    WHERE `email` = '{$_SESSION['email']}'";
            $arr4 = $pdo->query($sql4)->fetch();
            $userPoint = $arr4['point'];
            $updatePoint = $userPoint - $exPoint;

            $sql5 = "UPDATE `users` SET `point` = $updatePoint WHERE `email` = '{$_SESSION['email']}'";
            $stmt5 = $pdo->query($sql5);

            $obj['success'] = true;
            $obj['info'] = "兌換成功";
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

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);