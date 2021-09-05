<!-- 修改會員資訊 -->
<?php
session_start();

require_once 'db.inc.php';

$obj['success'] = false;
$obj['info'] = "修改失敗";

if( isset($_SESSION['email']) ){

    try{
        $sql = "UPDATE `users` SET 
                `last_name` = '{$_POST['last_name']}',
                `first_name` = '{$_POST['first_name']}',
                `phone_number` = '{$_POST['phone']}',
                `gender` = '{$_POST['gender']}',
                `birthdate` = '{$_POST['birthdate']}',
                `address` = '{$_POST['address']}'
                WHERE `email` = '{$_SESSION['email']}'";
        
        $stmt = $pdo->query($sql);

        if($stmt->rowCount() > 0){
            $obj['success'] = true;
            $obj['info'] = "會員資訊修改成功";

        }
    } catch(PDOException $e){

        switch($pdo->errorInfo()[1]){
            case 1062:
                $obj['info'] = '此帳號已註冊';
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