<?php

if(PHP_MAJOR_VERSION < 7) {
    die("Необходимо установить версию php >= 8");
}

require_once dirname(__DIR__) . '/config/init.php';

echo "Test";