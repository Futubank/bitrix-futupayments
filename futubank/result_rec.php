<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?

include('futubank_core.php');

class FutubankCallbackHandler extends AbstractFutubankCallbackHandler {
	protected function get_futubank_form() {
		return new FutubankForm(
			CSalePaySystemAction::GetParamValue('MERCHANT_ID'),
			CSalePaySystemAction::GetParamValue('SECRET_KEY'),
			CSalePaySystemAction::GetParamValue('IS_TEST') == 'Y'
		);
	}
	protected function load_order($order_id) {
		return CSaleOrder::GetByID($order_id);
	}
	protected function get_order_currency($order) {
		return $order['PS_CURRENCY'];
	}
	protected function get_order_amount($order) {
		return $order['PS_SUM'];
	}
	protected function is_order_completed($order) {
		return ($order['PAYED'] == 'Y');
	}
	protected function mark_order_as_completed($order, array $data) {
		CSaleOrder::PayOrder($order['ID'], 'Y', true, true);
		CSaleOrder::Update($order['ID'], array(
			'PS_STATUS' => 'Y',
			'PS_SUM' => $data['amount'],
			'PS_CURRENCY' => $data['currency'],
			'PS_STATUS_MESSAGE' => $data['message'],
			'PS_RESPONSE_DATE' => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat('FULL', LANG))),
		));
	}
	protected function mark_order_as_error($order, array $data) {
		CSaleOrder::Update($order['ID'], array(
			'PS_STATUS' => 'N',
			'PS_SUM' => $data['amount'],
			'PS_CURRENCY' => $data['currency'],
			'PS_STATUS_MESSAGE' => $data['message'],
			'PS_RESPONSE_DATE' => Date(CDatabase::DateFormatToPHP(CLang::GetDateFormat('FULL', LANG))),
		));
	}
}

$h = FutubankCallbackHandler();
$h->show($_POST);
?>
