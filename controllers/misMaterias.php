<?php
  // Plantilla de creación de un controlador por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/Materia.php';
  require_once '../model/Usuario.php';
  require_once '../model/driver.php';
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita


  //Conexion a la BD
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $rendermistit = new TemplateEngine();
  $titulaciones = new Titulacion($db);
  $usuario = new Usuario($db);
  $usuario = $usuario->findBy('user_name',$_SESSION['name']);
  $misMaterias = $usuario[0]->materias();
  $allMaterias = $materias->all();

  $rendermistit->misMaterias = $misMaterias;
  $rendermistit->allMaterias= $allMaterias;
  $renderMain->title = "Mis materias"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $rendermistit->render('misMaterias_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
