<?
	include '../header.php';
?>


<div class='content_box'>
	<div class="inr">
		<h2>FAQ</h2>

		<div id="columns" class="m80">
		<?
			$row = sqlArray("select * from ks_faq order by uid desc");
			foreach($row as $v){
		?>
			<figure>
				<div class="lst_s_top clearfix">
					<span class="lst_s_top_tit f22"><?=$v['title']?></span>
				</div>
				<div class="lst_s_bot">
					<p class="f18"><?=$v['ment']?></p>
				</div>
			</figure>
		<?
			}
		?>
		</div>

	</div>
</div>
<?
	include '../footer.php';
?>