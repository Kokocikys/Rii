<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
$app->header();
Page::getInstance()->setProperty('Title', "История изменений");
?>

<h2>История изменений проекта:</h2>
<?php
$app->includeComponent("rii:element.list", "default", ['sort' => ['date' => 'desc'], 'limit' => 5, 'data_type' => 'json', 'data_file' => '/upload/history.json']);
?>

<? Application::getInstance()->footer(); ?>