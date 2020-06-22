<?php
include"../admin/config.php";

function getAll($connect, $table){
    $sql = "SELECT * FROM {$table}";
    $result = mysqli_query($connect, $sql);

    if(!$result)
        die(mysqli_error($connect));

    $n = mysqli_num_rows($result);
    $res = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $res[] = $row;
    }

    return $res;
}
function getAllFromCart($connect, $user=0){
    $sql = sprintf("SELECT * FROM cart where user='%s'", $user);

    $result = mysqli_query($connect, $sql);

    if(!$result)
        die(mysqli_error($connect));

    $n = mysqli_num_rows($result);
    $res = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $res[] = $row;
    }

    return $res;
}

function getOne($connect, $id, $table){
    $sql = sprintf("SELECT * FROM {$table} where id=%d",(int)$id);
    $result = mysqli_query($connect, $sql);

    if(!$result)
        die(mysqli_error($connect));

    $res = mysqli_fetch_assoc($result);

    return $res;
}
function getOneTemp($connect, $id, $table){
    $query = sprintf("SELECT * FROM {$table} where id_good=%d",(int)$id);
    $result = mysqli_query($connect, $query);

    if(!$result)
        die(mysqli_error($connect));

    $res = mysqli_fetch_assoc($result);

    return $res;
}

function newTempOrder($connect, $id_good, $quantity, $user=0){

    $sql = "INSERT INTO cart (id_good, quantity, user) VALUES ('%d', '%d', '%s')";

    $query = sprintf($sql, $id_good, $quantity, $user);

    $result = mysqli_query($connect, $query);

    if(!$result){
        die(mysqli_error($connect));
    }

    return true;
}

function editTempOrder($connect, $id, $quantity){
    $id = (int)$id;

    $sql = "UPDATE cart SET quantity='%d' WHERE id_good='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($connect, $quantity),$id);

    $result = mysqli_query($connect, $query);

    if(!$result)
        die(mysqli_error($connect));

    return mysqli_affected_rows($connect);
}

function deleteOneTemp($connect, $id){
    $id = (int)$id;

    if ($id == 0)
        return false;

    $query = "DELETE FROM cart where id_good=$id";
    $result = mysqli_query($connect, $query);

    if (!$result)
        die(mysqli_error($connect));

    return 1;
}

function newUser($connect, $login, $email, $pass){

    $t = "INSERT INTO users (login, email, pass, admin) VALUES ('%s','%s','%s', 0)";

    $query = sprintf($t, mysqli_real_escape_string($connect, $login),mysqli_real_escape_string($connect, $email),mysqli_real_escape_string($connect, $pass));

    $result = mysqli_query($connect, $query);

    if(!$result){
        die(mysqli_error($connect));
    }

    return true;
}

function newProduct($connect, $name, $price, $path, $smallDesc, $fullDesc){

    $sql = "INSERT INTO goods (name, price, path, smallDesc, fullDesc) VALUES ('%s','%d','%s','%s','%s')";

    $query = sprintf($sql, mysqli_real_escape_string($connect, $name),mysqli_real_escape_string($connect, $price),mysqli_real_escape_string($connect, $path),mysqli_real_escape_string($connect, $smallDesc),mysqli_real_escape_string($connect, $fullDesc));


    $result = mysqli_query($connect, $query);

    if(!$result){
        die(mysqli_error($connect));
    }

    return true;
}

function editProduct($connect, $id, $name, $price, $path, $smallDesc, $fullDesc){
    $id = (int)$id;

    $sql = "UPDATE goods SET name='%s', price='%d', path='%s', smallDesc='%s', fullDesc='%s' WHERE id=$id";

    $query = sprintf($sql, mysqli_real_escape_string($connect, $name),mysqli_real_escape_string($connect, $price),mysqli_real_escape_string($connect, $path),mysqli_real_escape_string($connect, $smallDesc),mysqli_real_escape_string($connect, $fullDesc));


    $result = mysqli_query($connect, $query);

    if(!$result)
        die(mysqli_error($connect));

    return mysqli_affected_rows($connect);
}

function delete($connect, $id, $table){
    $id = (int)$id;

    if($id == 0)
        return false;

    $sql = "DELETE FROM {$table} where id=$id";
    $result = mysqli_query($connect, $sql);

    if(!$result)
        die(mysqli_error($connect));

    return mysqli_affected_rows($connect);
}

function createOrder($connect, $name, $id, $quantity){
    $t = "INSERT INTO orders (clientFio, idGoods, quantity) VALUES ('%s', '%d', '%d')";

    $sql = sprintf($t, $name, $id, $quantity);

    $res = mysqli_query($connect, $sql);

    if(!$res){
        die(mysqli_error($connect));
    }
}
function newClient($connect, $user, $name, $phone, $email, $address, $pay, $delivery, $comment){
    $t = "INSERT INTO clients (user, fio, phone, email, address, pay, delivery, comment) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')";

    $sql = sprintf($t, $user, $name, $phone, $email, $address, $pay, $delivery, $comment);

    $res = mysqli_query($connect, $sql);

    if(!$res){
        die(mysqli_error($connect));
    }
}

function deleteFromCart($connect, $id){
    $sql= "DELETE FROM cart WHERE `id_good`=$id";
    $res = mysqli_query($connect, $sql);
    if(!$res){
        die(mysqli_error($connect));
    }
}

function managerOrders($connect, $fio) {

    $query = "select * from orders  
	inner join clients on orders.clientFio = clients.fio 
    inner join goods on orders.idGoods = goods.id ";    // WHERE orders.clientFio=$fio  не работает подборка по имени

    $result = mysqli_query($connect, $query);

    if (!$result)
        die(mysqli_error($connect));

    $n = mysqli_num_rows($result);
    $orders = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $orders[] = $row;
    }
    return $orders;
}

function listOfOrders($connect){
    $sql = "SELECT DISTINCT clientFio FROM orders";
    $res = mysqli_query($connect, $sql);

    if (!$res)
        die(mysqli_error($connect));

    $n = mysqli_num_rows($res);
    $orders = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($res);
        $orders[] = $row;
    }
    return $orders;
}