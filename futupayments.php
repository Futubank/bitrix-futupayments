<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


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

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
