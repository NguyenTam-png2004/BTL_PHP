
<?php
$clientControllers = array(
  'SignUser' => ['SignIn', 'SignUp','ViewLogin', 'Logout', 'handleGoogleCallback'],
  'Home'=>['HomeLogout', 'HomeLogin', 'ReviewGrammar', 'ReviewVocabulary', 'FilterVocab','ViewGrammar'],
  'Study'=>['CheckAnswers', 'CheckVocab', 'Study', 'StudyAgain', 'Review', 'ViewFinished1', 'ViewFinished2'],
  'Profile'=>['ViewProfile', 'ViewSetting', 'Update', 'Delete']
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.


if ($role === '0') {
  header('Location: admin/index.php?act=home');
} else {
  $controllers = $clientControllers;
  $controllerPath = 'client/controller/';
}

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'Error';
  $action = 'notFound';
  $controllerPath = 'controller/error/';
}
$controller = str_replace(' ', '', ucwords(mb_strtolower($controller))) . 'Controller';
$controllerFile = "{$controllerPath}{$controller}.php";
if (file_exists($controllerFile)) {
    include_once($controllerFile);
} else {
    die("Controller file not found: {$controllerFile}");
}

// Định dạng action và gọi action
$action = str_replace(' ', '', ucwords(mb_strtolower($action)));
$controller = new $controller;
$controller->$action();
?>