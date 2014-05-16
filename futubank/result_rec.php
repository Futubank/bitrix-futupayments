<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?

include('futubank_core.php');

$ff = new FutubankForm(
	CSalePaySystemAction::GetParamValue('MERCHANT_ID'),
	CSalePaySystemAction::GetParamValue('SECRET_KEY'),
	CSalePaySystemAction::GetParamValue('IS_TEST') == 'Y'
);

$error = null;
if (!$ff->is_signature_correct($_POST)) {
	$error = 'Incorrect "signature"';
} else  if (!($order_id = IntVal($_POST['order_id']))) {
	$error = 'Empty "order_id"';
} else if (!($arOrder = CSaleOrder::GetByID($order_id))) {
	$error = 'Unknown order_id';
}

if ($error) {
	echo "ERROR: $error\n";
} else {
	echo "OK$order_id\n";
	if ($ff->is_order_completed($_POST)) {
		echo "order completed\n";
		if (CSalePaySystemAction::GetParamValue('CHANGE_STATUS_PAY') == 'Y') {
			if ($arOrder['PAYED'] == 'Y') {
				echo "already payed\n";
			} else {
				if (CSaleOrder::PayOrder($arOrder['ID'], 'Y', true, true)) {
					echo "payed now\n";
				} else {
					echo "ERROR: can't change payment status\n";
				}
			}
		}
		CSaleOrder::Update($arOrder['ID'], array(
			'PS_STATUS' => 'Y',
			'PS_SUM' => $_POST['amount'],
			'PS_CURRENCY' => $_POST['currency'],
			'PS_STATUS_MESSAGE' => $_POST['message'],
			'PS_RESPONSE_DATE' => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat('FULL', LANG))),
		));
	} else {
		echo "order not completed\n";
	}
}

?>