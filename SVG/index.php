<?php 

class Tag {
	protected $name;
	protected $attributes;

	public function draw() {

		echo '<' . $this->name;
		foreach ($this->attributes as $key => $value) {
			echo ' ' . $key . ' = "' . $value . '" ';
		}
		echo '/>';
	}
}

class Rectangle extends Tag {
	public function __construct($width, $height, $x ,$y) {

		$this->name = 'rect';
		$this->attributes = [
			'x' => $x,
			'y' => $y,
			'width' => $width,
			'height' => $height
		];
	}

}

class Circle extends Tag {
	public function __construct($width, $height, $r, $x ,$y) {

		$this->name = 'circle';
		$this->attributes = [
			'cx' => $x,
			'cy' => $y,
			'r' => $r,
			'width' => $width,
			'height' => $height,
			'fill' => "red"
		];
	}

}

class Point {
	public $x;
	public $y;

	public function __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}
}

class Poly extends Tag {
	public function __construct($point1, $point2, $point3) {

		$this->name = 'polygon';
		$this->attributes = [
			'points' => $point1->x . ',' . $point1->y . ' ' . $point2->x . ',' . $point2->y . ' ' . $point3->x . ',' . $point3->y,
			'fill' => 'black',
		];
	}

}


class Trapecija {

	public function __construct($x, $y, $a, $b, $h) {

		$rect_width = $b - $x*2;
		$rect_y = $y - $x;

		$poly_x = $x + $b;

		echo '<svg width="1500" height="1200">';
		$rect = new Rectangle($rect_width, $h, $a, $rect_y);
		$rect->draw();


		$poly = new Poly(new Point($x,$y), new Point($a,$rect_y), new Point($a,$y));
		$poly->draw();

		$poly2 = new Poly(new Point($poly_x,$y), new Point($b,$rect_y), new Point($b,$y));
		$poly2->draw();

		echo '</svg>';

}

}

$trapec = new Trapecija(189, 320, 380, 500, 189);





