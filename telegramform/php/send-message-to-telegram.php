<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['name']) && !empty($_POST['phone'])){
  if (isset($_POST['name'])) {
    if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Имя пославшего: ";
  }
}

if (isset($_POST['phone'])) {
  if (!empty($_POST['phone'])){
  $phone = strip_tags($_POST['phone']);
  $phoneFieldset = "Телефон: ";
  }
}
if (isset($_POST['theme'])) {
  if (!empty($_POST['theme'])){
  $theme = strip_tags($_POST['theme']);
  $themeFieldset = "Тема:";
  }
}
$token = "";
$chat_id = "";
$arr = array(
  $nameFieldset => $name,
  $phoneFieldset => $phone,
 
);
    $txt = ''; 
foreach($arr as $key => $value) {   
    
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
 
  echo '<p class="success" style="color: #18d26e";>Ваша заявка успешно отправлена!</p>';
    return true;
} else {
  echo '<p class="fail"  style="color: red";><b>Ошибка. Сообщение не отправлено!</b></p>';
}
} else {
  echo '<p class="fail" style="color: red";>Ошибка. Вы заполнили не все обязательные поля!</p>';
}
} else {
echo '<p class="success" style="color: #18d26e";>Спасибо за отправку вашего сообщения!</p>';
}

?>