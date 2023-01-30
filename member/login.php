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

	$restAPIKey = "263f146cbc70ed817efa8dddbd8db8d2"; //본인의 REST API KEY를 입력해주세요
	$callbacURI = urlencode("https://www.style7.co.kr/module/kakao/loginCheck.php"); //본인의 Call Back URL을 입력해주세요
	$kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=".$restAPIKey."&redirect_uri=".$callbacURI."&response_type=code";
?>

<div class="content_box">
	<div class="inr">
		<div class="center sub">
			<div class="logins member-cont">
				<div class="input-area clearfix" >
					<h2>LOGIN
						<p>로그인</p>
					</h2>
					<?
						include 'loginForm.php';
					?>

					<!-- 카카오 로그인 -->
					<div class='login-wraps m_50'>
						<a href='<?=$kakaoLoginUrl?>' class="member-login-btn kakao"></a>
					</div>
					<!-- /카카오 로그인 -->

				</div>
			</div>
		</div>
	</div>
</div>



<?
	include '../footer.php';
?>