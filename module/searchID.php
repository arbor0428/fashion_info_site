<?
	include './class/class.DbCon.php';
	include './class/class.Util.php';
	include './enc_func.php';

	$f_name = trim($_POST['f_name']);
	$f_phone = trim($_POST['f_phone']);

	$row = sqlRow("select * from ks_member where name='$f_name' and phone='$f_phone'");
	if($row){
		$strlen = mb_strlen($row['userid']);
		$limit = round($strlen / 2);
		if($limit > 5)	$limit = 5;
		$userid = Util::NameCutStr($row['userid'],$limit,'*');

		echo $userid;
	}
?>