<script>
function formChk(){
	form = document.frm01;

	if(isFrmEmptyModal(form.company,"업체명을 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.name,"담당자를 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.phone,"연락처를 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.email,"이메일을 입력해 주십시오."))	return;

	email = $('#email').val();
	okEmail = isEmailChk(email);
	if(!okEmail){
		GblMsgBox('이메일을 정확히 기재해 주시기 바랍니다.');
		$('#email').focus();
		return;
	}

	if(isFrmEmptyModal(form.ment,"문의내용을 입력해 주십시오."))	return;

	if($('#agreeCb').is(":checked") == false){
		GblMsgBox('개인정보 수집·이용에 동의해 주십시오.','');
		return;
	}

	form.type.value = 'write';
	form.target = 'ifra_gbl';
	form.action = 'contactProc.php';
	form.submit();
}
</script>

<form name='frm01' id='frm01' method='post' class="form m50">
<input type='text' style='display:none;'>
<input type='hidden' name='type' value=''>
<input type='hidden' name='userid' value='<?=$GBL_USERID?>'>

<fieldset>
	<legend class="blind">제휴 문의글 쓰기</legend>

	<div class="flex_both_top">
		<label class="field">
			<span class="label">업체명</span>
			<span class="insert">
				<input type="text" name="company" id="company" class="input_text medium" placeholder="업체명을 입력해 주세요.">
			</span>
		</label>

	   <label class="field">
			<span class="label">담당자</span>
			<span class="insert">
				<input type="text" name="name" id="name" class="input_text medium" placeholder="이름을 입력해 주세요.">
			</span>
		</label>
	</div>

	<div class="flex_both_top">
		<label class="field">
			<span class="label">연락처</span>
			<span class="insert">
				<input type="tel" name="phone" id="phone" class="input_text medium" placeholder="연락처를 입력해 주세요.">
			</span>
		</label>
		<label class="field">
			<span class="label">이메일</span>
			<span class="insert">
				<input type="email" name="email" id="email" class="input_text medium" placeholder="이메일을 입력해 주세요.">
			</span>
		</label>
	</div>

	<label class="field">
		<span class="label">내용</span>
		<span class="insert">
			<textarea class="textarea focus_change" name="ment" title="문의 내용을" placeholder="문의 내용을 작성해 주세요."></textarea>
		</span>
	</label>	

	<div class="field agree">
		<h3 class="agree-title"><strong>개인정보 수집·이용에 대한 안내(필수 수집·이용 항목)</strong></h3>
		<p class="m28 lh18">
			문의주신 내용의 답변을 위하여 고객님의 개인정보를 수집하며, 개인정보 수집에 동의하신 분에 한하여 문의 접수가 가능합니다.<br>
			수집하는 개인정보 항목 : 이름 / 연락처 / 이메일
		</p>
		<p class="m28">
			<input type="checkbox" class="radio" id="agreeCb"><label for="agreeCb">동의합니다.</label>
		</p>
	</div>

	<div class="button_area txt_c m66">
		<a href="javascript:formChk();" class="bts">등록하기</a>
	</div>
</fieldset>
</form>