<?php
namespace CeusMedia\FontAwesome\Abstraction;
use CeusMedia\FontAwesome\Icon;
abstract class Iconized extends Classified{

	public function addIconClass( $class ){
		$this->icon->addClass( $class );
		return $this;
	}

	public function setIcon( $icon ){
		if( !( $icon instanceof Icon ) )
			$icon	= new Icon( $icon );
		$this->icon	= $icon;
		return $this;
	}

	public function setIconClasses( $classes ){
		$this->setIcon( $classes );
		return $this;
	}
}
