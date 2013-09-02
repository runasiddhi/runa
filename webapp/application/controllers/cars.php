<?php
class Car{
	private $head_light;
	private $tail_light;
	private $wheels;	

	public static function create(){
		$car=new static();
		$car->set_head_light(2);
		$car->set_tail_light(2);
		$car->set_wheels(4);

		return $car;
	}

	public function set_head_light($head_light){
		$this->head_light=$head_light;
	}

	public function set_tail_light($tail_light){
		$this->tail_light=$tail_light;
	}

	public function set_wheels($wheels){
		$this->wheels=$wheels;
	}

	public function get_head_light(){
		return $this->head_light;
	}

	public function get_tail_light(){
		return $this->tail_light;
	}

	public function get_wheels(){
		return $this->wheels;
	}
}

class Hatchback extends car{
	private $length;
    private $color;

    public static function create_hatchback(){
    	$hatchback=new Hatchback();

    	$hatchback=static::create();
    	$hatchback->set_length(30);
    	$hatchback->set_color('red');

    	return $hatchback;
    }

    public function set_length($length){
		$this->length=$length;
	}

	public function set_color($color){
		$this->color=$color;
	}

	public function get_length(){
		return $this->length;
	}

	public function get_color(){
		return $this->color;
	}
}

class Sedan extends car{
	private $seat;
    private $cc;

    public static function create_sedan(){
    	$sedan=new Sedan();

    	$sedan=static::create();
       	$sedan->set_seat(5);
    	$sedan->set_cc(220);

    	return $sedan;
    }

    public function set_seat($seat){
		$this->seat=$seat;
	}

	public function set_cc($cc){
		$this->cc=$cc;
	}

	public function get_seat(){
		return $this->seat;
	}

	public function get_cc(){
		return $this->cc;
	}
}

$hatchback=Hatchback::create_hatchback();
echo $hatchback->get_head_light();
echo $hatchback->get_tail_light();
echo $hatchback->get_wheels();
echo $hatchback->get_length();
echo $hatchback->get_color();

$sedan=Sedan::create_sedan();
echo $sedan->get_head_light();
echo $sedan->get_tail_light();
echo $sedan->get_wheels();
echo $sedan->get_cc();
echo $sedan->get_seat();