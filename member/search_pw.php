<?
	include '../header.php';

	//관리자 또는 스타일리스트 로그인 상태
	if($GBL_MTYPE == 'A' || $GBL_MTYPE == 'S'){
		Msg::goNext('/adm/');
		exit;

	//일반회원 로그인 상태
	}elseif($GBL_MTYPE == 'M'){
		Msg::goNext('mypage.php');
		exit;
	}
?>

<div class="content_box">
	<div class="inr">

	<div class="center sub">
		<form name='frm01' id='frm01' method='post' action=''>
		<input type='text' style='display:none;'>


			<div class="logins member-cont">
				<div class="input-area clearfix" >
					<p class="member-title m_66">비밀번호 찾기</p>

					<div class='login-wraps clearfix'>
						<div class="box">
							<label class="field" style="padding:0; margin:0;">
								<span class="insert">
									<input class="input_text medium" style="margin:0 0 30px 0; ime-mode:disabled;" name="f_userid" type="text" value="" placeholder='아이디' onkeypress="if(event.keyCode==13){searchPWD();}">
								</span>
							</label>
							<label class="field" style="padding:0; margin:0;">
								<span class="insert">
									<input class="input_text medium" style="margin:0 0 30px 0; ime-mode:disabled;" name="f_name" type="text" value="" placeholder='이름' onkeypress="if(event.keyCode==13){searchPWD();}">
								</span>
							</label>
							<label class="field" style="padding:0; margin:0;">
								<span class="insert">
									<input class="input_text medium pw_ip" style='margin-top:0;' name="f_phone" type="text" value="" placeholder='연락처' onkeypress="if(event.keyCode==13){searchPWD();}">
								</span>
							</label>
						</div>
						<a href="javascript:searchPWD();" class="member-login-btn">확인</a>
						
						<div class="box txt_c">
							<a href='./search_id.php' class="member-btn">아이디를 잊으셨습니까?</a>
						<!--
							<a href='./join1.php' class="member-btn">회원가입 하시겠습니까?</a>
						-->
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	</div>
</div>

<script>
function searchPWD(){
	form = document.frm01;
	if(isFrmEmptyModal(form.f_userid, "아이디를 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.f_name, "이름을 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.f_phone, "연락처를 입력해 주십시오."))	return;

	id = setTimeout(function(){
		var params = jQuery("#frm01").serialize();
		jQuery.ajax({
			url: '../module/searchPWD.php',
			type: 'POST',
			data:params,
			dataType: 'html',
			success: function(result){
				if(result == 'ok'){
					GblMsgBox('회원님의 이메일로 신규 비밀번호가 발급되었습니다.',"location.href='/';");
					return;

				}else{
					GblMsgBox('입력하신 정보와 일치하는 회원 정보가 없습니다.','');
					return;
				}
			},
			error: function(error){
				GblMsgBox('전송오류');
				return;
			}
		});
	}, 100);
}
</script>

<?
	include '../footer.php';
?>