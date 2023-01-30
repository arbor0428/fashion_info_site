<?
	include '../header.php';
	include '../module/loading.php';

	if(count($chk) == 0){
		Msg::backMsg("접근오류");
		exit;
	}
?>

<script>
function formChk(t){
	form = document.frm01;

	if(t == 'return'){
		if(isFrmEmptyModal(form.returnMent,"반품 사유를 입력해 주십시오."))	return;
		title = '반품 신청';
	}else if(t == 'reorder'){
		if(isFrmEmptyModal(form.reorderMent,"재신청 사유를 입력해 주십시오."))	return;
		title = '재신청';
	}

	GblMsgConfirmBox("정말 "+title+" 하시겠습니까?","formOK('"+t+"')");
}

function formOK(t){
	form = document.frm01;
	form.type.value = t;
	form.target = 'ifra_gbl';
	form.action = 'returnProc.php';
	form.submit();
}
</script>

<form name='frm01' method='post'>
<input type='text' style='display:none;'>
<input type='hidden' name='uid' value='<?=$uid?>'>
<input type='hidden' name='type' value=''>
<input type='hidden' name='orderNum' value='<?=$orderNum?>'>

<?
foreach($chk as $v){
?>
<input type='hidden' name='chk[]' value='<?=$v?>'>
<?
}
?>

<style>
.f_b_f_box textarea::placeholder {font-size:1rem;}
</style>
<div class="content_box">
	<div class="inr">
		<div id="feedback_form">
			<h2>여러분의 소중한 의견을 주세요!</h2>
			<div class="return_wrap">
				<div class="f_b_f_box">
					<!--<p>"그냥 반품 하고 싶어요"</p>-->
					<textarea name='returnMent' placeholder="ex) 마음에 들지 않아요.&#10;ex) 바지 허리가 너무 커요."></textarea>
					<a href="javascript:formChk('return');">반품하기</a>
				</div>
				<!--
				<div class="f_b_f_box">
					<p>"개선해서 다시 받고 싶어요"</p>
					<textarea name='reorderMent' placeholder="ex) 원피스 길이가 조금 긴 것으로 다시 추천 해주세요.&#10;ex) 가디건 길이가 짧은 것으로 다시 추천해 주세요."></textarea>
					<a href="javascript:formChk('reorder');" class="blu-bt">재신청하기</a>
				</div>
				-->
			</div>
			<!--
			<div class="warn_detail">
				<p>※ 재신청하기에 적어주신 내용은 <br>바로 담당 스타일리스트에게 전달이 됩니다.</p>
				<p>※ 따로 다시 설문 조사를 할 필요없이 <br>해당 내용을 참고하여 다시 스타일링을 진행합니다.</p>
			</div>
			-->
		</div>
	</div>
</div>

</form>

<?
	include '../footer.php';
?>