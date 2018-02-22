<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div class="user_copyright"> <a href="http://www.abc3210.com" target="_blank">www.abc3210.com</a> 版权所有，保留一切权利！ © 2013 ShuipFCMS 驱动 <a target="_blank" href="http://www.miitbeian.gov.cn/">闽ICP备13015355号-1</a> 执行时间：{:G('run', 'end')}s</div>
<script type="text/javascript" src="{$model_extresdir}js/jquery.artDialog.min.js"></script>
<script type="text/javascript">
	//监听消息
	listenMsg.start();
	//用户导航
	nav.userMenu();
	nav.init();
</script>  