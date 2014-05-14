bitrix-futupayments
===================

Bitrix-модуль для приёма оплаты с пластиковых карт через Futubank.com

Установка на сервер
===================

Скачайте и распакуйте архив: 

    https://github.com/Futubank/bitrix-futupayments/archive/master.zip

Скопируйте каталог futubank из архива:

  * в каталог www/bitrix/modules/sale/payment для Linux-систем 
  * или в C:\Program Files\BitrixEnvironment\www\bitrix\modules\sale\payment для Windows

Базовая настройка
=================

В панели администрирования BITRIX на вкладке «Администрирование» выберите раздел «Магазин» -> «Настройки» -> «Платежные системы» и нажмите кнопку «Добавить платежную систему»:

   ![Добавить платежную систему](http://raw.githubusercontent.com/Futubank/futubank/master/static/bitrix/add-ps.png)

Заполните форму «Параметры платежной системы»:
   
   ![Параметры платёжной системы](http://raw.githubusercontent.com/Futubank/futubank/master/static/bitrix/ps-params.png)

   * название: Futubank.com
   * активность: отмечено
   * сортировка: 1
   * описание: «Оплата банковской картой через Futubank.com»

Нажимте кнопку «Применить» и перейдите на вкладку «Типы плательщиков» -> «Физическое лицо».
Заполните основные поля формы «Обработчик для типа плательщика»:

   ![Физическое лицо](http://raw.githubusercontent.com/Futubank/futubank/master/static/bitrix/ph1.png)

   * применяется для данного типа плательщика: отмечено
   * название: Futubank.com
   * обработчик: Futubank.com (futubank)
   * кодировка: utf-8

Чуть ниже, в разделе «Свойства обработчика» укажите merchant_id и secret_key:

   ![merchant_id и secret_key](http://raw.githubusercontent.com/Futubank/futubank/master/static/bitrix/ph2.png)

Эти значения уникальны для каждого магазина, посмотреть их можно в личном кабинете Futubank (https://secure.futubank.com) в разделе «Готовые модули»:

   ![merchant_id и secret_key](http://raw.githubusercontent.com/Futubank/futubank/master/static/bitrix/mods.png)

Можно указать адреса страниц, которые будут показываться в случае успешного и неуспешного платежа:

   ![success_url и fail_url](http://raw.githubusercontent.com/Futubank/futubank/master/static/bitrix/urls.png)

Настройка уведомлений об оплате
===============================

