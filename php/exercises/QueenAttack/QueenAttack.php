<?php
declare(strict_types=1);

class QueenAttack
{
    /**
     * @throws InvalidArgumentException
     */
    public function placeQueen(int $i, int $j): bool
    {
		if(1 <= $i && $i <= 8 && 1 <= $j && $j <= 8)
			return true;
		else 
			throw new Exception('InvalidArgumentException');
    }

    /**
     * @param  int[]  $white  Coordinates of the white Queen
     * @param  int[]  $black  Coordinates of the black Queen
     * @throws InvalidArgumentException
     */
    public function canAttack(array $white, array $black): bool
    {
		if ($this->placeQueen($white[0],$white[1]) && $this->placeQueen($black[0],$black[1])) {
			if ($white[0]==$black[0] || $white[1]==$black[1] || $white[0]+$white[1]== $black[0]+$black[1] || $white[0]-$white[1] == $black[0]-$black[1])
				return true;
			else 
				return false;
		}
		
    }
}
