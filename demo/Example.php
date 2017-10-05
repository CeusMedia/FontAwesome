<?php
class Example{

	protected $code;
	protected $heading;
	protected $html;
	protected $result;
	protected $subtitle;
	protected $textAbove;
	protected $textBelow;

	public function __construct( $heading, $code, $result, $html ){
		$this->heading	= $heading;
		$this->code		= $code;
		$this->result	= $result;
		$this->html		= $html;
	}

	public function __toString(){
		return $this->render();
	}

	static public function create( $heading, $code, $result, $html ){
		return new static( $heading, $code, $result, $html );
	}

	public function render(){
		$subtitle	= $this->subtitle ? UI_HTML_Tag::create( 'small', $this->subtitle, array( 'class' => 'muted' ) ) : '';
		$heading	= UI_HTML_Tag::create( 'h3', $this->heading.' '.$subtitle );
		$textAbove	= $this->textAbove ? UI_HTML_Tag::create( 'p', $this->textAbove, array() ) : '';
		$textBelow	= $this->textBelow ? UI_HTML_Tag::create( 'p', $this->textBelow, array() ) : '';
		$code		= UI_HTML_Tag::create( 'pre', $this->code );
		$html		= UI_HTML_Tag::create( 'pre', htmlentities( $this->html, ENT_QUOTES, 'UTF-8' ) );
		return UI_HTML_Tag::create( 'div', array(
			$heading,
			UI_HTML_Tag::create( 'div', array(
				$textAbove,
				UI_HTML_Tag::create( 'div', array(
					UI_HTML_Tag::create( 'div', array(
						UI_HTML_Tag::create( 'h4', 'Code' ),
						$code,
					), array( 'class' => 'span8' ) ),
					UI_HTML_Tag::create( 'div', array(
						UI_HTML_Tag::create( 'h4', 'Result' ),
						$this->result,
					), array( 'class' => 'span3 offset1' ) ),
				), array( 'class' => 'row-fluid' ) ),
				UI_HTML_Tag::create( 'h4', 'HTML' ),
				$html,
				$textBelow,
			) ),
		) );
	}

	public function setSubtitle( $subtitle ){
		$this->subtitle	= $subtitle;
		return $this;
	}

	public function setTextAbove( $text ){
		$this->textAbove	= $text;
		return $this;
	}

	public function setTextBelow( $text ){
		$this->textBelow	= $text;
		return $this;
	}
}
?>
