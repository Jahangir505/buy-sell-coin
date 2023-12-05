<?php
function formateAmount($amount = 0)
{
   return  str_replace(',','',$amount);
}
function showAmount($amount = 0)
{
   return  number_format($amount,2);
}
function flash($message, $level = 'info'){
	session()->flash('flash_message', $message);
	session()->flash('flash_message_level', $level);
}