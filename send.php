<?php
$_POST['name']
$_POST['email']
$_POST['comment']
$name = trim(urldecode(htmlspecialchars($name)));
$email = trim(urldecode(htmlspecialchars($email)));
$msg = trim(urldecode(htmlspecialchars($msg)));
mail("cuscoYT@gmail.com", "Новый запрос на создание сайта",
"<h1>На вашем сайте была составлена заявка</h1>
<br>от: <b>".$name."</b>
<br>e-mail: <b>".$electro."</b>
<br>пользоватль оставил комментарий ".$comment."
<br>Поздравляю с новой заявкой!",
"From: 1c-webdevelopment.ru\r\n". "Content-type: text/html\r\n");
if(mail("cuscoYT@gmail.com", "Вам пришел запрос на создание сайта",
"<h1>На сайте была оставлена заявка</h1>
<br>от: <b>".$name."</b>
<br>e-mail: <b>".$email."</b>
<br>пользователь оставил комментарий ".$msg."
<br>Поздравляю с новой заявкой",
"From: 1c-webdevelopment.ru\r\n". "Content-type: text/html\r\n"))
{
    echo '{"status": "ok"}';
}else{
    echo '{"status": "error"}';
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $comment = htmlspecialchars($_POST["comment"]);

    $to = "cuscoYT@gmail.com";
    $subject = "Вам пришел запрос на создание сайта";
    $message = "Имя: $name\nЭлектронная почта: $email\nКомментарий: $comment";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "На сайте была оставлена заявка";
    } else {
        echo "Произошла ошибка при отправке запроса";
    }
}
?>