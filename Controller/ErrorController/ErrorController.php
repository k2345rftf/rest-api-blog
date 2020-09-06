<?php

namespace Controller\ErrorController;

use Core\AbstractController;

class ErrorController extends AbstractController
{

    public function page404(){
        http_response_code(404);
        echo '<pre>','404 not found','</pre>';
    }
}