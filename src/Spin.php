<?php
namespace CeusMedia\FontAwesome;
class Spin extends Icon{

	public function render(){
		$this->addClass( 'spin' );
		return parent::render();
	}
}
?>
