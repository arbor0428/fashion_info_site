<?
include '../module/login/head.php';
include '../module/class/class.DbCon.php';
include '../module/class/class.Util.php';
include '../module/class/class.Msg.php';

$payTitle = $_POST['payTitle'];

if($payTitle == 'order'){
	$userid = trim($_POST['userid']);
	$orderNum = $_POST['orderNum'];
	$UserOS = $_POST['UserOS'];	
	$payOk = '결제완료';
	$payAmt = 0;
	$saleAmt = $_POST['saleAmt'];
	$usePoint = str_replace(',','',$_POST['usePoint']);	//사용 포인트
	$couponNum = $_POST['coupon'];
	$couponAmt = str_replace(',','',$_POST['couponAmt']);	//쿠폰 할인 금액
	$prodList = $_POST['prodList'];		//주문상품정보 (ks_orderList 테이블의 uid값 - 콤마구분)

	$userip = $_SERVER['REMOTE_ADDR'];
	$rDate = date('Y-m-d H:i:s');
	$rTime = time();

	$sql = "update ks_order set ";	
	$sql .= "UserOS='$UserOS',";
	$sql .= "status='$payOk',";
	$sql .= "payAmt='$payAmt',";
	$sql .= "saleAmt='$saleAmt',";
	$sql .= "usePoint='$usePoint',";
	$sql .= "couponNum='$couponNum',";
	$sql .= "couponAmt='$couponAmt'";
	$sql .= " where userid='".$userid."' and rTime='".$orderNum."'";
	sqlExe($sql);

	$pArr = explode(',',$prodList);
	foreach($pArr as $v){
		sqlExe("update ks_orderList set status='".$payOk."', paynum='' where uid='".$v."'");
	}

	//포인트 사용내역
	if($usePoint){
		//보유포인트
		$point = sqlRowOne("select point from ks_member where userid='".$userid."'");
		$afterPoint = $point - $usePoint;
		$pMent = "[".$orderNum."] 상품주문";

		$sql = "insert into ks_pointList (userid,ptype,point,afterPoint,pMent,orderNum,userip,rDate,rTime) values ";
		$sql .= "('$userid','M','$usePoint','$afterPoint','$pMent','$orderNum','$userip','$rDate','$rTime')";
		sqlExe($sql);

		//포인트차감
		sqlExe("update ks_member set point=$afterPoint where userid='".$userid."'");
	}

	//쿠폰사용처리
	if($couponNum){
		$sql = "update ks_coupon set orderNum='".$orderNum."', uDate='".$rDate."', uTime='".$rTime."' where uid='".$couponNum."'";
		sqlExe($sql);
	}


	//주문정보
	$row = sqlRow("select * from ks_order where userid='".$userid."' and rTime='".$orderNum."'");

	//알림톡 발송
	$talkType = 'orderpay';
	$clientName = $row['name'];
	$clientNumber = $row['phone'];
	$clientID = $row['userid'];

	include '../module/kakao/alimtalk.php';


	Msg::goKorea('mypage.php');
}
?>