<?php
namespace CeusMedia\FontAwesome;
class Link extends Abstraction\Iconized{

	protected $label;
	protected $classPrefix	= '';

	public function __construct( $icon, $url, $label = NULL, $attributes = array() ){
		$this->setIcon( $icon );
		$this->tag	= new \UI_HTML_Tag( 'a', '', array( 'href' => $url ) );
		if( $label !== NULL && strlen( trim( $label ) ) )
			$this->setLabel( $label );
		$this->tag->setAttributes( $attributes );
	}

	static public function create( $icon, $url, $label = NULL, $attributes = array() ){
		return new static( $icon, $url, $label, $attributes );
	}

	public function render(){
		$this->tag->setContent( $this->icon.'&nbsp;'.$this->label );
		$this->tag->setAttribute( 'class', $this->renderClasses(), FALSE );
		return $this->tag->render();
	}

	public function setLabel( $label ){
		$this->label		= $label;
		return $this;
	}

	public function setUrl( $url ){
		$this->tag->setAttribute( 'href', $url );
		return $this;
	}

	public function setTarget( $target ){
		$this->tag->setAttribute( 'target', $target );
		return $this;
	}
}
?>
