<?php
/**
 * Created by PhpStorm.
 * User: kirillmikhaylov
 * Date: 2019-11-11
 * Time: 03:06
 */

namespace app\engine;


use app\interfaces\IRenderer;

class Render implements IRenderer
{
    public function renderTemplate($template, $params = []){
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        if (file_exists($templatePath)){
            include $templatePath;
        }
        return ob_get_clean();
    }
}