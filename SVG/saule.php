<?php 

Class Tag {
	protected $name;
	protected $attributes;

	public function draw() {

		echo '<' . $this->name . ' ';
		foreach ($this->attributes as $key => $value) {
		echo $key . ' = "' . $value . '"';
		}
		 
		echo ' />';

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

class Circle extends Tag {
	public function __construct($width, $height, $r, $x ,$y) {

		$this->name = 'circle';
		$this->attributes = [
			'cx' => $x,
			'cy' => $y,
			'r' => $r,
			'width' => $width,
			'height' => $height,
			'fill' => "yellow"
		];
	}

}

class Polyline extends Tag {
	public function __construct($point1, $point2, $transPoint, $transPointx, $transPointy, $color, $width) {
		$this->name = 'polyline';
		$this->attributes = [
			'points' => $point1->x . ',' . $point1->y . ' ' . $point2->x . ',' . $point2->y,
			'transform' => 'rotate(' . $transPoint . ' ' . $transPointx->x . ',' . $transPointy->y . ')',
			'style' => 'stroke:' . $color . '; stroke-width:' . $width . ';'
		];
	}
}


echo '<svg height="700" width="700">';
$saule = new Circle (200,200,50,300,300);
$saule->draw();

$kampas = 0;
$kiek = 3;
for ($i=1; $i <= $kiek; $i++) { 
	$spindulys[$i] = new Polyline (new Point(250,250), new Point(160,160), $kampas, new Point(300,300), new Point(300,300), 'yellow', 10);
	$spindulys[$i]->draw();
	$laipsnis = 360 / $kiek;
	$kampas = $kampas + $laipsnis;
}

echo '</svg>';