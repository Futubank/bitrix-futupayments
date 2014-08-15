<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?><?

define('FUTUBANK_VERSION', '1.0');

$after =  (LANGUAGE_ID == 'en') ? '/payment.php' : '/payment.' . SITE_CHARSET . '.php';
include(GetLangFileName(dirname(__FILE__) . '/', $after));
include('futubank_core.php');

$sVer = ($GLOBALS['USER']->CanDoOperation('view_other_settings')? " ".SM_VERSION : "");
$cms_info = 'Bitrix ' . $sVer;
$plugin_version = 'Futupayments Bitrix plugin v.' . (defined('FUTUBANK_VERSION') ? FUTUBANK_VERSION : 'Unknown');

$ff = new FutubankForm(
	CSalePaySystemAction::GetParamValue('MERCHANT_ID'),
	CSalePaySystemAction::GetParamValue('SECRET_KEY'),
	CSalePaySystemAction::GetParamValue('IS_TEST') == 'Y',
	$plugin_version,
	$cms_info
);

$order_id = IntVal($GLOBALS['SALE_INPUT_PARAMS']['ORDER']['ID']); 
$arOrder = CSaleOrder::GetByID($order_id);

$currency = CSalePaySystemAction::GetParamValue('CURRENCY');
if ($currency == 'RUR') {
	$currency = 'RUB';
}

$cancel_url = 'http://'.SITE_SERVER_NAME.$APPLICATION->GetCurUri();
$meta = "$arOrder[PAY_SYSTEM_ID]:$arOrder[PERSON_TYPE_ID]";  // dirty hack

$form = $ff->compose(
	CSalePaySystemAction::GetParamValue('AMOUNT'),
	$currency,
	$order_id,
	CSalePaySystemAction::GetParamValue('CLIENT_EMAIL'),
	CSalePaySystemAction::GetParamValue('CLIENT_NAME'),
	CSalePaySystemAction::GetParamValue('CLIENT_PHONE'),
	CSalePaySystemAction::GetParamValue('SUCCESS_URL'),
	CSalePaySystemAction::GetParamValue('FAIL_URL'),
	$cancel_url,
	$meta
);

?>
<form action="<?=$ff->get_url()?>" method="post" target="_blank" id="pay-form">
	<div class="tablebodytext bx_ordercart_order_pay_center">
		<?=GetMessage('PYM_TITLE')?><?=$order_id?><br>
		<?=GetMessage('PYM_TO_PAY')?> <b><?=SaleFormatCurrency(CSalePaySystemAction::GetParamValue('AMOUNT'), CSalePaySystemAction::GetParamValue('CURRENCY'))?></b>
		<p>
			<?=FutubankForm::array_to_hidden_fields($form)?>
			<a href="javascript:void(0)" onclick="document.getElementById('pay-form').submit()" class="checkout"><?=GetMessage('PYM_BUTTON')?></a>
		</p>
	</div>
</form>
