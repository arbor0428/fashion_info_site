
<?
	include '/home/style7/www/header.php';
	$side_menu=2;

	$table_id = 'table_1638185004';	

	if(!$table_id){
		Msg::backMsg('접근오류입니다.');
	}
	
	if(!$type)	$type = 'list';

	//게시판 환경설정
	include $boardRoot."config.php";
?>

<?
	include 'banner.php';
?>

<div style='width:100%;height:50px;border-bottom:1px solid #d1d1d1;'>
		<div class="sidebar">
			<a href="/"><div style='width:38px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:left;border-left:1px solid #d1d1d1;'><i class="fas fa-home" style="line-height:50px;"></i></div></a>
			<div class="sbfirst" style='width:140px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:left;border-left:1px solid #d1d1d1;'>정보나눔터</div>
			<div style='width:290px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:left;border-left:1px solid #d1d1d1;'>행사&보도자료</div>
			<div style='width:130px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:right;border-right:1px solid #d1d1d1;'></div>
		</div>
</div>

<div style='width:100%;padding:30px 0;background:#fafafa;border-bottom:1px solid #dddddd;'>
	<div class='sub-wrap clearfix'>
		
		<?
			include 'sidemenu.php';
		?>
		<div class='content_box'>
			<h2 class="tit1">행사&보도자료</h2>
		<?
			switch($type){
				case 'write' :
				case 'edit' :
									include $boardRoot.$write_file;
									break;

				case 'list' :
									include $boardRoot.'query.php';	//게시판 내용 쿼리
									include $boardRoot.$list_file;	//게시판 리스트
									include $boardRoot.'pageNum.php';	//게시판 페이지번호
									break;

				case 'view' :
									include $boardRoot.$view_file;
									break;

				case 're_write' :
				case 're_edit' :
									include $boardRoot.'re_write.php';
									break;

				case 're_view' :
									include $boardRoot.'re_view.php';
									break;
			}
		?>
		</div>
	</div>
</div>

<?
	include '/home/style7/www/footer.php';
?>


