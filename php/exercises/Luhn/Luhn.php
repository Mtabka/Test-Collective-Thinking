<?php
declare(strict_types=1);

class Luhn
{
    public function isValid(string $str): bool
    {
		$str = preg_replace('/\s+/', '', $str);
		$len = strlen($str);
		if ($len>1) {
			if ( is_numeric($str) ) {
				$str = str_split($str);
				for($i=$len-1; $i>0; $i--) {
					if($i%2==0){
						$number = (int) $str[$i];
						$number = $number * 2;
						if($number>9)
							$number -= 9;
						$str[$i] = $number;
					}
				}
				$sum = array_sum($str);
				if ($sum% 10 == 0)
					return true;
				else 
					return false;
			} else {
				return false;
			}
		} else {
			return false;
		}
    }
}
