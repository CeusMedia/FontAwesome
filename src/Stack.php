<?php
namespace CeusMedia\FontAwesome;
class Stack extends Abstraction\Classified{

	protected $icons		= array();

	public function __construct( $icons = array(), $classes = array() ){
		$this->setIcons( $icons );
		$this->setClasses( $classes );
	}

	public function addIcon( $icon ){
		if( is_array( $icon ) || is_string( $icon ) )
			$icon	= new Icon( $icon );
		if( !( $icon instanceof Icon ) ){
			if( is_object( $icon ) )
				throw new \RuntimeException( ' Handling of '.( get_class( $icon ) ).' is not implemented' );
			throw new \RuntimeException( ' Handling of '.( gettype( $icon ) ).' is not implemented' );
		}
		$key	= join( '_', $icon->getClasses() );
		$this->icons[$key]	= $icon;
	}

	static public function create( $icons = array(), $classes = array() ){
		return new static( $icons, $classes );
	}

	public function getIcons(){
		return $this->icons;
	}

	public function render(){
		$list	= array();
		foreach( array_values( $this->icons ) as $nr => $icon ){
			$clone	= clone( $icon );
			$size	= 'stack-'.( $nr + 1 ).'x';
			$list[]	= $clone->addClass( $size )->render();
		}
		$classes	= trim( 'fa-stack '.$this->renderClasses() );
		return \UI_HTML_Tag::create( 'span', $list, array( 'class' => $classes ) );
	}

	public function setIcons( $icons = array(), $keepBeforeSet = FALSE ){
		if( !$keepBeforeSet )
			$this->icons	= array();
		foreach( $icons as $icon )
			$this->addIcon( $icon );
		return $this;
	}
}
?>
