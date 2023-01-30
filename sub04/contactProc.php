<?
include '../module/login/head.php';
include '../module/class/class.DbCon.php';
include '../module/class/class.Util.php';
include '../module/class/class.Msg.php';


if($type == 'write'){
	$userid = addslashes(trim($_POST['userid']));
	$company = addslashes(trim($_POST['company']));
	$name = addslashes(trim($_POST['name']));
	$phone = addslashes(trim($_POST['phone']));
	$email = addslashes(trim($_POST['email']));
	$ment = Util::TextAreaEncodeing($_POST['ment']);

	$userip = $_SERVER['REMOTE_ADDR'];
	$rDate = date('Y-m-d H:i:s');
	$rTime = time();

	$sql = "insert into ks_contact (userid,company,name,phone,email,ment,userip,rDate,rTime) values ";
	$sql .= "('$userid','$company','$name','$phone','$email','$ment','$userip','$rDate','$rTime')";
	sqlExe($sql);

	Msg::GblMsgBoxParent("접수되었습니다.","location.href='/';");
}
?>