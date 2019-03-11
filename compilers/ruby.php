<?php
//putenv("C:\Ruby25-x64\bin");
	$CC="ruby";
	$out="ruby test.rb";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="test.rb";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="test.rb";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;

	if(trim($code)=="")
	die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($command);
		}
		else
		{
			$command=$command." < ".$filename_in;
			$output=shell_exec($command);
		}
		echo "$output";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
	exec("del $filename_code");
	exec("del *.txt");
?>
