<script>
function pageNum2(fname,rs){
	form = document[fname];
	form.record_start2.value = rs;
	form.target = '';
	form.action = form.next_url.value;
	form.submit();
}
</script>

<style type='text/css'>
.pageNum2 *{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}
.pageNum2{padding:24px 0;text-align:center;}
.pageNum2 .this,.pageNum2 a,.pageNum2 strong{position:relative; display:inline-block;width:40px; height:40px; line-height:40px;margin:0 5px; font-family: 'ONE-Mobile-Title'; font-weight: bold; font-size:1rem;}
.pageNum2 a{color:#231815; text-decoration:none!important;}
.pageNum2 .direction .lnr {font-weight: bold; font-size:1rem;}
.pageNum2 .direction .lnr.pleft {position:relative; left:5px;}
.pageNum2 .direction .lnr.pright {position:relative; right:5px;}
.pageNum2 .this,.pageNum2 a:hover{border-radius:50%; text-align: center; background-color:#1a3c93; border:none; color:#fff !important;}
.pageNum2 .direction:hover {background-color:transparent; border:none; color:#231815 !important;}
.pageNum2 .frst_last{color:#231815;}
.pageNum2 .direction{margin:0 4px;color:#231815;letter-spacing:0;font-weight:400;}
.pageNum2 strong.direction{color:#231815;}

@media (max-width:595px){
	.pageNum2 .this,.pageNum2 a,.pageNum2 strong {width:32px; height:32px; line-height:32px;}
}

</style>



<div class="pageNum2">
<?
if($total_record2 != '0'){
	if($total_record2 > $record_count2){
		
		if($current_page2 * $record_count2 > $record_count2 * $link_count2) {
			$pre_group_start2 = ($group2 * $record_count2 * $link_count2) - $record_count2;
			echo ("<a href=javascript:pageNum2('$fName','$pre_group_start2'); class='direction'><span class='lnr lnr-chevron-left pleft'></span><span class='lnr lnr-chevron-left'></span></a> ");
		}else{
			echo ("<a href='javascript://' class='direction'><span class='lnr lnr-chevron-left pleft'></span><span class='lnr lnr-chevron-left'></span></a> ");
		}


		if($total_page2 > 1 && ($record_start2 !=0 )) {
			$pre_page_start2 = $record_start2 - $record_count2;
			echo ("<a href=javascript:pageNum2('$fName','$pre_page_start2'); class='direction'>Prev</a> ");
		}else{
			echo ("<a href='javascript://' class='direction' >Prev</a> ");
		}







		for($i=0; $i<$link_count2; $i++){
			$input_start2 = ($group2 * $link_count2 + $i) * $record_count2; 

			$link2 = ($group2 * $link_count2 + $i) + 1;

			if($input_start2 < $total_record2) {
				if($input_start2 != $record_start2) {
					echo ("<a href=javascript:pageNum2('$fName','$input_start2');>$link2</a> ");
				} else {
					echo ("<a href='javascript://' class='frst_last this'>$link2</a> ");
				}
			}
		}





		if($total_page2 > 1 && ($record_start2 != ($total_page2 * $record_count2 - $record_count2))) {
			$next_page_start2 = $record_start2 + $record_count2;
			echo ("<a href=javascript:pageNum2('$fName','$next_page_start2'); class='direction'>Next</a> ");
		}else{
			$next_page_start2 = $record_start2;
			echo ("<a href='javascript://' class='direction'>Next</a> ");
		}


		if($total_record2 > (($group2 + 1) * $record_count2 * $link_count2)) {
			$next_group_start2 = ($group2 + 1) * $record_count2* $link_count2;
			echo("<a href=javascript:pageNum2('$fName','$next_group_start2'); class='direction'><span class='lnr lnr-chevron-right'></span><span class='lnr lnr-chevron-right pright'></span></a>");
		}else{
			$next_group_start2 = $record_start2;
			echo("<a href='javascript://' class='direction'><span class='lnr lnr-chevron-right'></span><span class='lnr lnr-chevron-right pright'></span></a>");
		}



		  
	}else{
		echo ("<a href='#' class='frst_last this'>1</a>");
	}
}
?>
</div>