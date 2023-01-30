<?
	include './class/class.DbCon.php';
	include './class/class.Util.php';
	include './enc_func.php';

	$f_userid = trim($_POST['f_userid']);
	$f_name = trim($_POST['f_name']);
	$f_phone = trim($_POST['f_phone']);

	$qMent = "where userid='$f_userid' and name='$f_name' and phone='$f_phone'";
	$row = sqlRow("select * from ks_member $qMent");

	//비밀번호 초기화 및 메일발송
	if($row){
		$send_email = $row['email'];

		//비밀번호 초기화
		$send_passwd = Util::rePassWord();
		$passwd	= hash('sha256',trim($send_passwd));
		sqlExe("update ks_member set passwd='$passwd' $qMent");

		//비밀번호 변경로그
		$userip = $_SERVER['REMOTE_ADDR'];
		$rDate = date('Y-m-d H:i:s');
		$rTime = time();
		$sql = "insert into ks_pass_log (userid,email,userip,rDate,rTime) values ('$f_userid','$send_email','$userip','$rDate','$rTime')";
		sqlExe($sql);

		//메일발송
		$to_name = $f_name;
		$to_email = $send_email;

		include 'passEmail.php';

		echo 'ok';
	}
?>