<?php

class Brackets {
	

	public function analysis($value)
	{
		$symbols = [')', '(', "\n", "\r", "\t", ' '];
		$len = strlen($value);
		$result = [];

		for($i = 0; $i < $len; $i++) {
			if (!in_array($value[$i], $symbols)) {
				throw new InvalidArgumentException('Переданы неправильные параметры');
			}

			if ($value[$i] == $symbols[1]) {
				array_push($result, $value[$i]);
			}

			if ($value[$i] == $symbols[0] && end($result) == $symbols[1]) {
				array_pop($result);
			} elseif ($value[$i] == $symbols[0] && end($result) != $symbols[1]) {
				array_push($result, $value[$i]);
			} 
		}

		if(!$result) {
			return true;
		} 

		return false;
	}
}