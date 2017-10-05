<?php
namespace CeusMedia\FontAwesome;
class LinkGroup extends Abstraction\Classified{

	protected $classPrefix	= '';
	protected $items;

	public function __construct( $items = array(), $classes = array() ){
		$this->setItems( $items );
		if( $classes )
			$this->setClasses( $classes );
	}

	public function addItem( Link $item ){
		$this->items[]	= $item;
		return $this;
	}

	static public function create( $items, $classes = array() ){
		return new static( $items, $classes );
	}

	public function render(){
		$list	= array();
		foreach( $this->items as $item ){
			$item->addClass( 'list-group-item' );
			$list[]	= $item;
		}
		return \UI_HTML_Tag::create( 'div', $list, array( 'class' => 'list-group' ) );
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
?>
