<?
//달력
$sRange = '80';
$eRange = '0';
include '../module/Calendar.php';

if($GBL_USERID && $type == 'edit'){
	$row = sqlRow("select * from ks_member where userid='$GBL_USERID'");
	$eArr = explode('@',$row['email']);
	$email01 = $eArr[0];
	$email02 = $eArr[1];

//카카오 인증 후 가입진행(/module/kakao/joinCheck.php 에서 넘어옴)
}elseif($kakaoID && $type == 'write'){
	$row = Array();

	$row['gender'] = $kakaoGender;
	$row['name'] = $kakaoName;
	$row['phone'] = $kakaoPhone;
//	$row['zipcode'] = '03909';
//	$row['addr01'] = '서울 마포구 매봉산로 37 (상암동, DMC 산학협력연구센터)';
//	$row['addr02'] = '605호';
	$eArr = explode('@',$kakaoEmail);
	$email01 = $eArr[0];
	$email02 = $eArr[1];
	$row['bDate'] = $kakaoBirthday;

}elseif($_SERVER['REMOTE_ADDR'] == '106.246.92.237'){
	$row['gender'] = '1';
	$row['name'] = '아이웹';
	$row['phone'] = '01052103630';
	$row['zipcode'] = '03909';
	$row['addr01'] = '서울 마포구 매봉산로 37 (상암동, DMC 산학협력연구센터)';
	$row['addr02'] = '605호';
	$email01 = 'iwebzone';
	$email02 = 'naver.com';
	$row['bDate'] = date('Y-m-d');

}

include 'script.php';
?>

<form name='FRM' id='FRM' method='post' action=''>
<input type='hidden' name='type' id='type' value='<?=$type?>'>
<input type='hidden' name='payTitle' id='payTitle' value='join'>
<input type='hidden' name='UserOS' id='UserOS' value='<?=$UserOS?>'>
<input type='hidden' name='callChk' id='callChk' value=''><!-- 모바일 결제창 호출용 -->
<input type='hidden' name='receiveChk' id='receiveChk' value='<?=$receiveChk?>'><!-- join1.php에서 넘어오는 광고 수신동의 -->

<input type='hidden' name='kakaoID' value="<?=$kakaoID?>">

<div class="flex_both_top">
	<label class="field">
		<span class="label"><span style="color:red">*</span> 아이디</span>
		<span class="insert">
		<?
			//회원가입일 경우
			if($type == 'write'){
		?>
			<div class="clearfix">
				<input type="text" name="userid" id="userid" value="" class="ipfl input_text medium" style='width:65%;ime-mode:disabled'>
				<a href="javascript:checkID(1);" class="bntstyle1">중복체크</a>
			</div>
		<?
			//정보수정일 경우
			}else{
		?>
			<div class="clearfix">
				<input type="text" name="userid" id="userid" value="<?=$GBL_USERID?>" class="input_text medium" readonly>				
			</div>
		<?
			}
		?>
		</span>
	</label>

	<label class="field">
		<span class="label"><span style="color:red">*</span> 성별</span>
		<span class="insert">
			<div class="m20">
				<input type="checkbox" name="gender" id="g1" class="radio" value='1' <?if($row['gender'] == '1'){echo 'checked';}?> onclick="setChkBox('gender',0);">
				<label for="g1" style="margin-right:12px;">남자</label>

				<input type="checkbox" name="gender" id="g2" class="radio" value='2' <?if($row['gender'] == '2'){echo 'checked';}?> onclick="setChkBox('gender',1);">
				<label for="g2">여자</label>
			</div>
		</span>
	</label>
</div>

<div class="flex_both_top">
	 <label class="field">
		<span class="label"><span style="color:red">*</span> 이름</span>
		<span class="insert">
			<input type="text" name="name" id="name" value="<?=$row['name']?>" class="input_text medium" placeholder="이름을 입력해 주세요.">
		</span>
	</label>

	
	<label class="field">
		<span class="label"><span style="color:red">*</span> 연락처</span>
		<span class="insert">
			<input type="text" name="phone" id="phone" value="<?=$row['phone']?>" class="input_text medium" style="width:100%;float:left;" placeholder="연락처" onkeyup="phoneChk(this);" maxlength='13'>
		</span>
	</label>
</div>

