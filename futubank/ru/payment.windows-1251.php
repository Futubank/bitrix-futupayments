<?
global $MESS;

$MESS['SPCP_DTITLE'] = 'Futubank.com';
$MESS['SPCP_DDESCR'] = ''; 
//'Оплата через платежную систему <a href="http://www.futubank.com">Futubank.com</a><br>Для получения результата оплаты используется файл result_receive.php - этот файл необходимо скопировать в публичную часть и сообщить его адрес платежной системе, чтобы Платежная система обращалась к нему в случае успешной оплаты (Result_URL и Success_URL).';

$MESS['AMOUNT'] = 'Сумма заказа';
$MESS['AMOUNT_DESCR'] = '';

// $MESS['DATE_INSERT'] = 'Дата создания заказа';
// $MESS['DATE_INSERT_DESCR'] = '';

$MESS['CLIENT_EMAIL'] = 'E-mail покупателя';
$MESS['CLIENT_EMAIL_DESCR'] = '';

$MESS['CLIENT_NAME'] = 'Имя покупателя';
$MESS['CLIENT_NAME_DESCR'] = '';

$MESS['CLIENT_PHONE'] = 'Телефон покупателя';
$MESS['CLIENT_PHONE_DESCR'] = '';

$MESS['CURRENCY'] = 'Валюта';
$MESS['CURRENCY_DESCR'] = 'Поддерживается только RUB';

$MESS['FAIL_URL'] = 'Страница «Ошибка оплаты»';
$MESS['FAIL_URL_DESC'] = 'Адрес страницы, на которую надо отправить покупателя в случае ошибки платежа. По умолчанию https://secure.futubank.com/fail/';

$MESS['SUCCESS_URL'] = 'Страница «Заказ оплачен»';
$MESS['SUCCESS_URL_DESC'] = 'Адрес страницы, на которую надо отправить покупателя после успешного зачисления. По умолчанию https://secure.futubank.com/success/';

$MESS['MERCHANT_ID'] = 'ID магазина (merchant_id)';
$MESS['MERCHANT_ID_DESCR'] = 'Это значение можно посмотреть в личном кабинете – https://secure.futubank.com';

$MESS['SECRET_KEY'] = 'Секретный ключ (secret_key) магазина';
$MESS['SECRET_KEY_DESCR'] = 'Это значение можно посмотреть в личном кабинете – https://secure.futubank.com';

$MESS['PYM_TITLE'] = 'Вы хотите оплатить через <b>Futubank.com</b> заказ №';
$MESS['PYM_TO_PAY'] = 'Сумма к оплате:';
$MESS['PYM_BUTTON'] = 'Оплатить';

$MESS['PYM_CHANGE_STATUS_PAY'] = 'Автоматически оплачивать заказ при получении успешного статуса оплаты';
$MESS['PYM_CHANGE_STATUS_PAY_DESC'] = 'Y - оплачивать, N - не оплачивать.';

$MESS['PYM_TEST'] = 'Тестовый режим';
$MESS['PYM_TEST_DESC'] = 'Если пустое значение - магазин будет работать в обычном режиме';

?>