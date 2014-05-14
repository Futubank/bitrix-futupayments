<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?><?
include(GetLangFileName(dirname(__FILE__).'/', '/payment.php'));

$psTitle = GetMessage('SPCP_DTITLE');
$psDescription = GetMessage('SPCP_DDESCR');

$arPSCorrespondence = array(
    'MERCHANT_ID' => array(
        'NAME'  => GetMessage('MERCHANT_ID'),
        'DESCR' => GetMessage('MERCHANT_ID_DESCR'),
        'VALUE' => '',
        'TYPE'  => '',
    ),
    'SECRET_KEY' => array(
        'NAME'  => GetMessage('SECRET_KEY'),
        'DESCR' => GetMessage('SECRET_KEY_DESCR'),
        'VALUE' => '',
        'TYPE'  => '',
    ),
    'IS_TEST' => array(
        'NAME'  => GetMessage('PYM_TEST'),
        'DESCR' => GetMessage('PYM_TEST_DESC'),
        'VALUE' => 'Y',
        'TYPE'  => '',
    ),
    'CHANGE_STATUS_PAY' => array(
        'NAME'  => GetMessage('PYM_CHANGE_STATUS_PAY'),
        'DESCR' => GetMessage('PYM_CHANGE_STATUS_PAY_DESC'),
        'VALUE' => 'Y',
        'TYPE'  => '',
    ),
    'SUCCESS_URL' => array(
        'NAME'  => GetMessage('SUCCESS_URL'),
        'DESCR' => GetMessage('SUCCESS_URL_DESC'),
        'VALUE' => 'https://secure.futubank.com/success/',
        'TYPE'  => '',
    ),
    'FAIL_URL' => array(
        'NAME'  => GetMessage('FAIL_URL'),
        'DESCR' => GetMessage('FAIL_URL_DESC'),
        'VALUE' => 'https://secure.futubank.com/fail/',
        'TYPE'  => '',
    ),
    'AMOUNT' => array(
        'NAME'  => GetMessage('AMOUNT'),
        'DESCR' => GetMessage('AMOUNT_DESCR'),
        'VALUE' => 'PRICE',
        'TYPE'  => 'ORDER',
    ),
    'CURRENCY' => array(
        'NAME'  => GetMessage('CURRENCY'),
        'DESCR' => GetMessage('CURRENCY_DESCR'),
        'VALUE' => 'CURRENCY',
        'TYPE'  => 'ORDER',
    ),
    'DATE_INSERT' => array(
        'NAME'  => GetMessage('DATE_INSERT'),
        'DESCR' => GetMessage('DATE_INSERT_DESCR'),
        'VALUE' => 'DATE_INSERT',
        'TYPE'  => 'ORDER',
    ),
    'CLIENT_EMAIL' => array(
        'NAME'  => GetMessage('CLIENT_EMAIL'),
        'DESCR' => GetMessage('CLIENT_EMAIL_DESCR'),
        'VALUE' => 'EMAIL',
        'TYPE'  => 'PROPERTY',
    ),
    'CLIENT_NAME' => array(
        'NAME'  => GetMessage('CLIENT_NAME'),
        'DESCR' => GetMessage('CLIENT_NAME_DESCR'),
        'VALUE' => 'FIO',
        'TYPE'  => 'PROPERTY',
    ),
    'CLIENT_PHONE' => array(
        'NAME'  => GetMessage('CLIENT_PHONE'),
        'DESCR' => GetMessage('CLIENT_PHONE_DESCR'),
        'VALUE' => 'PHONE',
        'TYPE'  => 'PROPERTY',
    ),
);
?>