<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="vi">

<head>
  <title>Cài Đặt Gag Việt của DEUVL.NET</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="green">

<center><h1>Cài Đặt Gag Việt của DEUVL.NET</h1></center>

<table border="0">
<form action="" method="post" name="install" id="install">

<tr>
<td>
	Đường đẫn đến thư mục chứa mã nguồn:
</td>
<td>
    <input size="20" name="basedir" type="text" id="basedir" value="">
</td>
<td>
	(ví dụ: /home/username/public_html) các bạn chạy file tendomain.com/path.php để lấy link này nhé nếu up vào thư mục nào đó thì chạy tendomain.com/ten-thu-muc/path.php để lấy link
</td>
</tr>

<tr>
<td>
	Liên kết đến thư mục chứa mã nguồn:
</td>
<td>
    <input size="20" name="baseurl" type="text" id="baseurl" value="http://deuvl.net">
</td>
<td>
    (ví dụ: http://yourdomain.com nêu up vào 1 thư mục nào đó trên host thì bạn điền http://yourdomain.com/ten-thu-muc )
</td>
</tr>

<tr>
<td>
	Domain website:
</td>
<td>
    <input size="20" name="domain" type="text" id="domain" value="deuvl.net">
</td>
<td>
    (ví dụ: yourdomain.com) - up vào thư mục nào cũng để tên domain thôi bạn nhé
</td>
</tr>

<tr>
<td>
    Mã đăng ký:
</td>
<td>
    <input size="20" name="license" type="text" id="license" value="15a9bd52-38045634-77d4a4e4-21a221d6">
</td>
</tr>

<tr>
<td>
	Tên thư mục chứa mã nguồn:
</td>
<td>
    <input size="20" name="namedir" type="text" id="namedir" value="">
</td>
<td>
    (Để trống nếu mã nguồn nằm ở thư mục gốc)
</td>
</tr>

<tr>
<td>
    Tên máy chủ cơ sở dữ liệu:
</td>
<td>
    <input size="20" name="dbhost" type="text" id="dbhost" value="localhost">
</td>
</tr>

<tr>
<td>
	Tên đăng nhập cơ sở dữ liệu:
</td>
<td>
    <input size="20" name="dbuser" type="text" id="dbuser">
</td>
</tr>

<tr>
<td>
	Mật khẩu kết nối cơ sở dữ liệu:
</td>
<td>
    <input size="20" name="dbpassword" type="password" id="dbpassword">
</td>
</tr>

<tr>
<td>
	Tên cơ sở dữ liệu:
</td>
<td>
	<input size="20" name="dbname" type="text" id="dbname">
</td>
</tr>

<tr>
<td>
	Tài khoản quản trị viên:
</td>
<td>
	<input size="20" name="adm_name" type="text" id="adm_name" value="Admin">
</td>
</tr>

<tr>
<td>
	E-mail quản trị viên:
</td>
<td>
	<input size="20" name="adm_mail" type="text" id="adm_mail" value="ceo.adsviet@gmail.com">
</td>
</tr>

<tr>
<td>
	Mật khẩu quản trị viên:
</td>
<td>
	<input size="20" name="adm_pass" type="password" id="adm_pass">
</td>
</tr>

<td>
<p><input type="submit" name="submit" value="Cài đặt"></p>
</td>

</form>
</table>

<p><font color="red"><b>*Chú ý: bạn cần nhập chính xác các thông tin phía trên nếu không hệ thống sẽ bị lỗi mặc dù cài đặt thành công!!!</b></font></p>

<div class="ketqua">
<b>-----Chi tiết cài đặt-----</b><br />

<?php

/////////////////////////
//Hàm tạo cơ sở dữ liệu//
/////////////////////////

function SplitSQL($file, $delimiter = ';')
{
    set_time_limit(0);

    if (is_file($file) === true)
    {
        $file = fopen($file, 'r');

        if (is_resource($file) === true)
        {
            $query = array();

            while (feof($file) === false)
            {
                $query[] = fgets($file);

                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
                {
                    $query = trim(implode('', $query));
                    if (mysql_query($query) === false)
                    {
                        echo '<font color="red">Lỗi: '. $query .'</font><br />';
                    }

                    else
                    {
                        echo '<font color="green">Thành công: '. $query .'</font><br />';
                    }
                    while (ob_get_level() > 0)
                    {
                        ob_end_flush();
                    }

                    flush();
                }

                if (is_string($query) === true)
                {
                    $query = array();
                }
            }

            return fclose($file);
        }
    }
    return false;
}

//////////////////////////
//Tạo tệp tin config.php//
//////////////////////////

if (isset($_POST["submit"])) {

$basedir = $_POST[basedir];
$baseurl = $_POST[baseurl];
$domain  = $_POST[domain];
$license = $_POST[license];
$namedir = $_POST[namedir];
$dbhost  = $_POST[dbhost];
$dbuser  = $_POST[dbuser];
$dbpass  = $_POST[dbpassword];
$dbname  = $_POST[dbname];

if ($basedir == '')
{
die ('Vui lòng nhập dường dẫn đến thư mục chứa mã nguồn!');
}
elseif ($baseurl == '')
{
die ('Vui lòng nhập liên kết đến thư mục chứa mã nguồn!');
}
elseif ($domain == '')
{
die ('Vui lòng nhập domain website!');
}
elseif ($license == '')
{
die ('Vui lòng nhập mã đăng ký!');
}
elseif ($dbhost == '')
{
die ('Vui lòng nhập tên máy chủ cơ sở dữ liệu!');
}
elseif ($dbuser == '')
{
die ('Vui lòng nhập tên đăng nhập cơ sở dữ liệu!');
}
elseif ($dbpass == '')
{
die ('Vui lòng nhập mật khẩu kết nối cơ sở dữ liệu!');
}
elseif ($dbname == '')
{
die ('Vui lòng nhập tên cơ sở dữ liệu!');
}
else{

if ($namedir == '')
{
$namedir = '';
$namedir2 = '';
$murl = 'http://m.'.$_POST[domain];
}
else
{
$namedir = '/'.$_POST[namedir];
$namedir2 = '/'.$_POST[namedir].'/m';
$murl = $_POST[baseurl].'/m';
}

$noidung = '<?php
$config = array();

// Bắt đầu cấu hình
$config[\'basedir\']     =  \''.$_POST[basedir].'\';   //Đường đẫn đến thư mục chứa mã nguồn
$config[\'baseurl\']     =  \''.$_POST[baseurl].'\';   //Liên kết đến thư mục chứa mã nguồn
$config[\'domain\']      =  \''.$_POST[domain].'\';   //Domain của website
$config[\'license\']     =  \''.$_POST[license].'\';   //Mã đăng ký

$DBTYPE     = \'mysql\';
$DBHOST     = \''.$_POST[dbhost].'\';   //Tên máy chủ cơ sở dữ liệu
$DBUSER     = \''.$_POST[dbuser].'\';   //Tên đăng nhập cơ sở dữ liệu
$DBPASSWORD = \''.$_POST[dbpassword].'\';   //Mật khẩu kết nối cơ sở dữ liệu
$DBNAME     = \''.$_POST[dbname].'\';   //Tên cơ sở dữ liệu

$default_language = "vi"; //Bạn có thể chọn en
// Kết thúc cấu hình

session_start();

$config[\'adminurl\']      =  $config[\'baseurl\'].\'/admin\';
$config[\'cssurl\']      =  $config[\'baseurl\'].\'/css\';
$config[\'imagedir\']      =  $config[\'basedir\'].\'/images\';
$config[\'imageurl\']      =  $config[\'baseurl\'].\'/images\';
$config[\'membersprofilepicdir\']      =  $config[\'imagedir\'].\'/avatar\';
$config[\'membersprofilepicurl\']      =  $config[\'imageurl\'].\'/avatar\';
$config[\'pdir\'] = $config[\'basedir\'].\'/upload\';
$config[\'purl\'] = $config[\'baseurl\'].\'/upload\';
require_once($config[\'basedir\'].\'/smarty/libs/Smarty.class.php\');
require_once($config[\'basedir\'].\'/libraries/mysmarty.class.php\');
require_once($config[\'basedir\'].\'/libraries/SConfig.php\');
require_once($config[\'basedir\'].\'/libraries/SError.php\');
require_once($config[\'basedir\'].\'/libraries/adodb/adodb.inc.php\');
require_once($config[\'basedir\'].\'/libraries/phpmailer/class.phpmailer.php\');
require_once($config[\'basedir\'].\'/libraries/SEmail.php\');
function strip_mq_gpc($arg)
{
  if (get_magic_quotes_gpc())
  {
  	$arg = str_replace(\'"\',"\'",$arg);
  	$arg = stripslashes($arg);
    return $arg;
  } 
  else
  {
    $arg = str_replace(\'"\',"\'",$arg);
    return $arg;
  }
}
$conn = &ADONewConnection($DBTYPE);
$conn->PConnect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
@mysql_query("SET NAMES \'UTF8\'");
$sql = "SELECT * from config";
$rsc = $conn->Execute($sql);
if($rsc){while(!$rsc->EOF)
{
$field = $rsc->fields[\'setting\'];
$config[$field] = $rsc->fields[\'value\'];
STemplate::assign($field, strip_mq_gpc($config[$field]));
@$rsc->MoveNext();
}}
if($config[\'mobilemode\'] == "1" && $config[\'m_url\'] != "")
{
	if($mobile != "1")
	{
		include("mobile.php");
		$mcheck = is_md();
		if($mcheck != "")
		{
			header("Location: ".$config[\'m_url\'].$_SERVER[\'REQUEST_URI\']);exit;
		}
	}
}
STemplate::assign(\'baseurl\',       $config[\'baseurl\']);
STemplate::assign(\'basedir\',       $config[\'basedir\']);
STemplate::assign(\'adminurl\',       $config[\'adminurl\']);
STemplate::assign(\'cssurl\',       $config[\'cssurl\']);
STemplate::assign(\'imagedir\',        $config[\'imagedir\']);
STemplate::assign(\'imageurl\',        $config[\'imageurl\']);
STemplate::assign(\'membersprofilepicdir\',        $config[\'membersprofilepicdir\']);
STemplate::assign(\'membersprofilepicurl\',        $config[\'membersprofilepicurl\']);
STemplate::assign(\'pdir\', $config[\'pdir\']);
STemplate::assign(\'purl\', $config[\'purl\']);
STemplate::setCompileDir($config[\'basedir\']."/temporary");
$theme = $config[\'theme\'];
STemplate::setTplDir($config[\'basedir\']."/themes");
if ($_REQUEST[\'language\'] != "")
{
	if ($_REQUEST[\'language\'] == "vi")
	{
		$_SESSION[\'language\'] = "vi";
	}
	elseif ($_REQUEST[\'language\'] == "en")
	{
		$_SESSION[\'language\'] = "en";
	}
}
if ($_SESSION[\'language\'] == "")
{
	$_SESSION[\'language\'] = $default_language;
}

if ($_SESSION[\'language\'] == "vi")
{
	include("lang/vi.php");
}
elseif ($_SESSION[\'language\'] == "en")
{
	include("lang/en.php");
}
else
{
	include("lang/".$default_language.".php");
}
for ($i=0; $i<count($lang); $i++)
{
	STemplate::assign(\'lang\'.$i, $lang[$i]);
}
if($sban != "1")
{
	$bquery = "SELECT count(*) as total from bans_ips WHERE ip=\'".mysql_real_escape_string($_SERVER[\'REMOTE_ADDR\'])."\'";
	$bresult = $conn->execute($bquery);
	$bcount = $bresult->fields[\'total\'];
	if($bcount > "0")
	{
		$brdr = $config[\'baseurl\']."/banned.php";
		header("Location:$brdr");
		exit;
	}
}
function create_slrememberme() {
        $key = md5(uniqid(rand(), true));
        global $conn;
        $sql="update members set remember_me_time=\'".date(\'Y-m-d H:i:s\')."\', remember_me_key=\'".$key."\' WHERE username=\'".mysql_real_escape_string($_SESSION[USERNAME])."\'";
        $conn->execute($sql);
        setcookie(\'slrememberme\', gzcompress(serialize(array($_SESSION[USERNAME], $key)), 9), time()+60*60*24*30);
}
function destroy_slrememberme($username) {
        if (strlen($username) > 0) {
                global $conn;
                $sql="update members set remember_me_time=NULL, remember_me_key=NULL WHERE username=\'".mysql_real_escape_string($username)."\'";
                $conn->execute($sql);
        }
        setcookie ("slrememberme", "", time() - 3600);
}
if (!isset($_SESSION["USERNAME"]) && isset($_COOKIE[\'slrememberme\'])) 
{
        $sql="update members set remember_me_time=NULL and remember_me_key=NULL WHERE remember_me_time<\'".date(\'Y-m-d H:i:s\', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")))."\'";
        $conn->execute($sql);
        list($username, $key) = @unserialize(gzuncompress(stripslashes($_COOKIE[\'slrememberme\'])));
        if (strlen($username) > 0 && strlen($key) > 0)
		{
        	$sql="SELECT status,USERID,email,username,verified,filter from members WHERE username=\'".mysql_real_escape_string($username)."\' and remember_me_key=\'".mysql_real_escape_string($key)."\'";
          	$rs=$conn->execute($sql);
          	if($rs->recordcount()<1)
			{
				$error=$lang[\'224\'];
			}
		    elseif($rs->fields[\'status\'] == "0")
			{
				$error = $lang[\'225\'];
			}
    		if($error=="")
			{				
				SESSION_REGISTER("USERID");$_SESSION[USERID]=$rs->fields[\'USERID\'];
				SESSION_REGISTER("EMAIL");$_SESSION[EMAIL]=$rs->fields[\'email\'];
				SESSION_REGISTER("USERNAME");$_SESSION[USERNAME]=$rs->fields[\'username\'];
				SESSION_REGISTER("VERIFIED");$_SESSION[VERIFIED]=$rs->fields[\'verified\'];
				SESSION_REGISTER("FILTER");$_SESSION[FILTER]=$rs->fields[\'filter\'];
      			create_slrememberme();
        	}
			else
			{
                destroy_slrememberme($username);
        	}
        }
}
function generateCode($length) 
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}
if($config[\'enable_fc\'] == "1")
{
	if($_SESSION[\'USERID\'] == "")
	{
		$A = $config[\'FACEBOOK_APP_ID\'];
		$B = $config[\'FACEBOOK_SECRET\'];
		define(\'FACEBOOK_APP_ID\', $A);
		define(\'FACEBOOK_SECRET\', $B);
		STemplate::assign(\'FACEBOOK_APP_ID\',$A);
		STemplate::assign(\'FACEBOOK_SECRET\',$B);
		
		function get_facebook_cookie($app_id, $application_secret) {
		  $args = array();
		  parse_str(trim($_COOKIE[\'fbs_\' . $app_id], \'\\\"\'), $args);
		  ksort($args);
		  $payload = \'\';
		  foreach ($args as $key => $value) {
			if ($key != \'sig\') {
			  $payload .= $key . \'=\' . $value;
			}
		  }
		  if (md5($payload . $application_secret) != $args[\'sig\']) {
			return null;
		  }
		  return $args;
		}
		
		$code = $_REQUEST[\'code\'];
		if($code != "")
		{
			if($mobile == "1"){$my_url = $config[\'m_url\']."/";}else{$my_url = $config[\'baseurl\']."/";}
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			. "client_id=" . $A . "&redirect_uri=" . urlencode($my_url)
			. "&client_secret=" . $B . "&code=" . $code;
			$response = @file_get_contents($token_url);
			$params = null;
			parse_str($response, $params);
			$graph_url = "https://graph.facebook.com/me?access_token=" 
			. $params[\'access_token\'];
			$user = json_decode(file_get_contents($graph_url));
			$fname = htmlentities(strip_tags($user->name), ENT_COMPAT, "UTF-8");
			$femail = htmlentities(strip_tags($user->email), ENT_COMPAT, "UTF-8");
			$fid = htmlentities(strip_tags($user->id), ENT_COMPAT, "UTF-8");
			$fusername = htmlentities(strip_tags($user->username), ENT_COMPAT, "UTF-8");
			
			$query="SELECT USERID FROM members WHERE email=\'".mysql_real_escape_string($femail)."\' OR username=\'".mysql_real_escape_string($fusername)."\' limit 1";
			$executequery=$conn->execute($query);
			$FUID = intval($executequery->fields[\'USERID\']);
			if($FUID > 0)
			{									
				$query="SELECT USERID,email,username,verified, filter from members WHERE USERID=\'".mysql_real_escape_string($FUID)."\' and status=\'1\'";
				$result=$conn->execute($query);
				if($result->recordcount()>0)
				{
					$query="update members set lastlogin=\'".time()."\', lip=\'".$_SERVER[\'REMOTE_ADDR\']."\' WHERE USERID=\'".mysql_real_escape_string($FUID)."\'";
					$conn->execute($query);
					$_SESSION[\'USERID\']=$result->fields[\'USERID\'];
					$_SESSION[\'EMAIL\']=$result->fields[\'email\'];
					$_SESSION[\'USERNAME\']=$result->fields[\'username\'];
					$_SESSION[\'VERIFIED\']=$result->fields[\'verified\'];
					$_SESSION[\'FILTER\']=$result->fields[\'filter\'];
					$_SESSION[\'FB\']="1";			
					$redirect = $_SESSION[\'location\'];
					if($redirect == "")
					{
						if ( $config[regredirect] == 1)
						{header("Location:$config[baseurl]/index.php".$addlang);exit;}
						else
						{header("Location:$config[baseurl]/settings".$addlang);exit;}
					}
					else
					{
						header("Location:".$config[baseurl].$redirect);exit;
					}
					$_SESSION[\'location\'] = "";
				}
			}
			else
			{
				$md5pass = md5(generateCode(5).time());
				
				if($fusername != "")
				{
					$query="INSERT INTO members SET email=\'".mysql_real_escape_string($femail)."\', username=\'".mysql_real_escape_string($fusername)."\', password=\'".mysql_real_escape_string($md5pass)."\', fullname=\'".mysql_real_escape_string($fname)."\', addtime=\'".time()."\', lastlogin=\'".time()."\', ip=\'".$_SERVER[\'REMOTE_ADDR\']."\', lip=\'".$_SERVER[\'REMOTE_ADDR\']."\', verified=\'1\'";
					$result=$conn->execute($query);
					$userid = mysql_insert_id();
					$profilepicture = $userid.".jpg";
					$query="update members set profilepicture=\'".$profilepicture."\' WHERE USERID=\'".mysql_real_escape_string($userid)."\'";
					$result=$conn->execute($query);
					$img = file_get_contents(\'https://graph.facebook.com/\'.$fid.\'/picture?width=160&height=160\');
					$file = $config[\'membersprofilepicdir\'].\'/\'.$userid.\'.jpg\';
					file_put_contents($file, $img);
					
					if($userid != "" && is_numeric($userid) && $userid > 0)
					{
						$query="SELECT USERID,email,username,verified, filter from members WHERE USERID=\'".mysql_real_escape_string($userid)."\'";
						$result=$conn->execute($query);
						
						$SUSERID = $result->fields[\'USERID\'];
						$SEMAIL = $result->fields[\'email\'];
						$SUSERNAME = $result->fields[\'username\'];
						$SVERIFIED = $result->fields[\'verified\'];
						$SFILTER = $result->fields[\'filter\'];
						$_SESSION[\'USERID\']=$SUSERID;
						$_SESSION[\'EMAIL\']=$SEMAIL;
						$_SESSION[\'USERNAME\']=$SUSERNAME;
						$_SESSION[\'VERIFIED\']=$SVERIFIED;
						$_SESSION[\'FILTER\']=$SFILTER;
						$_SESSION[\'FB\']="1";
						$redirect = $_SESSION[\'location\'];
					if($redirect == "")
					{
						if ( $config[regredirect] == 1)
						{header("Location:$config[baseurl]/index.php".$addlang);exit;}
						else
						{header("Location:$config[baseurl]/settings".$addlang);exit;}
					}
					else
					{
						header("Location:".$config[baseurl].$redirect);exit;
					}
					$_SESSION[\'location\'] = "";
					
					}
				}
			}
		}
	}
	/*
	function getCurrentPageUrl()
	{
		 static $pageURL = \'\';
		 if(empty($pageURL)){
			  $pageURL = \'http\';
			  if(isset($_SERVER[\'HTTPS\']) && $_SERVER[\'HTTPS\'] == \'on\')$pageURL .= \'s\';
			  $pageURL .= \'://\';
			  if($_SERVER[\'SERVER_PORT\'] != \'80\')$pageURL .= $_SERVER[\'SERVER_NAME\'].\':\'.$_SERVER[\'SERVER_PORT\'].$_SERVER[\'REQUEST_URI\'];
			  else $pageURL .= $_SERVER[\'SERVER_NAME\'].$_SERVER[\'REQUEST_URI\'];
		 }
		 return $pageURL;
	} 
	if($_SESSION[\'USERNAME\'] == "" && $_SESSION[\'FB\'] == "1")
	{	
		$url = getCurrentPageUrl();
		$myurl = $config[\'baseurl\']."/connect.php";
		$cssurl = $config[\'baseurl\']."/css/connect.css";
		if(($url != $myurl) && ($url != $cssurl))
		{
			header("Location:$config[baseurl]/connect.php");exit;
		}
	}*/
}
if($lskip != "1")
{
	if($_SESSION[\'USERID\'] != "" && $_SESSION[\'EMAIL\'] != "")
	{
		if($_SESSION[\'USERNAME\'] == "")
		{
			header("Location:$config[baseurl]/selectusername.php");exit;
		}
	}
}

$topquery = "SELECT * FROM members WHERE verified=\'1\' AND username!=\'\' order by posts desc limit 10";
$executetopquery = $conn->Execute($topquery);
$top = $executetopquery->getrows();
STemplate::assign(\'top\',$top);

?>
';

$cauhinh = fopen("$_POST[basedir]/include/config.php", "w");
if(!$cauhinh)
{
  die('<font color="red">Không thể ghi tệp tin config.php!</font>');
}
fwrite($cauhinh, $noidung);
fclose($cauhinh);
echo '<font color="green">Ghi tệp tin config.php thành công!</font><br />';

//////////////////////////////////
//Tạo tệp tin config.php di động//
//////////////////////////////////

$noidung_m = '<?php
$mobile = "1";
$config[\'basedir\']   = \''.$_POST[basedir].'\';
$config[\'mobiledir\'] = \''.$_POST[basedir].'/m\';
$config[\'mobileurl\'] = \''.$murl.'\';

function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID=\'".mysql_real_escape_string($var[AID])."\' AND active=\'1\' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function insert_get_fav_count($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE PID=\'".intval($var[PID])."\'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}

function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}

function verify_valid_email($emailtocheck)
{
       $eregicheck = "^([-!#\$%&\'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&\'*+/0-9=?A-Z^_`a-z{|}~]+\\\.)+[a-zA-Z]{2,4}\$";
       return eregi($eregicheck, $emailtocheck);
}

function do_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = \'file\')
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = \'\';

	$final_width = 0;
	$final_height = 0;
	list($width_old, $height_old) = $info;

	if($proportional) 
	{
	  if ($width == 0) $factor = $height/$height_old;
	  elseif ($height == 0) $factor = $width/$width_old;
	  else $factor = min ( $width / $width_old, $height / $height_old);   
	  
	  $final_width = round ($width_old * $factor);
	  $final_height = round ($height_old * $factor);
		  
	  if($final_width > $width_old && $final_height > $height_old)
	  {
	  	  $final_width = $width_old;
		  $final_height = $height_old;

	  }
	}
	else 
	{
	  $final_width = ( $width <= 0 ) ? $width_old : $width;
	  $final_height = ( $height <= 0 ) ? $height_old : $height;
	}
	
	switch($info[2]) 
	{
	  case IMAGETYPE_GIF:
		$image = imagecreatefromgif($file);
	  break;
	  case IMAGETYPE_JPEG:
		$image = imagecreatefromjpeg($file);
	  break;
	  case IMAGETYPE_PNG:
		$image = imagecreatefrompng($file);
	  break;
	  default:
		return false;
	}

	$image_resized = imagecreatetruecolor( $final_width, $final_height );

	if(($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG))
	{
	  $trnprt_indx = imagecolortransparent($image);
	
	  if($trnprt_indx >= 0)
	  {
		$trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
		$trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color[\'red\'], $trnprt_color[\'green\'], $trnprt_color[\'blue\']);
		imagefill($image_resized, 0, 0, $trnprt_indx);
		imagecolortransparent($image_resized, $trnprt_indx);	
	  } 
	  elseif($info[2] == IMAGETYPE_PNG) 
	  {
		imagealphablending($image_resized, false);
		$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
		imagefill($image_resized, 0, 0, $color);
		imagesavealpha($image_resized, true);
	  }
	}
	imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);

	switch( strtolower($output))
	{
	  case \'browser\':
		$mime = image_type_to_mime_type($info[2]);
		header("Content-type: $mime");
		$output = NULL;
	  break;
	  case \'file\':
		$output = $file;
	  break;
	  case \'return\':
		return $image_resized;
	  break;
	  default:
	  break;
	}
	
	if(file_exists($output))
	{
		@unlink($output);
	}

	switch($info[2])
	{
	  case IMAGETYPE_GIF:
		imagegif($image_resized, $output);
	  break;
	  case IMAGETYPE_JPEG:
		imagejpeg($image_resized, $output, 100);
	  break;
	  case IMAGETYPE_PNG:
		imagepng($image_resized, $output);
	  break;
	  default:
		return false;
	}
	return true;
}

function imagick_gif_resize($file, $width = 0, $height = 0, $proportional = false, $output = \'file\', $temppic)
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = \'\';

	$final_width = 0;
	$final_height = 0;
	list($width_old, $height_old) = $info;

	if($proportional) 
	{
	  if ($width == 0) $factor = $height/$height_old;
	  elseif ($height == 0) $factor = $width/$width_old;
	  else $factor = min ( $width / $width_old, $height / $height_old);   
	  
	  $final_width = round ($width_old * $factor);
	  $final_height = round ($height_old * $factor);
		  
	  if($final_width > $width_old && $final_height > $height_old)
	  {
	  	  $final_width = $width_old;
		  $final_height = $height_old;

	  }
	}
	else 
	{
	  $final_width = ( $width <= 0 ) ? $width_old : $width;
	  $final_height = ( $height <= 0 ) ? $height_old : $height;
	}
	
	$owh = $width_old."x".$height_old;
	$nwh = $final_width."x".$final_height;
	if(!file_exists($temppic))
	{
		$runinbg = "convert ".$file." -coalesce ".$temppic;
		$runconvert = exec("$runinbg");
	}
	$runinbg = "convert -size ".$owh." ".$temppic." -resize ".$nwh." ".$output;
	$runconvert = exec("$runinbg");
	return true;
}

function makeseo($str,$separator = \'dash\',$lowercase = TRUE)
{
//decode html entities
$str = html_entity_decode($str,ENT_QUOTES,\'UTF-8\');

//make lowercase
$str = mb_strtolower($str, \'UTF-8\');

//replace special chars, for UTF8 encoding it needs to be defined as array
$trans = array(
\'ơ\'=>\'o\',
\'Ơ\'=>\'o\',
\'ó\'=>\'o\',
\'Ó\'=>\'o\',
\'ò\'=>\'o\',
\'Ò\'=>\'o\',
\'ọ\'=>\'o\',
\'Ọ\'=>\'o\',
\'ỏ\'=>\'o\',
\'Ỏ\'=>\'o\',
\'õ\'=>\'o\',
\'Õ\'=>\'o\',
\'ớ\'=>\'o\',
\'Ớ\'=>\'o\',
\'ờ\'=>\'o\',
\'Ờ\'=>\'o\',
\'ợ\'=>\'o\',
\'Ợ\'=>\'o\',
\'ở\'=>\'o\',
\'Ở\'=>\'o\',
\'ỡ\'=>\'o\',
\'Ỡ\'=>\'o\',
\'ô\'=>\'o\',
\'Ô\'=>\'o\',
\'ố\'=>\'o\',
\'Ố\'=>\'o\',
\'ồ\'=>\'o\',
\'Ồ\'=>\'o\',
\'ộ\'=>\'o\',
\'Ộ\'=>\'o\',
\'ổ\'=>\'o\',
\'Ổ\'=>\'o\',
\'ỗ\'=>\'o\',
\'Ỗ\'=>\'o\',
\'ú\'=>\'u\',
\'Ú\'=>\'u\',
\'ù\'=>\'u\',
\'Ù\'=>\'u\',
\'ụ\'=>\'u\',
\'Ụ\'=>\'u\',
\'ủ\'=>\'u\',
\'Ủ\'=>\'u\',
\'ũ\'=>\'u\',
\'Ũ\'=>\'u\',
\'ư\'=>\'u\',
\'Ư\'=>\'u\',
\'ứ\'=>\'u\',
\'Ứ\'=>\'u\',
\'ừ\'=>\'u\',
\'Ừ\'=>\'u\',
\'ự\'=>\'u\',
\'ữ\'=>\'u\',
\'Ự\'=>\'u\',
\'ử\'=>\'u\',
\'Ử\'=>\'u\',
\'ữ\'=>\'u\',
\'Ữ\'=>\'u\',
\'â\'=>\'a\',
\'Â\'=>\'a\',
\'á\'=>\'a\',
\'Á\'=>\'a\',
\'à\'=>\'a\',
\'À\'=>\'a\',
\'ạ\'=>\'a\',
\'Ạ\'=>\'a\',
\'ả\'=>\'a\',
\'Ả\'=>\'a\',
\'ã\'=>\'a\',
\'Ã\'=>\'a\',
\'ấ\'=>\'a\',
\'Ấ\'=>\'a\',
\'ầ\'=>\'a\',
\'Ầ\'=>\'a\',
\'ậ\'=>\'a\',
\'ạ\'=>\'a\',
\'ò\'=>\'o\',
\'Ậ\'=>\'a\',
\'ẩ\'=>\'â\',
\'Ẩ\'=>\'a\',
\'ẫ\'=>\'a\',
\'Ẫ\'=>\'a\',
\'ă\'=>\'a\',
\'Ă\'=>\'a\',
\'ắ\'=>\'a\',
\'Ắ\'=>\'a\',
\'ằ\'=>\'a\',
\'Ằ\'=>\'a\',
\'ặ\'=>\'a\',
\'Ặ\'=>\'a\',
\'ẳ\'=>\'a\',
\'Ẳ\'=>\'a\',
\'ẵ\'=>\'a\',
\'Ẵ\'=>\'a\',
\'ế\'=>\'e\',
\'Ế\'=>\'e\',
\'ề\'=>\'e\',
\'Ề\'=>\'e\',
\'ệ\'=>\'e\',
\'Ệ\'=>\'e\',
\'ể\'=>\'e\',
\'Ể\'=>\'e\',
\'ễ\'=>\'e\',
\'Ễ\'=>\'e\',
\'é\'=>\'e\',
\'É\'=>\'e\',
\'è\'=>\'e\',
\'È\'=>\'e\',
\'ẹ\'=>\'e\',
\'Ẹ\'=>\'e\',
\'ẻ\'=>\'e\',
\'Ẻ\'=>\'e\',
\'ẽ\'=>\'e\',
\'Ẽ\'=>\'e\',
\'ê\'=>\'e\',
\'Ê\'=>\'e\',
\'í\'=>\'i\',
\'Í\'=>\'i\',
\'ì\'=>\'i\',
\'Ì\'=>\'i\',
\'ỉ\'=>\'i\',
\'Ỉ\'=>\'i\',
\'ĩ\'=>\'i\',
\'Ĩ\'=>\'i\',
\'ị\'=>\'i\',
\'Ị\'=>\'i\',
\'ý\'=>\'y\',
\'Ý\'=>\'y\',
\'ỳ\'=>\'y\',
\'Ỳ\'=>\'y\',
\'ỷ\'=>\'y\',
\'Ỷ\'=>\'y\',
\'ỹ\'=>\'y\',
\'Ỹ\'=>\'y\',
\'ỵ\'=>\'y\',
\'Ỵ\'=>\'y\',
\'đ\'=>\'d\',
\'Đ\'=>\'d\',
\'[\'=>\'\',
\']\'=>\'\',
\';\'=>\'\',
\'^\'=>\'\',
\'@\'=>\'\',
\'$\'=>\'\',
\'>\'=>\'\',
\'<\'=>\'\',
\'~\'=>\'\',
\'{\'=>\'\',
\'}\'=>\'\',
\'‘\'=>\'\',
\'’\'=>\'\',
\'…\'=>\'\',
\'ẩ\'=>\'a\',
\'"\'=>\'\',
\'ồ\'=>\'o\',
\'ấ\'=>\'a\',
\'ớ\'=>\'o\',
\'ý\'=>\'y\',
\'ậ\'=>\'a\',
\'ạ\'=>\'a\',
\'ế\'=>\'e\',
\'ì\'=>\'i\',
\'ả\'=>\'a\',
\'*\'=>\' \',
\'ó\'=>\'o\',
\'ể\'=>\'e\',
\'Ấ\'=>\'a\',
\'ậ\'=>\'a\',
\'ộ\'=>\'o\',
\'à\'=>\'a\',
\'ợ\'=>\'o\',
\'ệ\'=>\'e\',
\'`\'=>\'\',
\'&gt;\'=>\'\',
\'&lt;\'=>\'\',
\'&quot;\'=>\'\',
\'&amp;\'=>\'\',
\'%\'=>\'\',
\'á\'=>\'a\',
\'ầ\'=>\'a\',
\'|\'=>\'\',
\'“\'=>\'\',
\'”\'=>\'\',
\'–\'=>\'\',
\'=\'=>\'\',
\'ặ\'=>\'a\',
\'ờ\'=>\'o\',
\'ố\'=>\'o\',
\'ắ\'=>\'a\',
\'ỳ\'=>\'y\',
\'é\'=>\'e\',
\'ẹ\'=>\'e\',
\'ú\'=>\'u\'
);
$str = strtr($str, $trans);

        if ($separator == \'dash\')
        {

            $search     = \'_\';
            $replace    = \'-\';

        }else
        {

            $search     = \'-\';
            $replace    = \'_\';

        }

        $trans = array(
                        \'&\#\d+?;\'              => \'\',
                        \'&\S+?;\'                => \'\',
                        \'\s+\'                   => $replace,
                        $replace.\'+\'            => $replace,
                        $replace.\'$\'            => $replace,
                        \'^\'.$replace            => $replace,
                        \'\.+$\'                  => \'\'
                        );

        $str = strip_tags($str);
        $str = preg_replace("#\/#ui",\'-\',$str);

        foreach ($trans AS $key => $val)
        {

            $str = preg_replace("#".$key."#ui", $val, $str);

        }

        if($lowercase === TRUE)
        {

            $str = mb_strtolower($str,\'UTF-8\');

        }

        return trim(stripslashes($str));
}
	
function download_photo($url, $saveto)
{
	global $config;
	if (!curlSaveToFile($url, $saveto))
	{
		return false;
	}
	return true;
}

function curlSaveToFile( $url, $local )
{
	$ch = curl_init();
	$fh = fopen($local, \'w\');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FILE, $fh);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_NOPROGRESS, true);
	curl_setopt($ch, CURLOPT_USERAGENT, \'"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.11) Gecko/20071204 Ubuntu/7.10 (gutsy) Firefox/2.0.0.11\');
	curl_exec($ch);
	
	if( curl_errno($ch) ) {
		return false;
	}
	
	curl_close($ch);
	fclose($fh);
	
	if( filesize($local) > 10 ) {
		return true;
	}
	
	return false;
}

function insert_return_youtube($a)
{
    $embedcode = \'<object width="100%" height="320"><param name="movie" value="http://www.youtube.com/v/AWECDE&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="wmode" value="opaque" /></param><embed src="http://www.youtube.com/v/AWECDE&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="100%" height="320" wmode="opaque"></embed></object>\';
	$item = $a[youtube];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}

function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args[\'v\']) ? $args[\'v\'] : false;
}
?>
';

$cauhinh_m = fopen("$_POST[basedir]/m/config.php", "w");
if(!$cauhinh_m)
{
  die('<font color="red">Không thể ghi tệp tin config.php di động!</font>');
}
fwrite($cauhinh_m, $noidung_m);
fclose($cauhinh_m);
echo '<font color="green">Ghi tệp tin config.php di động thành công!</font><br />';

/////////////////////////
//Tạo tệp tin .htaccess//
/////////////////////////

$htaccess = 'options -multiviews
<IfModule mod_rewrite.c>
RewriteEngine On 
RewriteBase '.$namedir.'/
RewriteRule ^signup$ signup.php
RewriteRule ^twitter_signup$ twitter_signup.php
RewriteRule ^settings$ settings.php
RewriteRule ^log_out$ logout.php
RewriteRule ^logout$ logout.php
RewriteRule ^login$ login.php
RewriteRule ^delete-account$ delete-account.php
RewriteRule ^confirmemail$ confirmemail.php
RewriteRule ^submit$ submit.php
RewriteRule ^post/([^/.]+)?/?(.*)$ view.php?pid=$1
RewriteRule ^safe$ safe.php
RewriteRule ^hot$ hot.php
RewriteRule ^thumbs$ thumbs.php
RewriteRule ^tvote$ tvote.php
RewriteRule ^ttrending$ ttrending.php
RewriteRule ^top-users$ topusers.php
RewriteRule ^random$ random.php
RewriteRule ^vote$ vote.php
RewriteRule ^trending$ trending.php
RewriteRule ^channels/([^/.]+)?/?$ channels.php?cname=$1&%{QUERY_STRING}
RewriteRule ^top?/?([^/.]+)?/?$ top.php?period=$1&%{QUERY_STRING}
RewriteRule ^fix/(.*) fix.php?pid=$1
RewriteRule ^search$ search.php
RewriteRule ^fast$ fast.php
RewriteRule ^user/([^/.]+)?/likes?/?$ likes.php?uid=$1&%{QUERY_STRING}
RewriteRule ^user/([^/.]+)?/messages$ messages.php?uid=$1&%{QUERY_STRING}
RewriteRule ^user/([^/.]+)?$ user.php?uid=$1&%{QUERY_STRING}
RewriteRule ^faq$ faq.php
RewriteRule ^terms_of_service$ terms_of_service.php
RewriteRule ^privacy_policy$ privacy_policy.php
RewriteRule ^about$ about.php
RewriteRule ^rules$ rules.php
RewriteRule ^contact$ contact.php
</IfModule>
<IfModule mod_security.c> 
   # Turn off mod_security filtering. 
   SecFilterEngine Off 

   # The below probably isn\'t needed, 
   # but better safe than sorry. 
   SecFilterScanPOST Off 
</IfModule>
';

$htaccess_file = fopen("$_POST[basedir]/.htaccess", "w");
if(!$htaccess_file)
{
  die('<font color="red">Không thể ghi tệp tin .htaccess!</font>');
}
fwrite($htaccess_file, $htaccess);
fclose($htaccess_file);
echo '<font color="green">Ghi tệp tin .htaccess thành công!</font><br />';

/////////////////////////////////
//Tạo tệp tin .htaccess di động//
/////////////////////////////////

$htaccess_m = '<IfModule mod_rewrite.c>
RewriteEngine On 
RewriteBase '.$namedir2.'/
RewriteRule ^hot$ index.php
RewriteRule ^vote$ vote.php
RewriteRule ^trending$ trending.php
RewriteRule ^post/([^/.]+)?/?(.*)$ view.php?pid=$1
RewriteRule ^login$ login.php
RewriteRule ^logout$ logout.php
RewriteRule ^search$ search.php
RewriteRule ^submit$ submit.php
RewriteRule ^safe$ safe.php
</IfModule>

<IfModule mod_security.c> 
   # Turn off mod_security filtering. 
   SecFilterEngine Off 

   # The below probably isn\'t needed, 
   # but better safe than sorry. 
   SecFilterScanPOST Off 
</IfModule>
';

$htaccess_file_m = fopen("$_POST[basedir]/m/.htaccess", "w");
if(!$htaccess_file_m)
{
  die('<font color="red">Không thể ghi tệp tin .htaccess di động!</font>');
}
fwrite($htaccess_file_m, $htaccess_m);
fclose($htaccess_file_m);
echo '<font color="green">Ghi tệp tin .htaccess di động thành công!</font><br />';

/////////////////////
//Tạo cơ sở dữ liệu//
/////////////////////

$ketnoi = mysql_connect($dbhost, $dbuser, $dbpass);
if(!$ketnoi)
{
  die('<font color="red">Không thể kết nối CSDL: ' . mysql_error() . '.</font>');
}
echo '<font color="green">Kết nối CSDL thành công!</font><br />';
$dulieu = 'dulieu.sql';
@mysql_query("SET NAMES utf8");
mysql_select_db($dbname);
SplitSQL($dulieu, $delimiter = ';');

$adm_p = md5($_POST[adm_pass]);
$admin = "insert administrators set username='".$_POST[adm_name]."', password='".$adm_p."', email='".$_POST[adm_mail]."'";
$admin_create = mysql_query($admin);
if(!$admin_create)
{
  die('<font color="red">Không thể tạo quản trị viên: ' . mysql_error() . '.</font>');
}
echo '<font color="green">Tạo quản trị viên thành công!</font><br />';

$member = "insert members set username='".$_POST[adm_name]."', password='".$adm_p."', pwd='".$_POST[adm_pass]."', email='".$_POST[adm_mail]."', addtime='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."'";
$member_create = mysql_query($member);
if(!$member_create)
{
  die('<font color="red">Không thể tạo thành viên: ' . mysql_error() . '.</font>');
}
echo '<font color="green">Tạo thành viên thành công!</font><br />';

mysql_close($ketnoi);

}
}
?>

<br />
</div>
</div>
</body>
</html>
