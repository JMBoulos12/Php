



/*
  # Instructions  :
  Determine if a triangle is equilateral, isosceles, or scalene.

  An equilateral triangle has all three sides the same length.

  An isosceles triangle has at least two sides the same length. 
  (It is sometimes specified as having exactly two sides the same length, but for the purposes of this exercise we'll say at least two.)

  A scalene triangle has all sides of different lengths.

  # Note  :
  For a shape to be a triangle at all, all sides have to be of length > 0, 
  and the sum of the lengths of any two sides must be greater than or equal to the length of the third side. See Triangle Inequality.

  # Dig Deeper  :
  The case where the sum of the lengths of two sides equals that of the third is known as a degenerate triangle - it has zero area and looks like a single line. 
  Feel free to add your own code/tests to check for degenerate triangles.
  
  31-March-2023
*/


<?php
class Triangle {
	function __construct($a, $b, $c) {
		$array = [$a, $b, $c];
		sort($array);
		list($this->a, $this->b, $this->c) = $array;
	}
	public function kind() {
		if($this->_no_size() || $this->_is_triangle_inequility()) {
			throw new Exception();
		}
		if($this->_is_equilateral()) {
			return 'equilateral';
		}
		if($this->_is_isosceles()) {
			return 'isosceles';
		}
		return 'scalene';
	}
	private function _no_size() {
		return $this->a === 0 && $this->c === 0;
	}
	private function _is_triangle_inequility() {
		return $this->a +$this->b <= $this->c;
	}
	private function _is_equilateral() {
		return $this->a === $this->b && $this->b === $this->c;
	}
	private function _is_isosceles() {
		return $this->a === $this->b || $this->b === $this->c;
	}
	private function _is_scalene() {
		return $this->a !== $this->b && $this->b !== $this->c;
	}
}
