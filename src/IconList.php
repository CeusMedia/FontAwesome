<?php
namespace CeusMedia\FontAwesome;
class IconList extends Abstraction\Classified{

	protected $items		= array();

	public function __construct( $items = array(), $classes = array() ){
		$this->setItems( $items );
		if( $classes )
			$this->setClasses( $classes );
	}

	public function addItem( IconListItem $item ){
		$this->items[]	= $item;
		return $this;
	}

	public function render(){
		$classes	= trim( 'fa-ul '.$this->renderClasses() );
		return \UI_HTML_Tag::create( 'ul', $this->items, array( 'class' => $classes ) );
	}

	public function setItems( $items ){
		if( !is_array( $items ) )
			throw new \InvalidArgumentException( 'Items must be an array' );
		$this->items	= array();
		foreach( $items as $item )
			$this->addItem( $item );
		return $this;
	}
}
