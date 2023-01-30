<script src="https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js"></script>
<script>
function checkID(c){
	form = document.FRM;

	if(isFrmEmptyModal(form.userid,"아이디를 입력해 주십시오."))	return true;

	ID = form.userid.value;

	for( var i=0 ; i < ID.length ; i++ ){
		if( i == 0 ){
			if( (ID.charAt(i) >= '0' && ID.charAt(i) <= '9') ){
				GblMsgBox("아이디 첫글자는 영문이어야 합니다.");
				form.userid.focus();
				return true;
			}
		}
	}

	if(!isAlphaModal(form.userid, "아이디는 영문자와 숫자만 입력해 주세요."))	return true;

	if(ID.length < 4 || ID.length > 12){
		GblMsgBox("아이디는 4~12자 이내입니다.");
		form.userid.focus();
		return true;
	}

	if(c){
		userid = $('#userid').val();

		$.post('../module/common/UserIdCheck.php',{'userid':userid}, function(cnt){
			if(cnt != 0){
				GblMsgBox('사용할 수 없는 아이디입니다.','');
				form.userid.focus();

			}else{
				GblMsgBox('사용 가능한 아이디입니다.','');
				form.pwd.focus();
			}
		});
	}
}

function setChkBox(obj,chk){
	eChk = document.getElementsByName(obj);

	for(var i=0;i<eChk.length;i++){
		if(i == chk)	eChk[i].checked = true;
		else			eChk[i].checked = false;
	}
}

function openDaumPostcode() {
	new daum.Postcode({
		oncomplete: function(data) {
			// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

			// 각 주소의 노출 규칙에 따라 주소를 조합한다.
			// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
			var fullAddr = ''; // 최종 주소 변수
			var extraAddr = ''; // 조합형 주소 변수

			// 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
			if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
				fullAddr = data.roadAddress;

			} else { // 사용자가 지번 주소를 선택했을 경우(J)
				fullAddr = data.jibunAddress;
			}

			// 사용자가 선택한 주소가 도로명 타입일때 조합한다.
			if(data.userSelectedType === 'R'){
				//법정동명이 있을 경우 추가한다.
				if(data.bname !== ''){
					extraAddr += data.bname;
				}
				// 건물명이 있을 경우 추가한다.
				if(data.buildingName !== ''){
					extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
				fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
			}

			// 우편번호와 주소 정보를 해당 필드에 넣는다.			
/*
			document.getElementById('zip01').value = data.postcode1;
			document.getElementById('zip02').value = data.postcode2;
*/
			document.getElementById('zipcode').value = data.zonecode;
			document.getElementById('addr01').value = fullAddr;
			document.getElementById('addr02').focus();
		}
	}).open();
}
</script>

