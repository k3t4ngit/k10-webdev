<?php 
class ajax_test
{
	
	function test()
	{
		if ($_GET['test']=="2") {
			echo "hello";
		}
	}
}

$ajax=new ajax_test();
$ajax->test();