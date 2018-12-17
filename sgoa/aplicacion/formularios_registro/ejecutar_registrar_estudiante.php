
<?php
class StopWatch {
	/**
	* @var $startTimes array The start times of the StopWatches
	*/
	private static $startTimes = array();
	/**
	* Start the timer
	*
	* @param $timerName string The name of the timer
	* @return void
	*/
	public static function start($timerName = 'default') {
		self::$startTimes[$timerName] = microtime(true);
	}
	/**
	* Get the elapsed time in seconds
	*
	* @param $timerName string The name of the timer to start
	* @return float The elapsed time since start() was called
	*/
	public static function elapsed($timerName = 'default') {
		return microtime(true) - self::$startTimes[$timerName];
	}
}

require '../../aplicacion/clases_negocio/funciones_oa_estudiante.php';

$cedula = filter_input(INPUT_POST, 'cedula');
$nombres = filter_input(INPUT_POST, 'nombres');
$apellidos = filter_input(INPUT_POST, 'apellidos');
$email = filter_input(INPUT_POST, 'email');
$carrera = filter_input(INPUT_POST, 'carrera');
$facultad = filter_input(INPUT_POST, 'facultad');
$usuario = filter_input(INPUT_POST, 'usuario');
$contrasenia = filter_input(INPUT_POST, 'contrasenia');
StopWatch::start();
insertar_usuario($usuario, $contrasenia,'EST', 'V');
$id_usuario= recuperar_id_usuario_por_nombre($usuario);
if(insertar_estudiante($cedula, $nombres, $apellidos, $carrera, $facultad, $email, $id_usuario)){
     echo "<script>alert(Usuario registrado correctamente! Puede ingresar al sistema)</script>";
	//header( 'Location: ../../index2.php' );
      //return;
 echo "<script>location.href='Login.php'</script>";
}else{
    echo '<script>alert("No se ha podido registrar el usuario. Contacte a un administrador")</script> ';
    echo "<script>location.href='Login.php'</script>";
}
      

 
?>
