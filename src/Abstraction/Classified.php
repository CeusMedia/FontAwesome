<?php
namespace CeusMedia\FontAwesome\Abstraction;
abstract class Classified extends Renderable{

	protected $classes		= array();
	protected $classPrefix	= 'fa-';

	public function addClass( $class ){
		if( strlen( trim( $class ) ) ){
			$this->classes[]	= $class;
			$this->classes		= array_unique( $this->classes );
		}
		return $this;
	}

	public function addClasses( $classes ){
		if( is_array( $classes ) )
			$classes	= join( ' ', $classes );
		if( !is_string( $classes ) )
			throw new \InvalidArgumentException( 'Given classes must be of array or string' );
		if( !strlen( trim( $classes ) ) )
			throw new \InvalidArgumentException( 'Atleast one class is needed' );
		$classes	= preg_split( "/\s+/", trim( $classes ) );
		foreach( $classes as $class )
			$this->addClass( $class );
		return $this;
	}

	public function getClasses(){
		return $this->classes;
	}

	public function hasClass( $class, $returnIndex = FALSE ){
		if( !is_string( $class ) )
			throw new \InvalidArgumentException( 'Class must be a string' );
		if( !strlen( trim( $class ) ) )
			throw new \InvalidArgumentException( 'Class cannot be empty' );
		$hasClass	= in_array( $class, $this->classes );
		if( $returnIndex )
			return $hasClass ? array_search( $class, $this->classes ) : -1;
		return $hasClass;
	}

	public function removeClass( $class ){
		$index	= $this->hasClass( $class, TRUE );
		if( $index >= 0 )
			unset( $this->classes[$index] );
		return $this;
	}

	protected function renderClasses(){
		if( !$this->classes )
			return NULL;
		$list	= array();
		foreach( $this->classes as $class )
			$list[]	= $this->classPrefix.$class;
		return join( ' ', $list );
	}

	public function setClasses( $classes, $keepBeforeSet = FALSE ){
		if( !$keepBeforeSet )
			$this->classes		= array();
		return $this->addClasses( $classes );
	}

}
?>
