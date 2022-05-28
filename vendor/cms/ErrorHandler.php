<?php

namespace cms;

use Throwable;

class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this,'exceptionHandler']);
    }

    public function exceptionHandler(Throwable $e)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->desplayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }
    
    protected function logError($message = '', $file = '', $line = '')
    {
        file_put_contents(LOGS . '/errors.log', "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n========\n", FILE_APPEND);
    }

    protected function desplayError($errno, $errstr, $errfile, $errline, $responce = 500)
    {
        if($responce == 0) {
            $responce = 404;
        }
        http_response_code($responce);

        if($responce == 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG) {
            require WWW . '/errors/development.php';
        } else {
            require WWW . '/errors/production.php';
        }
        die;
    }
}