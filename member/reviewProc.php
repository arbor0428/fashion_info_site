<?
include '../module/login/head.php';
include '../module/class/class.DbCon.php';
include '../module/class/class.Util.php';
include '../module/class/class.Msg.php';
include '../module/class/class.FileUpload.php';
include '../module/file_filtering.php';

if($type == 'write'){
	//파일업로드
	include 'reviewFileChk.php';

	$userid = $_POST['userid'];
	$name = $_POST['name'];
	$pid = $_POST['pid'];
	$orderNum = $_POST['orderNum'];
	$score = $_POST['rating'];
	$ment = Util::textareaEncodeing($_POST['ment']);

	$userip = $_SERVER['REMOTE_ADDR'];
	$rDate = date('Y-m-d H:i:s');
	$rTime = time();

	$sql = "insert into ks_review (userid,name,pid,orderNum,score,upfile01,realfile01,upfile02,realfile02,upfile03,realfile03,upfile04,realfile04,upfile05,realfile05,upfile06,realfile06,ment,userip,rDate,rTime) values  ('$userid','$name','$pid','$orderNum','$score','$arr_new_file[1]','$real_name[1]','$arr_new_file[2]','$real_name[2]','$arr_new_file[3]','$real_name[3]','$arr_new_file[4]','$real_name[4]','$arr_new_file[5]','$real_name[5]','$arr_new_file[6]','$real_name[6]','$ment','$userip','$rDate','$rTime')";
	sqlExe($sql);

	//작성자 정보
	$row = sqlRow("select * from ks_member where userid='".$userid."'");
	$currentPoint = $row['point'];		//보유포인트
	$phone = $row['phone'];

	//리뷰 작성 포인트
	$reviewPoint = sqlRowOne("select reviewPoint from ks_shopConfig");
	if($reviewPoint){

		$afterPoint = $currentPoint + $reviewPoint;
		$pMent = "[".$orderNum."] 리뷰작성";

		$sql = "insert into ks_pointList (userid,ptype,point,afterPoint,currentPoint,pMent,orderNum,userip,rDate,rTime) values ";
		$sql .= "('$userid','P','$reviewPoint','$afterPoint','$currentPoint','$pMent','$orderNum','$userip','$rDate','$rTime')";
		sqlExe($sql);

		//포인트 적립
		sqlExe("update ks_member set point=$afterPoint where userid='".$userid."'");
	}

	//알림톡 발송
	$talkType = 'review';
	$clientName = $name;
	$clientNumber = $phone;
	$clientID = $userid;

	include '../module/kakao/alimtalk.php';

	Msg::goKorea('/sub03/sub01.php');
}
?>