<?
	//회원가입
	if($type=='write'){
?>
<script>
function check_form(){
	form = document.FRM;

	//아이디 유효성검사
	if(checkID())	return;

	userid = $('#userid').val();

	$.post('../module/common/UserIdCheck.php',{'userid':userid}, function(cnt){
		if(cnt != 0){
			GblMsgBox('사용할 수 없는 아이디입니다.','');
			form.userid.focus();

		}else{
			if(!isCheckModal(form.gender,"성별을 선택해 주십시오.")){
				$("#g1").attr("tabindex", -1).focus();
				return;
			}

			if(isFrmEmptyModal(form.name,"이름을 입력해 주십시오."))	return;
			if(isFrmEmptyModal(form.phone,"연락처를 입력해 주십시오."))	return;

			if(isFrmEmptyModal(form.passwd,"비밀번호를 입력해 주십시오."))	return;
			passwd = $('#passwd').val();
			if(passwd.length < 6 || passwd.length > 10){
				GblMsgBox("비밀번호는 6~10자 이내입니다.");
				form.passwd.focus();
				return;
			}

			if(isFrmEmptyModal(form.pwdchk,"비밀번호를 한번 더 입력해 주십시오."))	return;			
			pwdchk = $('#pwdchk').val();

			if(passwd != pwdchk){
				GblMsgBox("비밀번호를 확인해 주십시오.");
				form.pwdchk.focus();
				return;
			}

			if(isFrmEmptyModal(form.zipcode,"우편번호를 입력해 주십시오."))	return;
			if(isFrmEmptyModal(form.addr01,"기본주소를 입력해 주십시오."))	return;
			if(isFrmEmptyModal(form.addr02,"상세주소를 입력해 주십시오."))	return;

			if(isFrmEmptyModal(form.email01,"이메일을 입력해 주십시오."))	return;
			if(isFrmEmptyModal(form.email02,"이메일을 입력해 주십시오."))	return;

			if($('#email01').val() && $('#email02').val()){
				email = $('#email01').val()+'@'+$('#email02').val();
				okEmail = isEmailChk(email);
				if(!okEmail){
					GblMsgBox('이메일을 정확히 기재해 주시기 바랍니다.');
					$('#email01').focus();
					return;
				}
			}

			if(isFrmEmptyModal(form.bDate,"생년월일을 입력해 주십시오."))	return;
/*
			form.target = 'ifra_gbl';
			form.action = 'joinProc.php';
			form.submit();
*/

			if(!isCheckModal(form.payMode,"결제방법을 선택해 주십시오.")){
				$("#payCard").attr("tabindex", -1).focus();
				return;
			}

			name = $('#name').val();
			phone = $('#phone').val();
			addr01 = $('#addr01').val();
			addr02 = $('#addr02').val();

			$.post('../module/common/UserTypeCheck.php',{'name':name,'phone':phone,'addr01':addr01,'addr02':addr02}, function(s){
				if(s){
					GblMsgBox('고객님은 스타일링 서비스 이용에 제한이 있으니 양해 부탁드립니다.','');

				}else{
					UserOS = $('#UserOS').val();

					if(UserOS == 'pc'){
						$('#title_ttl').text('회원가입');
						$('#titleFrame').html("<iframe src='about:blank' name='ifra_kcp' id='ifra_kcp' width='740' height='565' frameborder='0' scrolling='no'></iframe>");
						$(".titleBox_open").click();

						form.target = 'ifra_kcp';
						form.action = '/module/kcp/pc/order.php';
						form.submit();

					}else if(UserOS == 'mobile'){
						payWin = window.open("about:blank","kcpBox");

						form.callChk.value = '1';
						form.target = 'kcpBox';
						form.action = '/module/kcp/mobile/order_mobile.php';
						form.submit();
					}
				}
			});
		}
	});
}
</script>

<?
	//정보수정
	}else{
?>
<script language='javascript'>
function check_form(){
	form = document.FRM;

	if(!isCheckModal(form.gender,"성별을 선택해 주십시오.")){
		$("#g1").attr("tabindex", -1).focus();
		return;
	}

	if(isFrmEmptyModal(form.name,"이름을 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.phone,"연락처를 입력해 주십시오."))	return;	
	if(isFrmEmptyModal(form.passwdChk,"현재 비밀번호를 입력해 주십시오."))	return;

	passwd = $('#passwd').val();
	pwdchk = $('#pwdchk').val();
	if(passwd || pwdchk){
		if(isFrmEmptyModal(form.passwd,"신규 비밀번호를 입력해 주십시오."))	return;

		if(passwd.length < 6 || passwd.length > 10){
			GblMsgBox("비밀번호는 6~10자 이내입니다.");
			form.passwd.focus();
			return;
		}

		if(isFrmEmptyModal(form.pwdchk,"신규 비밀번호를 한번 더 입력해 주십시오."))	return;

		if(passwd != pwdchk){
			GblMsgBox("신규 비밀번호를 확인해 주십시오.");
			form.pwdchk.focus();
			return;
		}
	}

	if(isFrmEmptyModal(form.zipcode,"우편번호를 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.addr01,"기본주소를 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.addr02,"상세주소를 입력해 주십시오."))	return;

	if(isFrmEmptyModal(form.email01,"이메일을 입력해 주십시오."))	return;
	if(isFrmEmptyModal(form.email02,"이메일을 입력해 주십시오."))	return;

	if($('#email01').val() && $('#email02').val()){
		email = $('#email01').val()+'@'+$('#email02').val();
		okEmail = isEmailChk(email);
		if(!okEmail){
			GblMsgBox('이메일을 정확히 기재해 주시기 바랍니다.');
			$('#email01').focus();
			return;
		}
	}

	if(isFrmEmptyModal(form.bDate,"생년월일을 입력해 주십시오."))	return;

	form.type.value = 'edit';
	form.target = 'ifra_gbl';
	form.action = 'joinProc.php';
	form.submit();
}
</script>
<?
	}
?>