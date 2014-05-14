<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?

$ff = new FutubankForm(
    CSalePaySystemAction::GetParamValue('MERCHANT_ID'),
    CSalePaySystemAction::GetParamValue('SECRET_KEY'),
    CSalePaySystemAction::GetParamValue('IS_TEST') == 'Y'
);

$error = null;
if (!$ff->is_signature_correct($_POST)) {
    $error = "некорректное значение параметроа 'signature'";
} else  if (!($order_id = IntVal($_POST['order_id']))) {
    $error = "не передан параметр 'order_id'";
} else if (!($order = CSaleOrder::GetByID($order_id))) {
    $error = "не найден заказ №$order_id";
}

if ($error) {
    echo "ОШИБКА: $error\n";
} else {
    if ($ff->is_order_completed($_POST)) {        
        CSalePaySystemAction::InitParamArrays($order, $order_id);
        CSaleOrder::Update($order_id, array(
            'PS_STATUS'         => 'Y',
            'PS_SUM'            => $_POST['amount'],
            'PS_CURRENCY'       => $_POST['currency'],
            'PS_STATUS_MESSAGE' => $_POST['message'],
            'PS_RESPONSE_DATE'  => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat('FULL', LANG))),
        ));
        if (CSalePaySystemAction::GetParamValue('PYM_CHANGE_STATUS_PAY') == 'Y') {
            CSaleOrder::PayOrder($order_id, 'Y');
        }
    }
    echo "OK$order_id\n";
}

?>