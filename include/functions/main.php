<?php

function tagsexplode($tags)
{
	global $config;
	$words = explode(",",$tags);
	if ($tags != '')
	{
		echo "<img src='".$config['imageurl']."/tags.png' title='T&#7915; khóa' /> : ";
		foreach($words as $key=>$values)
		{
			$values = trim($values);
			echo "<a href='".$config['baseurl']."/search?query=$values'>".$values."</a> ";
		}
	}
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
	$fh = fopen($local, 'w');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FILE, $fh);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_NOPROGRESS, true);
	curl_setopt($ch, CURLOPT_USERAGENT, '"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.11) Gecko/20071204 Ubuntu/7.10 (gutsy) Firefox/2.0.0.11');
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

function delete_user($USERID)
{
    global $config,$conn;
	if($USERID > 0)
	{
		$query = "select profilepicture from members where USERID='".mysql_real_escape_string($USERID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$delpp = $executequery->fields['profilepicture'];
		if($delpp != "")
		{
			$del1=$config['membersprofilepicdir']."/".$delpp;
			if(file_exists($del1))
			{
				unlink($del1);
			}
			$del2=$config['membersprofilepicdir']."/thumbs/".$delpp;
			if(file_exists($del2))
			{
				unlink($del2);
			}
			$del3=$config['membersprofilepicdir']."/o/".$delpp;
			if(file_exists($del3))
			{
				unlink($del3);
			}
		}
		$query="SELECT PID FROM posts WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$results = $conn->execute($query);
		$returnthis = $results->getrows();
		$vtotal = count($returnthis);
		for($i=0;$i<$vtotal;$i++)
		{
			$DPID = intval($returnthis[$i]['PID']);
			if($DPID > 0)
			{
				delete_post($DPID);
			}
		}
		$query = "DELETE FROM members WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM members_passcode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM members_verifycode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_favorited WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_unfavorited WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
	}
}

function delete_post($PID)
{
    global $config,$conn;
	if($PID > 0)
	{
		$query = "select pic from posts where PID='".mysql_real_escape_string($PID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$thepp = $executequery->fields['pic'];
		if($thepp != "")
		{
			$p1 = $config['pdir']."/t/l-".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/t/".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/t/s-".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
		}
		$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_favorited WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_reports WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_unfavorited WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
	}
}

function do_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = 'file')
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = '';

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
		$trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
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
	  case 'browser':
		$mime = image_type_to_mime_type($info[2]);
		header("Content-type: $mime");
		$output = NULL;
	  break;
	  case 'file':
		$output = $file;
	  break;
	  case 'return':
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

function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}

function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AID])."' AND active='1' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function verify_email_username($usernametocheck)
{
    global $config,$conn;
	$query = "select count(*) as total from members where username='".mysql_real_escape_string($usernametocheck)."' limit 1"; 
	$executequery = $conn->execute($query);
	$totalu = $executequery->fields[total];
	if ($totalu >= 1)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function verify_valid_email($emailtocheck)
{
       $eregicheck = "^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,4}\$";
       return eregi($eregicheck, $emailtocheck);
}

function mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="")
{
	global $SERVER_NAME;
	$subject = nl2br($subject);
	$sendmailbody = nl2br($sendmailbody);
	$sendto = $sendto;
	if($bcc!="")
	{
		$headers = "Bcc: ".$bcc."\n";
	}
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=utf-8 \n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: PHP/"."MIME-Version: 1.0\n";
	$headers .= "From: " . $from . "\n";
	$headers .= "Content-Type: text/html\n";
	mail("$sendto","$subject","$sendmailbody","$headers");
}
$u = $config['baseurl'];

function insert_get_member_profilepicture($var)
{
        global $conn;
        $query="SELECT profilepicture FROM members WHERE USERID='".mysql_real_escape_string($var[USERID])."' limit 1";
        $executequery=$conn->execute($query);
		$results = $executequery->fields[profilepicture];
		if ($results == "")
			return "noprofilepicture.jpg";
		else
			return $results;
}

function insert_get_fav_status($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE USERID='".mysql_real_escape_string($_SESSION[USERID])."' AND PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}

function insert_get_unfav_status($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_unfavorited WHERE USERID='".mysql_real_escape_string($_SESSION[USERID])."' AND PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}

function insert_get_fav_count($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}

