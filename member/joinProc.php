<?
include '../module/login/head.php';
include '../module/class/class.DbCon.php';
include '../module/class/class.Util.php';
include '../module/class/class.Msg.php';


if($type == 'write' || $type == 'edit'){
	//아이디 공백제거 및 소문자처리
	$userid = strtolower(addslashes(trim($_POST['userid'])));
	$userid = str_replace(' ','',$userid);

	if($type == 'write'){
		$tmpChk = sqlRowOne("select count(*) from ks_member where userid='".$userid."'");

		//가입된 아이디 중복확인 및 관리자 아이디와 중복확인
		if($tmpChk > 0){
			$msg = "사용할 수 없는 아이디입니다.";
			Msg::GblMsgBoxParent($msg);
			exit;
		}

		//추천인 아이디 확인
		$rCode = trim($_POST['rCode']);
		if($rCode){
			$tmpChk = sqlRowOne("select count(*) from ks_member where userid='".$rCode."'");

			if($tmpChk == 0){
				$msg = "추천인 아이디를 찾을 수 없습니다.";
				Msg::GblMsgBoxParent($msg);
				exit;
			}
		}
		
		$gender = trim($_POST['gender']);
		$name = trim($_POST['name']);
		$phone = trim($_POST['phone']);
		$passwd	= hash('sha256',trim($_POST['passwd']));
		$zipcode = trim($_POST['zipcode']);
		$addr01 = trim($_POST['addr01']);
		$addr02 = trim($_POST['addr02']);
		$email = trim($_POST['email01'].'@'.$_POST['email02']);
		$bDate = trim($_POST['bDate']);
		$bTime = strtotime($bDate);
		$receiveChk = trim($_POST['receiveChk']);
		$kakaoID = trim($_POST['kakaoID']);


		$mtype = 'M';
		$userip = $_SERVER['REMOTE_ADDR'];
		$rDate = date('Y-m-d H:i:s');
		$rTime = time();

		$sql = "insert into ks_member (mtype,kakaoID,userid,passwd,name,gender,phone,zipcode,addr01,addr02,email,bDate,bTime,rCode,receiveChk,userip,rDate,rTime,loginDate,loginTime) values ";
		$sql .= "('$mtype','$kakaoID','$userid','$passwd','$name','$gender','$phone','$zipcode','$addr01','$addr02','$email','$bDate','$bTime','$rCode','$receiveChk','$userip','$rDate','$rTime','$rDate','$rTime')";
		sqlExe($sql);

		//회원가입 포인트
		$joinPoint = sqlRowOne("select joinPoint from ks_shopConfig");
		if($joinPoint){
			//보유포인트
			$point = 0;
			$afterPoint = $point + $joinPoint;
			$pMent = "신규회원가입";

			$sql = "insert into ks_pointList (userid,ptype,point,afterPoint,pMent,orderNum,userip,rDate,rTime) values ";
			$sql .= "('$userid','P','$joinPoint','$afterPoint','$pMent','','$userip','$rDate','$rTime')";
			sqlExe($sql);

			//포인트 적립
			sqlExe("update ks_member set point=$afterPoint where userid='".$userid."'");
		}

		session_destroy();
		session_start();
		$_SESSION['ses_member_id'] = $userid;
		$_SESSION['ses_member_name'] = $name;
		$_SESSION['ses_member_type'] = 'M';

		Msg::GblMsgBoxParent("가입이 완료되었습니다.","location.href='/member/mypage.php';");


	}elseif($type == 'edit'){
		$passwdChk = hash('sha256',trim($_POST['passwdChk']));

		$tmpchk = sqlRowOne("select count(*) from ks_member where userid='$userid' and passwd='$passwdChk'");
		if($tmpchk == 0){
			Msg::GblMsgBoxParent('현재 비밀번호를\n확인해 주시기 바랍니다.','');
			exit;

		}else{
			$gender = trim($_POST['gender']);
			$name = trim($_POST['name']);
			$phone = trim($_POST['phone']);
			$zipcode = trim($_POST['zipcode']);
			$addr01 = trim($_POST['addr01']);
			$addr02 = trim($_POST['addr02']);
			$email = trim($_POST['email01'].'@'.$_POST['email02']);
			$bDate = trim($_POST['bDate']);
			$bTime = strtotime($bDate);

			//추천인 아이디 확인
			$rCode = trim($_POST['rCode']);
			if($rCode){
				$tmpChk = sqlRowOne("select count(*) from ks_member where userid='".$rCode."'");

				if($tmpChk == 0){
					$msg = "추천인 아이디를 찾을 수 없습니다.";
					Msg::GblMsgBoxParent($msg);
					exit;
				}
			}

			$sql = "update ks_member set ";
			$sql .= "gender='$gender',";
			$sql .= "name='$name',";
			$sql .= "phone='$phone',";

			if(trim($_POST['passwd'])){
				$passwd	= hash('sha256',trim($_POST['passwd']));
				$sql .= "passwd = '$passwd',";
			}

			$sql .= "zipcode='$zipcode',";
			$sql .= "addr01='$addr01',";
			$sql .= "addr02='$addr02',";
			$sql .= "email='$email',";
			$sql .= "bDate='$bDate',";
			$sql .= "bTime='$bTime',";
			$sql .= "rCode='$rCode'";			
			$sql .= " where userid='".$userid."'";
			sqlExe($sql);

			//로그인 세션변경
			session_start();
			$_SESSION['ses_member_name'] = $name;

			Msg::GblMsgBoxParent("회원정보가 수정 되었습니다.","location.href='/';");
			exit;
		}
	}


}elseif($type == 'del'){
	$sql = "select * from ks_member where uid='$uid'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	$upfile01 = $row['upfile01'];
	if($upfile01){
		$UPLOAD_DIR = '../upfile/user/';
		@unlink($UPLOAD_DIR.$upfile01);
	}

	$sql = "delete from ks_member where uid='$uid'";
	$result = mysql_query($sql);

	Msg::goKorea('up_index.php');
	exit;


}elseif($type == 'secede'){

	$secedeDate = date('Y-m-d H:i:s');
	$secedeTime = mktime();

	$sql = "update ks_member set status=3, memo2='$memo2', secedeDate='$secedeDate', secedeTime='$secedeTime' where uid='$uid'";
	$result = mysql_query($sql);

	Msg::GblMsgBoxParent("정상적으로 탈퇴처리되었습니다..","location.href='/module/login/logout_proc.php';");
	exit;

}
?>