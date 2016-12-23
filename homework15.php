<?php

echo 'Homework 15 MVC';


class Model
{
    public $string;

    public function __construct(){
        $this->string = "MVC + PHP = Awesome, click here!";
    }
}

class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }
	
    public function output(){
        return "<p><a href='mvc.php?action=clicked'" . $this->model->string . "</a></p>";
    }
}

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }
}

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
}

echo $view->output();


$page = $_GET['page'];
if (!empty($page)) {

    $data = array(
        'about' => array('model' => 'AboutModel', 'view' => 'AboutView', 'controller' => 'AboutController'),
        'portfolio' => array('model' => 'PortfolioModel', 'view' => 'PortfolioView', 'controller' => 'PortfolioController')
    );

    foreach($data as $key => $components){
        if ($page == $key) {
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            break;
        }
    }

    if (isset($model)) {
        $m = new $model();
        $c = new $controller($model);
        $v = new $view($model);
        echo $v->output();
    }
}

$model = $_GET['model'];
$view = $_GET['view'];
$controller = $_GET['controller'];
$action = $_GET['action'];

if (!(empty($model) || empty($view) || empty($controller) || empty($action))) {
    $m = new $model();
    $c = new $controller($m, $action);
    $v = new $view($m);
    echo $v->output();
}

class Model2
{
    public $tstring;

    public function __construct(){
        $this->tstring = "The string has been loaded through the template.";
        $this->template = "tpl/template.php";
    }
}

class View2
{
    private $model;

    public function __construct($model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output(){
        $data = "<p>" . $this->model->tstring ."</p>";
        require_once($this->model->template);
    }
}


?>

<html>
 <head>
  <meta charset="charset=utf-8">
  <title>The Template name</title>
 </head>
 <body>
  <h1><?php echo $data; ?></h1>
 </body>
</html>