function does_post_exist($a)
{
	global $conn, $config;
    $query="SELECT USERID FROM posts WHERE PID='".mysql_real_escape_string($a)."'";
    $executequery=$conn->execute($query);
    if ($executequery->recordcount()>0)
        return true;
    else
		return false;
}

function update_last_viewed($a)
{
        global $conn;
		$query = "UPDATE posts SET last_viewed='".time()."' WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_your_viewed ($a)
{
        global $conn;
		$query = "UPDATE members SET yourviewed  = yourviewed  + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_post_viewed ($a)
{
        global $conn;
		$query = "UPDATE posts SET postviewed = postviewed + 1 WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_you_viewed($a)
{
        global $conn, $config;
		$view_points = $config['view_points'];
		if($view_points > 0)
		{
			$addme = ", points=points+$view_points";
		}
		$query = "UPDATE members SET youviewed = youviewed + 1 $addme WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}
$l = $config['license'];

function session_verification()
{
    if ($_SESSION[USERID] != "")
	{
		if (is_numeric($_SESSION[USERID]))
		{
        	return true;
		}
    }
	else
		return false;
}

function insert_get_static($var)
{
        global $conn;
        $query="SELECT $var[sel] FROM static WHERE ID='".mysql_real_escape_string($var[ID])."'";
        $executequery=$conn->execute($query);
        $returnme = $executequery->fields[$var[sel]];
		$returnme = strip_mq_gpc($returnme);
		echo "$returnme";
}

function script_status($var1,$var2)
{
$t = $var1;
$e0 = md5($t."qwerty");
$e1 = substr($e0, -32, 8);
$r1 = substr($e1, -3);
$e2 = md5($e1."qwerty");
$r2 = substr($e2, -32, 8);
$e3 = md5($e2."qwerty");
$r3 = substr($e3, -32, 8);
$e4 = md5($e3."qwerty");
$r4 = substr($e4, -32, 8);
$l1 = $r1."-".$r2."-".$r3."-".$r4;
$youtube_url = $var2;
$position       = 5;
$remove_length  = strlen($youtube_url)-$position;
$video_id       = substr($youtube_url, -$remove_length, 35);

}

script_status($u,$l);

function verify_login_admin()
{
        global $config,$conn;
        if($_SESSION['ADMINID'] != "" && is_numeric($_SESSION['ADMINID']) && $_SESSION['ADMINUSERNAME'] != "" && $_SESSION['ADMINPASSWORD'] != "")
        {
			$query="SELECT * FROM administrators WHERE username='".mysql_real_escape_string($_SESSION['ADMINUSERNAME'])."' AND password='".mysql_real_escape_string($_SESSION['ADMINPASSWORD'])."' AND ADMINID='".mysql_real_escape_string($_SESSION['ADMINID'])."'";
        	$executequery=$conn->execute($query);
			
			if(mysql_affected_rows()==1)
			{
			
			}
			else
			{
				header("location:$config[adminurl]/index.php");
            	exit;
			}
			
        }
		else
		{
			header("location:$config[adminurl]/index.php");
            exit;
		}
$t = $config['baseurl'];
$e0 = md5($t."qwerty");
$e1 = substr($e0, -32, 8);
$r1 = substr($e1, -3);
$e2 = md5($e1."qwerty");
$r2 = substr($e2, -32, 8);
$e3 = md5($e2."qwerty");
$r3 = substr($e3, -32, 8);
$e4 = md5($e3."qwerty");
$r4 = substr($e4, -32, 8);
$l1 = $r1."-".$r2."-".$r3."-".$r4;
$youtube_url = $config['license'];
$position       = 5;
$remove_length  = strlen($youtube_url)-$position;
$video_id       = substr($youtube_url, -$remove_length, 35);

}

function insert_return_youtube($a)
{
    $embedcode = '<iframe width="640" height="360" src="//www.youtube.com/embed/AWECDE?showinfo=0&modestbranding=1&nologo=1&rel=0" frameborder="0" allowfullscreen="1"></iframe>';
	$item = $a[youtube];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}

function insert_get_time_to_days_ago($a)
{
	global $lang;
	$currenttime = time();
	$timediff = $currenttime - $a[time];
	$oneday = 60 * 60 * 24;
	$dayspassed = floor($timediff/$oneday);
	if ($dayspassed == "0")
	{
		$mins = floor($timediff/60);
		if($mins == "0")
		{
			$secs = floor($timediff);
			if($secs == "1")
			{
				return $lang['157'];
			}
			else
			{
				return $secs." ".$lang['158'];
			}
		}
		elseif($mins == "1")
		{
			return $lang['159'];
		}
		elseif($mins < "60")
		{
			return $mins." ".$lang['160'];
		}
		elseif($mins == "60")
		{
			return $lang['161'];
		}
		else
		{
			$hours = floor($mins/60);
			return "$hours ".$lang['162'];
		}
	}
	else
	{
		if($dayspassed == "1")
		{
			return $dayspassed." ".$lang['163'];
		}
		else
		{
			return $dayspassed." ".$lang['164'];
		}
	}
}

function imagick_gif_resize($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $temppic)
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = '';

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
function makeseo($str,$separator = 'dash',$lowercase = TRUE)
{
//decode html entities
$str = html_entity_decode($str,ENT_QUOTES,'UTF-8');

//make lowercase
$str = mb_strtolower($str, 'UTF-8');

//replace special chars, for UTF8 encoding it needs to be defined as array
$trans = array(
'&#417;'=>'o',
'&#416;'=>'o',
'ó'=>'o',
'Ó'=>'o',
'ò'=>'o',
'Ò'=>'o',
'&#7885;'=>'o',
'&#7884;'=>'o',
'&#7887;'=>'o',
'&#7886;'=>'o',
'õ'=>'o',
'Õ'=>'o',
'&#7899;'=>'o',
'&#7898;'=>'o',
'&#7901;'=>'o',
'&#7900;'=>'o',
'&#7907;'=>'o',
'&#7906;'=>'o',
'&#7903;'=>'o',
'&#7902;'=>'o',
'&#7905;'=>'o',
'&#7904;'=>'o',
'ô'=>'o',
'Ô'=>'o',
'&#7889;'=>'o',
'&#7888;'=>'o',
'&#7891;'=>'o',
'&#7890;'=>'o',
'&#7897;'=>'o',
'&#7896;'=>'o',
'&#7893;'=>'o',
'&#7892;'=>'o',
'&#7895;'=>'o',
'&#7894;'=>'o',
'ú'=>'u',
'Ú'=>'u',
'ù'=>'u',
'Ù'=>'u',
'&#7909;'=>'u',
'&#7908;'=>'u',
'&#7911;'=>'u',
'&#7910;'=>'u',
'&#361;'=>'u',
'&#360;'=>'u',
'&#432;'=>'u',
'&#431;'=>'u',
'&#7913;'=>'u',
'&#7912;'=>'u',
'&#7915;'=>'u',
'&#7914;'=>'u',
'&#7921;'=>'u',
'&#432;&#771;'=>'u',
'&#7920;'=>'u',
'&#7917;'=>'u',
'&#7916;'=>'u',
'&#7919;'=>'u',
'&#7918;'=>'u',
'â'=>'a',
'Â'=>'a',
'á'=>'a',
'Á'=>'a',
'à'=>'a',
'À'=>'a',
'&#7841;'=>'a',
'&#7840;'=>'a',
'&#7843;'=>'a',
'&#7842;'=>'a',
'ã'=>'a',
'Ã'=>'a',
'&#7845;'=>'a',
'&#7844;'=>'a',
'&#7847;'=>'a',
'&#7846;'=>'a',
'&#7853;'=>'a',
'a&#803;'=>'a',
'o&#768;'=>'o',
'&#7852;'=>'a',
'&#7849;'=>'â',
'&#7848;'=>'a',
'&#7851;'=>'a',
'&#7850;'=>'a',
'&#259;'=>'a',
'&#258;'=>'a',
'&#7855;'=>'a',
'&#7854;'=>'a',
'&#7857;'=>'a',
'&#7856;'=>'a',
'&#7863;'=>'a',
'&#7862;'=>'a',
'&#7859;'=>'a',
'&#7858;'=>'a',
'&#7861;'=>'a',
'&#7860;'=>'a',
'&#7871;'=>'e',
'&#7870;'=>'e',
'&#7873;'=>'e',
'&#7872;'=>'e',
'&#7879;'=>'e',
'&#7878;'=>'e',
'&#7875;'=>'e',
'&#7874;'=>'e',
'&#7877;'=>'e',
'&#7876;'=>'e',
'é'=>'e',
'É'=>'e',
'è'=>'e',
'È'=>'e',
'&#7865;'=>'e',
'&#7864;'=>'e',
'&#7867;'=>'e',
'&#7866;'=>'e',
'&#7869;'=>'e',
'&#7868;'=>'e',
'ê'=>'e',
'Ê'=>'e',
'í'=>'i',
'Í'=>'i',
'ì'=>'i',
'Ì'=>'i',
'&#7881;'=>'i',
'&#7880;'=>'i',
'&#297;'=>'i',
'&#296;'=>'i',
'&#7883;'=>'i',
'&#7882;'=>'i',
'ý'=>'y',
'Ý'=>'y',
'&#7923;'=>'y',
'&#7922;'=>'y',
'&#7927;'=>'y',
'&#7926;'=>'y',
'&#7929;'=>'y',
'&#7928;'=>'y',
'&#7925;'=>'y',
'&#7924;'=>'y',
'&#273;'=>'d',
'&#272;'=>'d',
'['=>'',
']'=>'',
';'=>'',
'^'=>'',
'@'=>'',
'$'=>'',
'>'=>'',
'<'=>'',
'~'=>'',
'{'=>'',
'}'=>'',
'‘'=>'',
'’'=>'',
'…'=>'',
'&#7849;'=>'a',
'"'=>'',
'ô&#768;'=>'o',
'â&#769;'=>'a',
'&#417;&#769;'=>'o',
'y&#769;'=>'y',
'&#7853;'=>'a',
'a&#803;'=>'a',
'ê&#769;'=>'e',
'i&#768;'=>'i',
'a&#777;'=>'a',
'*'=>' ',
'o&#769;'=>'o',
'ê&#777;'=>'e',
'Â&#769;'=>'a',
'â&#803;'=>'a',
'ô&#803;'=>'o',
'a&#768;'=>'a',
'&#417;&#803;'=>'o',
'ê&#803;'=>'e',
'`'=>'',
'&gt;'=>'',
'&lt;'=>'',
'&quot;'=>'',
'&amp;'=>'',
'%'=>'',
'a&#769;'=>'a',
'â&#768;'=>'a',
'|'=>'',
'“'=>'',
'”'=>'',
'–'=>'',
'='=>'',
'&#259;&#803;'=>'a',
'&#417;&#768;'=>'o',
'ô&#769;'=>'o',
'&#259;&#769;'=>'a',
'y&#768;'=>'y',
'e&#769;'=>'e',
'e&#803;'=>'e',
'u&#769;'=>'u'
);
$str = strtr($str, $trans);

        if ($separator == 'dash')
        {

            $search     = '_';
            $replace    = '-';

        }else
        {

            $search     = '-';
            $replace    = '_';

        }

        $trans = array(
                        '&\#\d+?;'              => '',
                        '&\S+?;'                => '',
                        '\s+'                   => $replace,
                        $replace.'+'            => $replace,
                        $replace.'$'            => $replace,
                        '^'.$replace            => $replace,
                        '\.+$'                  => ''
                        );

        $str = strip_tags($str);
        $str = preg_replace("#\/#ui",'-',$str);

        foreach ($trans AS $key => $val)
        {

            $str = preg_replace("#".$key."#ui", $val, $str);

        }

        if($lowercase === TRUE)
        {

            $str = mb_strtolower($str,'UTF-8');

        }

        return trim(stripslashes($str));
}

function loadallchannels()
{
    global $conn;
	$query5 = "SELECT * FROM channels";
	$executequery5 = $conn->Execute($query5);	
	$cats = $executequery5->getarray();
	return $cats;
}

function loadtopchannels($cats)
{
    global $conn;
	$ccount = count($cats);
	$ctotal = array();
	$chname = array();
	for ($i = 0; $i < $ccount; $i++) {
		$j = $cats[$i]['CID'];
		$query3 = "SELECT count(*) as total from posts A, channels B where B.CID=$j AND A.CID=B.CID";
		$executequery3 = $conn->Execute($query3);
		if ($executequery3->fields['total'] >= 0) {
			array_push($ctotal, $executequery3->fields['total']);
			$query4 = "SELECT cname from channels where CID=$j";
			$executequery4 = $conn->Execute($query4);
			array_push($chname, $executequery4->fields['cname']);
		}
	}
	array_multisort($ctotal,SORT_DESC, $chname);
	$ctotalcount = count($ctotal);
	for ($i = 0; $i < $ccount; $i++) {
		$c[$i]["ctotal"] = $ctotal[$i];
		$c[$i]["chname"] = $chname[$i];
	}
	return $c;
}

function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}

?>