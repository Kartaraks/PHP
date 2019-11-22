<?php


namespace app\controller;

use app\interfaces\IRenderer;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;

class Controller implements IRenderer
{
    private $action;
    private $defaultAction = "index";
    private $layout = "main";
    private $useLayout = true;
    private $renderer;


    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null){
        $this->action = $action ? : $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this,$method)){
            $this->$method();
        } else {
            echo "404 action";
        }
    }

    public function render($template, $params = []){
        if ($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}", [
                'auth' => (new UserRepository())->isAuth(),
                'username' => 'admin',
                'menu' => $this->renderTemplate('menu',
                    ['count' => (new BasketRepository())->processingRequestGetCount()]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params = []);
        }
    }

    public function renderTemplate($template, $params = []){
        return $this->renderer->renderTemplate($template, $params);
    }


}