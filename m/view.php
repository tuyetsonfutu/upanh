<?php

include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);
$postfolder = $config['postfolder'];
$SID = $_SESSION['USERID'];
$pid = intval(cleanit($_REQUEST['pid']));
if($pid > 0)
{
	$query = "SELECT * FROM posts WHERE active='1' AND PID='".mysql_real_escape_string($pid)."' limit 1";
	$executequery = $conn->execute($query);
	$parray = $executequery->getarray();
	$querypid = $pid;

$querya = "SELECT count(*) as favorited FROM posts_favorited WHERE USERID=$SID AND PID=$querypid";
$executequerya = $conn->Execute($querya);
$queryb = "SELECT count(*) as unfavorited FROM posts_unfavorited WHERE USERID=$SID AND PID=$querypid";
$executequeryb = $conn->Execute($queryb);
$parray[0]['favorited'] = $executequerya->fields['favorited'];
$parray[0]['unfavorited'] = $executequeryb->fields['unfavorited'];
	
	$eurl = base64_encode($postfolder.$pid);
	STemplate::assign('eurl',$eurl);
	STemplate::assign('p',$parray[0]);	
	$templateselect = "view.tpl";
	$pagetitle = stripslashes($parray[0]['story']);
	STemplate::assign('pagetitle',$pagetitle);
}
//TEMPLATES BEGIN
STemplate::setTplDir($config['mobiledir']."/themes");
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>