<?
	//회원가입일 경우
	if($type == 'write'){
?>
<div class="flex_both_top">
	<label class="field">
		<span class="label"><span style="color:red">*</span> 비밀번호<span style="font-size:13px;font-weight:400">&nbsp;(6자 ~ 10자 이내)</span></span>
		<span class="insert">
			<input type="password" name="passwd" id="passwd" value="" class="input_text medium" style="width:100%;float:left;">
		</span>
	</label>
	<label class="field">
		<span class="label"><span style="color:red">*</span> 비밀번호 확인</span>
		<span class="insert">
			<input type="password" name="pwdchk" id="pwdchk" value="" class="input_text medium" style="width:100%;float:left;">
		</span>
	</label>
</div>
<?
	//정보수정일 경우
	}else{
?>
<div class="flex_both_top">
	<label class="field">
		<span class="label"><span style="color:red">*</span> 현재 비밀번호<span style="font-size:13px;font-weight:400"></span></span>
		<span class="insert">
			<input type="password" name="passwdChk" id="passwdChk" value="" class="input_text medium" style="width:100%;float:left;">
		</span>
	</label>
</div>
<div class="flex_both_top">
	<label class="field">
		<span class="label"><span style="color:red">*</span> 신규 비밀번호<span style="font-size:13px;font-weight:400">&nbsp;(6자 ~ 10자 이내)</span></span>
		<span class="insert">
			<input type="password" name="passwd" id="passwd" value="" class="input_text medium" style="width:100%;float:left;" placeholder="변경시에만 입력">
		</span>
	</label>
	<label class="field">
		<span class="label"><span style="color:red">*</span> 신규 비밀번호 확인</span>
		<span class="insert">
			<input type="password" name="pwdchk" id="pwdchk" value="" class="input_text medium" style="width:100%;float:left;" placeholder="변경시에만 입력">
		</span>
	</label>
</div>
<?
	}
?>

<div class="flex_both_top">
	<label class="field" style="flex-basis: 100%;">
		<span class="label"><span style="color:red">*</span> 배송 받으실 주소</span>
		<span class="insert">
			<div class="clearfix">
				<input type="text" name="zipcode" id="zipcode" value="<?=$row['zipcode']?>" class="add001 input_text medium" style="width:31%;" maxlength='5' placeholder="우편번호" onclick="openDaumPostcode();" readonly><a href="javascript:openDaumPostcode();" class='bntstyle1 bntstyle3' style="width:17%;">주소찾기</a>
			</div>
			<div>
				<input type="text" name="addr01" id="addr01" value="<?=$row['addr01']?>" class="add001 add002 input_text medium" placeholder="기본주소" style='width:49%;' readonly onclick="openDaumPostcode();">
				<input type="text" name="addr02" id="addr02" value="<?=$row['addr02']?>" class="add001 add002 input_text medium" placeholder="상세주소" style='width:49%;margin-left:2%;'>
			</div>
		</span>
	</label>
</div>

<div class="flex_both_top">
	<label class="field">
		<span class="label"><span style="color:red">*</span> 이메일</span>
		<span class="insert">
			<input type="text" name="email01" id="email01" value="<?=$email01?>" class="input_text medium w50" style="width:35%;ime-mode:disabled"> @
			<input type="text" name="email02" id="email02" value="<?=$email02?>" class="ipmt10 input_text medium w50" style="width:30%;ime-mode:disabled" placeholder="직접입력">
			<select class="ipmt10" onchange="document.FRM.email02.value=this.options[this.selectedIndex].value;" style="position:relative; top:-2.5px; padding:20px 0; width:30%; height:60px; border-bottom:1px solid #ddd;">
				<option value="">:: 직접입력 ::</option>
				<?
					foreach($gblEmailArr as $k => $v){
						echo "<option value='".$v."'>".$v."</option>";
					}
				?>
			</select>
		</span>
	</label>

	<label class="field">
		<span class="label"><span style="color:red">*</span> 생년월일</span>
		<span class="insert">
			<input type="text" name="bDate" id="bDate" value="<?=$row['bDate']?>" class="input_text medium fpicker" style="width:100%;float:left;">
		</span>
	</label>
</div>

<div class="flex_both_top">
	<label class="field">
		<span class="label">추천인 아이디</span>
		<span class="insert">
			<input type="text" name="rCode" id="rCode" value="<?=$row['rCode']?>" class="input_text medium" style="width:100%;float:left;">
		</span>
	</label>
</div>





<?
	if($type == 'write'){
?>
<div class="pay_way_wrap">
	<p>스타일링비 7,700원 결제 </p>
	<p class="small red_01">* 상품 50,000원 이상 구매 시 스타일링비 7,700원이 차감됩니다.</p>
	<div class="pay_way_list clearfix">
		<div class="pay_way">
			<input type="checkbox" name="payMode" id="payCard" value="card" class="radio" onclick="setChkBox('payMode',0);">
			<label for="payCard">신용카드</label>
		  </div>
		<div class="pay_way">
			<input type="checkbox" name="payMode" id="payAcc" value="acc" class="radio" onclick="setChkBox('payMode',1);">
			<label for="payAcc">계좌이체</label>
		  </div>
		<div class="pay_way">
			<input type="checkbox" name="payMode" id="payVacc" value="vacc" class="radio" onclick="setChkBox('payMode',2);">
			<label for="payVacc">가상계좌</label>
		  </div>
	</div>
</div>
<?
	}
?>

</form>

<?
	//회원가입일 경우
	if($type == 'write'){
?>
<div class="button_area txt_c m66">
	<a href="javascript:check_form();" class="bts">결제한 후 회원가입</a>
</div>

<?if($kakaoID){?>
<script>
$(document).ready(function(){
	setTimeout(function(){
		GblMsgBoxHtml('인증된 카카오 정보 외에<br>추가 정보를 입력해 주시기 바랍니다.','');
	}, 100);
});
</script>
<?}?>


<?
	//정보수정일 경우
	}else{
?>
<div class="button_area txt_c m66">
	<a href="javascript:check_form();" class="bts">정보수정</a>
</div>
<?
	}
?>