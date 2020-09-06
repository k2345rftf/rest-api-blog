<?php


namespace Core\Source\View;


class View
{

    public function render($template, array $param){
        $templatePath = ROOT . '/pages/' . $template . '.php';
//        echo $templatePath;
        if(!is_file($templatePath)){
            throw new \InvalidArgumentException(sprintf('File not found!!! '));
        }
        extract($param);
        ob_start();
        ob_implicit_flush(0);

        try{
            require $templatePath;
        }catch(\ErrorException $e){
            ob_end_clean();
            throw  $e;
        }

        echo ob_get_clean();

    }
}