<?
include '../module/login/head.php';
include '../module/class/class.DbCon.php';
include '../module/class/class.Util.php';
include '../module/class/class.Msg.php';

if($type == 'return' || $type == 'reorder'){
	$reDate = date('Y-m-d H:i:s');
	$reTime = time();

	if($type == 'return'){
		$status = '반품요청';
		$reMsg = Util::textareaEncodeing($returnMent);

	}elseif($type == 'reorder'){
		$status = '재신청';
		$reMsg = Util::textareaEncodeing($reorderMent);
	}

	foreach($chk as $v){
		sqlExe("update ks_orderList set status='".$status."', reDate='".$reDate."', reTime='".$reTime."', reMsg='".$reMsg."' where uid='".$v."'");
	}

	//주문정보
	$row = sqlRow("select * from ks_order where rTime='".$orderNum."'");

	//알림톡 발송
	$talkType = 'return';
	$clientName = $row['name'];
	$clientNumber = $row['phone'];
	$clientID = $row['userid'];

	include '../module/kakao/alimtalk.php';

	Msg::goKorea('cart.php?uid='.$uid);
}
?>