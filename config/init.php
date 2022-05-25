<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . "/public");
define("APP", ROOT . "/app");
define("CORE", ROOT . "/vendor/cms");
define("HELPERS", ROOT . "/vendor/cms/helpers");
define("CACHE", ROOT . "/tmp/cache");
define("LOGS", ROOT . "/tmp/logs");
define("CONFIG", ROOT . "/config");
define("LAYOUT", "cms");
define("PATH", "http\\localhost/my-cms");
define("ADMIN", "http\\localhost/my-cms/admin");
define("NO_IMAGE", "uploads/no_image.jpg");

require_once ROOT . '/vendor/autoload.php';