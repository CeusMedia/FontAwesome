<?php
namespace CeusMedia\FontAwesome;
class IconListItem extends Abstraction\Iconized{

	public function __construct( $icon, $content, $classes = array() ){
		$this->setIcon( $icon );
		$this->setContent( $content );
		if( $classes )
			$this->setClasses( $classes );
	}

	static public function create( $classes = array() ){
		return new static( $classes );
	}

	public function render(){
		$classes	= $this->renderClasses();
		return \UI_HTML_Tag::create( 'li', $this->icon.$this->content, array( 'class' => $classes ) );
	}

	public function setContent( $content ){
		$this->content	= $content;
		return $this;
	}

	public function setIcon( $icon ){
		parent::setIcon( $icon );
		$this->icon->addClass( 'li' );
		return $this;
	}
}
