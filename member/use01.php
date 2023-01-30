<?
	include '../header.php';
?>

<style>
.content_box.policy {background:#fdfdfd;}
.content_box.policy .cont {padding:20px 60px; background:#fff; border:1px solid #f1f1f1; margin-top:50px;}
.content_box.policy h6 {font-size:1.15rem; margin:12px 0;}
.content_box.policy h6.small_ {font-size:1rem; margin:0; font-weight:500;}
.content_box.policy p {line-height:1.5;}
.content_box.policy .inr01:last-child {border-bottom:none;}

@media screen and (max-width:768px){
	.content_box.policy .cont {padding:20px;}
}
</style>
<div class="content_box policy">
	<div class="inr">
		<h2>이용약관</h2>
		
		<div class="cont">
		<?
			//개인정보처리방침내용
			include 'useHtml.php';
		?>
		</div>
	</div>
</div>

<?
	include '../footer.php';
?>