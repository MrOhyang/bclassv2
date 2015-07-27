<?php

//防止恶意调用
if (!defined('IN_TG')) {
	exit('Access Defined!');
}

if( $_GET['fid'] == 1 ){
	$_listlen = 5;
}
if( $_GET['fid'] == 2 ){
	$_listlen = 8;
}

?>

			<ul id="ul_news">
				<div class="annotation">提醒：在这里面显示最多<?php echo $_listlen; ?>条记录作为预览</div>
				<?php
				$_result = mysql_query("SELECT nid,title,cont,time
										FROM news
										ORDER BY time DESC
										LIMIT $_listlen
										");
				while ( !!$_rows = mysql_fetch_array($_result,MYSQL_ASSOC) ) {?>

				<li class="li_news">
					<a href="news.php?action=DETAIL&num=<?php echo $_rows['nid']; ?>"><em>[<?php echo date('m/d H:i',strtotime($_rows['time'])); ?>]</em><b><?php echo $_rows['title']; ?></b></a>
					<?php if( $_GET['fid'] == 2 ) { ?>

					<span>
						<a href="news.php?func=newsfunc&fid=2&action=DEL&delid=<?php echo $_rows['nid']; ?>"><b class="bred">删除</b></a>
						<a href="news.php?func=newsfunc&fid=2&action=UPD&updid=<?php echo $_rows['nid']; ?>"><b class="bblue">修改</b></a>
					</span>
					<?php } ?>

				</li>
				<?php } ?>

			</ul>
			<div id="d_newsfunc">
				<?php if( $_GET['fid'] == 1 ) { ?>

				<div class="annotation">提醒：在此输入相关信息提交新闻公告</div>
				<form id="f_add" method="post" action="news.php?func=newsfunc&fid=1&action=ADD">
					<input type="hidden" name="uniqid" value="<?php echo @$_uniqid; ?>">
					<table>
						<tr>
							<td><b class="bred">*</b> 新闻/公告 标题 <b class="bred">：</b></td>
							<td><input class="input" type="input" name="title"></td>
						</tr>
						<tr>
							<td>&nbsp; 来源 <b class="bred">：</b></td>
							<td><input style="width:200px;" class="input" type="input" name="nfrom"></td>
						</tr>
						<tr>
							<td valign="top"><b class="bred">*</b> 内容 <b class="bred">：</b></td>

							<td>
								<script id="container" name="cont" type="text/plain" style="width:508px;height:300px;">
									这里写你的初始化内容
								</script>
								<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
								<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
								<script type="text/javascript">
									var ue = UE.getEditor('container');
								</script>
							</td>

						</tr>
						<tr>
							<td colspan="2">
								<input id="in_new_sub" class="input" type="submit" value="确认并提交">
							</td>
						</tr>
					</table>
				</form>
				<?php } ?>
				
				<?php if( $_GET['fid'] == 2 ) { ?>
				<div class="annotation">
					提醒：您已开启‘删除修改按钮’功能状态。<br><br>
					在每条记录后面会多出‘删除按钮’和‘修改按钮’。点击相应按钮执行相应操作。<br>
					您也可以选择点击记录，进入详情页，然后进行修改操作。
				</div>
				<?php } ?>

			</div>