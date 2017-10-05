<?php
class App{

	protected $examples			= array();

	public function addExample( Example $example ){
		$this->examples[]	= $example;
		return $this;
	}

	public function display(){
		$examples	= join( UI_HTML_Tag::create( 'hr' ), $this->examples );
		print( $this->renderPage( $examples ) );
		exit;
	}

	protected function renderPage( $content ){
		$body	= UI_HTML_Tag::create( 'div', array(
			UI_HTML_Tag::create( 'div', array(
				UI_HTML_Tag::create( 'h2', array(
					UI_HTML_Tag::create( 'span', 'Ceus Media ', array( 'class' => 'muted' ) ),
					UI_HTML_Tag::create( 'u', 'Font Awesome', array( 'class' => '' ) ),
					UI_HTML_Tag::create( 'span', ' Demo ', array( 'class' => '' ) ),
				) ),
			), array( 'class' => 'hero-unit' ) ),
			$content,
		), array( 'class' => 'container' ) );

		$page	= new \UI_HTML_PageFrame();
		$page->setTitle( 'Demo - Font Awesome - Ceus Media' );
		$page->addStylesheet( 'https://cdn.ceusmedia.de/css/bootstrap.min.css' );
		$page->addStylesheet( 'https://cdn.ceusmedia.de/fonts/FontAwesome/font-awesome.min.css' );
		$page->addBody( $body );
		return $page->build();
	}
}
