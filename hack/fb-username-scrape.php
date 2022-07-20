<?php
require_once( 'wrapcurl.php' );
$user_agent = 'Mozilla/5.0 (Linux; U; Android 4.0.4; en-ca; SGH-I757M Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30';
$curl = new cURL( true, true, $user_agent ); // follow redirects, store cookies, use the useragent string specified above
$url = 'https://www.flashback.org/login.php';
$data = array(
		'do'         						     =>  'login',
		'url'     						       => '%2Flogin.php',
		'vb_login_md5password'       => 'SET VALID HASH',
		'lvb_login_md5password_utf'  => 'SET VALID HASH',
		'vb_login_username'          => 'SET VALID USER',
		'vb_login_password'				   => '',

		);
$output = "flashback_users.txt";
$fh = fopen($output, 'a');
if($sida = $curl->post( $url, $data))
{
	$url = "https://www.flashback.org/memberlist.php";
	$antal = 7925;
	for($x=0; $x<=$antal; $x++)
	{
		$sida = $curl->get( $url);
		preg_match_all( '/(<a href="\/u.*?<\/a>)/', $sida, $match );
		foreach($match[1] as $t){
			$username = explode( '<a href="/u', $t);
			$u = explode( 'class="bold">', $username[1]);
			$u = explode('</a>',$u[1]);
			$fusr = $u[0] . "\n";
			fwrite($fh, $fusr);
			echo $fusr;

		}      
		$url = 'https://www.flashback.org/memberlist.php?do=getall&page='.$x.'&order=desc&sort=posts';
	}	
}
?>
