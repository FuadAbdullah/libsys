<?php


function randomHex() 
{
  $_hexcode = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', "C", 'D', 'E', 'F');
  $_color = '#' . $_hexcode[rand(0,15)] . $_hexcode[rand(0,15)] . $_hexcode[rand(0,15)] . $_hexcode[rand(0,15)] . $_hexcode[rand(0,15)] . $_hexcode[rand(0,15)];
  return $_color;
}


?>