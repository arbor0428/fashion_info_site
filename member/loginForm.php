<script>
function login_check(){
	form = document.LOG;
	if(isFrmEmptyModal(form.userid, "아이디를 입력해 주십시오"))	return;
	if(isFrmEmptyModal(form.passwd, "비밀번호를 입력해 주십시오"))	return;

	if(isObject(form.isSave)){
		if(form.isSave.checked==true){
			setCookie("save_userid", "Y", 1);
			setCookie("ck_userid", form.userid.value, 1);
		}else{
			setCookie("save_userid", "", 1);
		}
	}

	form.target = 'ifra_gbl';
	form.action = '/module/login/login_proc.php';
	form.submit();
}
</script>

<form name='LOG' method='post' action="">
<input type='hidden' name='type' value=''>
<input type='hidden' name='next_url' value='/member/mypage.php'>

<div class='login-wraps clearfix'>
	<div class='login-btn-wrap clearfix'>
		<div class="login-btn">
			<div class="squared">
				<input type="checkbox" checked onclick="return false" class="cb20">
			</div>
			<label for="squared2"><p style="margin-left:5px;">보안로그인</p></label>
		</div>

		<div class="login-btn">
			<div class="squared">
				<input type="checkbox" value="" id="isSave" name="isSave"  class="cb20">
			</div>
			<label for="isSave"><p style="margin-left:5px;">아이디 저장</p></label>
		</div>
	</div>

	
	<div class="box">
		<label class="field" style="padding:0; margin:0;">
			<span class="insert">
				<input type="text" name="userid" id="userid" class="input_text medium" style="margin:0 0 30px 0; ime-mode:disabled;" placeholder="아이디" onkeypress="if(event.keyCode==13){login_check();}" autocomplete="off">
			</span>
		</label>
		<label class="field" style="padding:0; margin:0;">
			<span class="insert">
				<input type="password" name="passwd" id="passwd" class="input_text medium" style="margin-top:0;" placeholder='비밀번호' onkeypress="if(event.keyCode==13){login_check();}" autocomplete="off">
			</span>
		</label>
	</div>

	<div class="box txt_c">
		<a href="search_id.php" class="member-btn">아이디를 잊으셨습니까?</a>
		<a href="search_pw.php" class="member-btn">비밀번호를 잊으셨습니까?</a>
	</div>

<!--
	<div class="etc_way_box">
		<a class="w_box kakao_btn" title="카카오톡으로 시작하기">
			<img src="/images/kakao-talk.png">
			<span>카카오톡 시작하기</span>
		</a>
		<a class="w_box mail_btn" title="메일로 시작하기">
			<img src="/images/gmail.png">
			<span>이메일로 시작하기</span>
		</a>
	</div>
-->


	<a href="javascript:login_check();" class="member-login-btn">로그인</a>

</div>

</form>

<?if($GBL_USERID == ''){?>
<script>
set_auto('0');
</script>
<?}?>