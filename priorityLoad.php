
<?php

//This code is written to load priority information without the need to populate the database first
//Will be using for loop and switch case

for ($inc = 1;$inc<=5;$inc++)
{
	switch($inc)
	{
		case 1:
		$desc = "Purple [14 days borrowing duration]";
		break;
		case 2:
		$desc = "Indigo [10 days borrowing duration]";
		break;
		case 3:
		$desc = "Blue   [7 days borrowing duration]";
		break;
		case 4:
		$desc = "Green [5 days borrowing duration]";
		break;
		case 5:
		$desc = "Yellow [3 days borrowing duration]";
		break;
		default:
		$desc = "Unknown priority value!";
	}
	if ($inc == $bk_priority)
		{
			echo '<option value="'. $inc .'" selected="" >'. $desc .'</option>';
		}
		else
		{
			echo '<option value="'. $inc .'">'. $desc .'</option>';
	}
}

?>
