<?php

class Router {

  public function RouterUrl() {

    if(isset($_GET['url'])) {

      if(empty($_GET['url'])) {
        // url ada namun tidak ada nilai
        include_once 'Controller/ErrorController.php';
      } else {
        // url bernilai
        $controllerFile = 'Controller/'.ucfirst($_GET['url']).'Controller.php';

        if(file_exists($controllerFile)) {
          // File controller ada
          include_once $controllerFile;
        } else {
          // File controller tidak ada
          include_once 'Controller/ErrorController.php';
        }
      }
    } else {
      // Tidak terset get url
      include_once 'Controller/IndexController.php';
    }
  }
}
?>
