<style type='text/css'>
.pageNum *{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}
.pageNum{padding:24px 0;text-align:center;}
.pageNum .this,.pageNum a,.pageNum strong{position:relative; display:inline-block;width:40px; height:40px; line-height:40px;margin:0 5px; font-family: 'ONE-Mobile-Title'; font-weight: bold; font-size:1rem;}
.pageNum a{color:#231815; text-decoration:none!important;}
.pageNum .direction .lnr {font-weight: bold; font-size:1rem;}
.pageNum .direction .lnr.pleft {position:relative; left:5px;}
.pageNum .direction .lnr.pright {position:relative; right:5px;}
.pageNum .this,.pageNum a:hover{border-radius:50%; text-align: center; background-color:#1a3c93; border:none; color:#fff !important;}
.pageNum .direction:hover {background-color:transparent; border:none; color:#231815 !important;}
.pageNum .frst_last{color:#231815;}
.pageNum .direction{margin:0 4px;color:#231815;letter-spacing:0;font-weight:400;}
.pageNum strong.direction{color:#231815;}

@media (max-width:595px){
	.pageNum .this, .pageNum a, .pageNum strong {width:32px; height:32px; line-height:32px;}
}
</style>



<div class="pageNum">
<?
if($total_record != '0'){
	if($total_record > $record_count){
		
		if($current_page * $record_count > $record_count * $link_count) {
			$pre_group_start = ($group * $record_count * $link_count) - $record_count;
			echo ("<a href=javascript:pageNum('$fName','$pre_group_start'); class='direction'><span class='lnr lnr-chevron-left pleft'></span><span class='lnr lnr-chevron-left'></span></a> ");
		}else{
			echo ("<a href=javascript:pageNum('$fName','$pre_group_start'); class='direction'><span class='lnr lnr-chevron-left pleft'></span><span class='lnr lnr-chevron-left'></span></a> ");
		}


		if($total_page > 1 && ($record_start !=0 )) {
			$pre_page_start = $record_start - $record_count;
			echo ("<a href=javascript:pageNum('$fName','$pre_page_start'); class='direction'>Prev</a> ");
		}else{
			echo ("<a href=javascript:pageNum('$fName','$pre_page_start'); class='direction'>Prev</a> ");
		}







		for($i=0; $i<$link_count; $i++){
			$input_start = ($group * $link_count + $i) * $record_count; 

			$link = ($group * $link_count + $i) + 1;

			if($input_start < $total_record) {
				if($input_start != $record_start) {
					echo ("<a href=javascript:pageNum('$fName','$input_start');>$link</a> ");
				} else {
					echo ("<a href=javascript:pageNum('$fName','$input_start'); class='frst_last this'>$link</a> ");
				}
			}
		}





		if($total_page > 1 && ($record_start != ($total_page * $record_count - $record_count))) {
			$next_page_start = $record_start + $record_count;
			echo ("<a href=javascript:pageNum('$fName','$next_page_start'); class='direction'>Next</a> ");
		}else{
			$next_page_start = $record_start;
			echo ("<a href=javascript:pageNum('$fName','$next_page_start'); class='direction'>Next</a> ");
		}


		if($total_record > (($group + 1) * $record_count * $link_count)) {
			$next_group_start = ($group + 1) * $record_count* $link_count;
			echo("<a href=javascript:pageNum('$fName','$next_group_start'); class='direction'><span class='lnr lnr-chevron-right'></span><span class='lnr lnr-chevron-right pright'></span></a>");
		}else{
			$next_group_start = $record_start;
			echo("<a href=javascript:pageNum('$fName','$next_group_start'); class='direction'><span class='lnr lnr-chevron-right'></span><span class='lnr lnr-chevron-right pright'></span></a>");
		}



		  
	}else{
		echo ("<a href='#' class='frst_last this'>1</a>");
	}
}
?>
</div>