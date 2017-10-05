<?php
namespace CeusMedia\FontAwesome;
class Icon extends Abstraction\Classified{

	const FLIP_HORIZONTAL		= 1;
	const FLIP_VERTICAL			= 2;

	public function __construct( $classes = array() ){
		$this->setClasses( $classes );
	}

	static public function create( $classes = array() ){
		return new static( $classes );
	}

	public function flip( $mode ){
		if( $mode & static::FLIP_HORIZONTAL ){
			$class	= 'flip-horizontal';
			$method	= $this->hasClass( $class ) ? 'removeClass' : 'addClass';
			$this->{$method}( $class );
		}
		if( $mode & static::FLIP_VERTICAL ){
			$class	= 'flip-vertical';
			$method	= $this->hasClass( $class ) ? 'removeClass' : 'addClass';
			$this->{$method}( $class );
		}
		return $this;
	}

	public function render(){
		return \UI_HTML_Tag::create( 'i', '', array(
			'class'	=> trim( 'fa '.$this->renderClasses() ),
		) );
	}
}
?>
