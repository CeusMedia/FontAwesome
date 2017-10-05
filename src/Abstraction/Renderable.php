<?php
namespace CeusMedia\FontAwesome\Abstraction;
abstract class Renderable{

	public function __toString(){
		return $this->render();
	}

	abstract public function render();
}
?>
