<?php 
header('Content-Type: text/html; charset=UTF-8');
$name = $email = $year = $gender = $kol  = $biography = $ok = "";
$rez="";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$error=[];

if($_SERVER["REQUEST_METHOD"] == "GET"){
    include('form.php');
    exit();
}
else{
  if (empty(test_input($_POST["name"]))) {
    $error[] = "Введите имя!";
  } else {
    $name = test_input($_POST["name"]);
  }

  if(empty(test_input($_POST["email"]))){
    $error[]="Введите Ваш Email!";
  }
  else{
    $email = test_input($_POST["email"]);
  }

  $year=$_POST["year"];

  if(empty($_POST["pol"])){
    $error[]="Укажите пол!";
  }
  else{
    if($_POST["pol"]=="Мужской"){
      $gender="Мужской";
    }
    else{
      $gender="Женский";
    }
  }

  if(empty($_POST["kol"])){
    $error[]="Укажите кол-во конечностей персонажа!";

  }
  else{
    if($_POST["kol"]=="2"){
      $kol="2";
    }
    else if($_POST["kol"]=="4"){
      $kol="4";
    }
    else if($_POST["kol"]=="6"){
      $kol="6";
    }
    else{
      $kol="8";
    }
  }

  if(empty($_POST["superpowers"])){
    $error[]="Укажите сверхспособности!";
  }
  else{
    $superpowers=$_POST["superpowers"];
  }

  if(empty(test_input($_POST["biography"]))){
    $error[]="Заполните биографию персонажа!";
  }
  else{
    $biography=$_POST["biography"];
  }

  if(empty($_POST["ok"])){
    $error[]="Примите правила компании!";
  }

if (empty($_POST['super'])){
    print ('Выберите одну или несколько сверхспособностей.<br>');
    $errors = true;

}

    $user = 'u54534';
    $pass = '5383176';
    $conn = new PDO('mysql:host=localhost;dbname=u54534', $user, $pass, [PDO::ATTR_PERSISTENT => true]);
    $stmt = $conn->prepare("INSERT INTO FORMS(name, email, year, gender, limbs, biography) VALUES (:name, :email, :year, :gender, :limbs, :biography)");
    $rez=$stmt->execute(['name'=>"$name",'email'=>"$email", 'year'=>"$year", 'gender'=>"$gender", 'limbs'=>"$kol", 'biography'=>"$biography"]);
    $id_form=$conn->lastInsertId();
    foreach ($_POST('superpower' as $value){
       $stmt2=$conn->prepare("SELECT id FROM SUPERPOWERS WHERE superpower = $value");
       $rez2=$stmt2->execute(INSERT INTO SUPERPOWERS SELECT $id_super,
        id FROM SUPERPOWERS WHERE superpower=$value);}
    $id_super=$conn->lastInsertId();
    $stmt3=$conn->prepare("INSERT INTO FORM_SUPERPOWER(id_DATA_FORM, id_DATA_superpower) VALUES (:id_DATA_FORM, :id_DATA_superpower)");
    $rez3=$stmt3->execute(['id_DATA_FORM'=>"$id_form", 'id_DATA_superpower'=>"$id_super"]);
  
    if($rez==1 && $rez2==1 && $rez3==1){
      $rez=1;
    }
    else{
      $rez=0;
    }
    
    $name = $email = $year = $gender = $kol  = $biography = $ok = "";
    $superpowers=array();
  }
  include('form.php');
}
?>
// stmt - это "дескриптор состояния"
