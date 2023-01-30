<?
	include '../header.php';
	$side_menu=1;
?>
<div class="subvisual">
	<img src="/images/sub_visual.png">
</div>

<div style='width:100%;padding:85px 0;'>
	<div class='sub-wrap clearfix'>
		
		<?
			include 'sidemenu.php';
		?>
		<div class='content_box'>
<!-----------------준비중 화면------------------------>
	<style>
		.sample-re{
			font-family: 'NanumSquare', sans-serif;
			transform: skew(-0.001deg);
			padding:20% 0;
			color:#333;
			word-break:keep-all;
			font-size:18px;
			line-height:150%;
			text-align:center;
		}
		.sample-re .img{width:13%; margin:0 auto;}
		.sample-re .txt>h1{font-size:50px; font-weight:400; margin:50px 0;line-height:150%;}
		.sample-re .txt .txt-s{color:#666;}

		@media screen and (max-width:768px){
			.sample-re{
				padding:10% 0;
				font-size:16px;
				transform: skew(-0.001deg);
			}
			.sample-re .img{width:25%; margin:0 auto;}
			.sample-re .txt>h1{font-size:30px; margin:30px 0 20px;}
		}
	</style>

	<div class="sample-re">
		<div class="img">
			<img src="http://i-web.kr/wlsdud0812/uploaded/smart/N201222101346vkz57wrbtp.png" alt="pic" style="width:100%;">
		</div>
		<div class="txt">
			<h1>페이지 준비중입니다.</h1>
			<div class="txt-s">
				이용에 불편을 드려 죄송합니다.<br>
				빠른 시일내에 준비하도록 하겠습니다.
			</div>
		</div>
	</div>
<!------------------준비중 화면----------------------->
		</div>
	</div>
</div>
<?
	include '../footer.php';
?>