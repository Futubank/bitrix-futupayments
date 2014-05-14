<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?><?

include(GetLangFileName(dirname(__FILE__).'/', '/payment.php'));
include('futubank_core.php');

$ff = new FutubankForm(
    CSalePaySystemAction::GetParamValue('MERCHANT_ID'),
    CSalePaySystemAction::GetParamValue('SECRET_KEY'),
    CSalePaySystemAction::GetParamValue('IS_TEST') == 'Y'
);

$order_id = IntVal($GLOBALS['SALE_INPUT_PARAMS']['ORDER']['ID']); 

$currency = CSalePaySystemAction::GetParamValue('CURRENCY');
if ($currency == 'RUR') {
    $currency = 'RUB';
}

$form = $ff->compose(
    CSalePaySystemAction::GetParamValue('AMOUNT'),
    $currency,
    $order_id,
    CSalePaySystemAction::GetParamValue('CLIENT_EMAIL'),
    CSalePaySystemAction::GetParamValue('CLIENT_NAME'),
    CSalePaySystemAction::GetParamValue('CLIENT_PHONE'),
    CSalePaySystemAction::GetParamValue('SUCCESS_URL'),
    CSalePaySystemAction::GetParamValue('FAIL_URL'),
    'http://'.SITE_SERVER_NAME.$APPLICATION->GetCurUri()
);

?>
<form action="<?=$ff->get_url()?>" method="post" target="_blank">
    <div class="tablebodytext">
        <?=GetMessage('PYM_TITLE')?><br>
        <?=GetMessage('PYM_ORDER')?> <?=$order_id.'  '.CSalePaySystemAction::GetParamValue('DATE_INSERT')?><br>
        <?=GetMessage('PYM_TO_PAY')?> <b><?=SaleFormatCurrency(CSalePaySystemAction::GetParamValue('AMOUNT'), CSalePaySystemAction::GetParamValue('CURRENCY'))?></b>
        <p>
            <input type="hidden" name="FinalStep" value="1">
            <?=FutubankForm::array_to_hidden_fields($form)?>
            <input type=submit name='Submit' value='<?=GetMessage('PYM_BUTTON')?>'>
        </p>
    </div>
</form>
