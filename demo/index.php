<?php
(@include '../vendor/autoload.php') or die('Please use composer to install required packages.' . PHP_EOL);
new UI_DevOutput;

use CeusMedia\FontAwesome\Icon;
use CeusMedia\FontAwesome\Spin;
use CeusMedia\FontAwesome\Stack;
use CeusMedia\FontAwesome\Link;
use CeusMedia\FontAwesome\LinkGroup;
use CeusMedia\FontAwesome\IconList;
use CeusMedia\FontAwesome\IconListItem;

require_once 'Example.php';
require_once 'App.php';

$app	= new App();

$examples	= array();

/*  --  EXAMPLE 1: Icon  --  */
$heading	= 'Icon ';
$subtitle	= 'the simplest objective way';
$result		= new Icon( 'check 4x' );
$code		= '
use CeusMedia\FontAwesome\Icon;
print new Icon( \'check 4x\' );';
$app->addExample( Example::create( $heading, $code, $result, $result )
	->setSubtitle( $subtitle )
);

/*  --  EXAMPLE 2: Flipped Icon  --  */
$result	= new Icon( 'universal-access 4x' );
$result->flip( Icon::FLIP_VERTICAL );
$code	= '
use CeusMedia\FontAwesome\Icon;
$icon = new Icon( \'universal-access 4x\' );
$icon->flip( Icon::FLIP_VERTICAL );
print $icon;';
$app->addExample( Example::create( 'Flipped Icon', $code, $result, $result ) );

/*  --  EXAMPLE 2: Link Group  --  */
$result	= new LinkGroup( array(
	new Link( 'arrow-left', '#', "Backwards" ),
	new Link( 'arrow-right', '#', "Forwards" ),
) );
$code	= '
use CeusMedia\FontAwesome\Link;
use CeusMedia\FontAwesome\LinkGroup;
new LinkGroup( array(
	new Link( \'arrow-left\', \'#\', "Backwards" ),
	new Link( \'arrow-right\', \'#\', "Forwards" ),
) );';
$app->addExample( Example::create( 'Link Group', $code, $result, $result ) );

/*  --  EXAMPLE 2: Iconic Link  --  */
$result	= new Link( 'arrow-right', '#', 'Link Label', array( 'class' => 'btn' ) );
$code	= '
use CeusMedia\FontAwesome\Link;
print new Link( \'arrow-right 4x\', \'#\', \'Link Label\' );';
$app->addExample( Example::create( 'Iconic Link', $code, $result, $result ) );

/*  --  EXAMPLE 3: Spinning Icon  --  */
$result	= new Spin( 'cog 5x' );
$code	= '
use CeusMedia\FontAwesome\Spin;
$icon = new Spin( \'cog 5x\' );
print $icon;';
$app->addExample( Example::create( 'Spinning Icon', $code, $result, $result ) );

/*  --  EXAMPLE 4: Stacked Icons  --  */
$result	= new Stack( array(
	new Icon( 'check' ),
	new Icon( 'circle-thin' ),
), array( '4x' ) );
$code	= '
use CeusMedia\FontAwesome\Icon;
use CeusMedia\FontAwesome\Stack;
$icon = new Stack( array(
	new Icon( \'check\' ),
	new Icon( \'circle-thin\' ),
), array( \'4x\' ) );
print $icon;';
$html	= str_replace( array( '><i', '></s' ), array( ">\r\n\t<i", ">\r\n</s" ), $result );
$app->addExample( Example::create( 'Icon Stack', $code, $result, $html ) );

/*  --  EXAMPLE 5: Iconized List  --  */
$result	= new IconList( array(
	new IconListItem( 'check', 'Content 1' ),
	new IconListItem( 'remove', 'Content 2' ),
	new IconListItem( 'trash', 'Content 3' ),
) );
$code	= '
use CeusMedia\FontAwesome\IconList;
use CeusMedia\FontAwesome\IconListItem;
$list = new IconList( array(
	new IconListItem( \'check\', "Content 1" ),
	new IconListItem( \'remove\', "Content 2" ),
	new IconListItem( \'trash\', "Content 3" ),
) );
print $list;';
$html	= str_replace( array( '><li', '></u' ), array( ">\r\n\t<li", ">\r\n</u" ), $result );
$app->addExample( Example::create( 'Icon List', $code, $result, $html ) );


/*  --  EXAMPLE 2: Static Icon  --  */
$result	= Icon::create( 'paper-plane 4x' );
$code	= '
use CeusMedia\FontAwesome\Icon;
print Icon::create( \'paper-plane 4x\' );';
$app->addExample( Example::create( 'Icon, the static way', $code, $result, $result ) );



$app->display();
