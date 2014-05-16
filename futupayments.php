<?php
ob_start();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
ob_end_clean();
ob_end_flush();

if (!$_POST) {
	echo "It works!";
} else {
	$bits = split(':', $_POST['meta']);
	$APPLICATION->IncludeComponent(
		'bitrix:sale.order.payment.receive',
		'',
		Array(
			'PAY_SYSTEM_ID' => $bits[0],
			'PERSON_TYPE_ID' => $bits[1],
		)
	);
}
?>