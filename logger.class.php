<?php
	class Logger{
		public static function log($message = ''){
			date_default_timezone_set('America/Sao_Paulo');
			$logFile = fopen('error.log', 'a');
			$message = date('[d/m/Y] h:i:s - ') . $message ."\r\n";
			fwrite($logFile, $message);
		}
	}
?>