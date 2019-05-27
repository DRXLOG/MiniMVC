<?php 
class model_index
{
	
	function __construct()
	{
		if (isset($_GET['fname']) && isset($_GET['femail']) && isset($_GET['fphone'])) {
			mailmsg();
		} else {
			echo "Данные не пришли!	";
		}
	}

	function mailmsg() {
		$email = "rowsinthemrc@gmail.com";
			$msg = $_GET['fname'].' , хочет с вами связаться его данные Телефон: '.$_GET['fphone'].' email:'. $_GET['femail'];
			$them = 'Обращение с сайта по пятакам';
			mail($email, $them, $msg);
			echo "Успешно!";
	}
}
?>