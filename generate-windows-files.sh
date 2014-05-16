#!/bin/sh
cat futubank/ru/payment.UTF-8.php | \
    iconv -c -f UTF-8 -t WINDOWS-1251 > \
    futubank/ru/payment.windows-1251.php
