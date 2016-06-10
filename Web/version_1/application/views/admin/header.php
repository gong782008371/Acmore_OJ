<?php 
$current_url = str_replace('/Acmore_1/', '', $_SERVER["REQUEST_URI"]);
if(!key_exists('currenturl', $_SESSION)) {
	$_SESSION['currenturl'] = $current_url;
}
if (!key_exists('lasturl', $_SESSION)) {
	$_SESSION['lasturl'] = 'index.php/home';
}
function is_login_regist($url) {
	return strstr($url, "login") || strstr($url, "regist");
}
if( !(is_login_regist($_SESSION["currenturl"]) && is_login_regist($current_url)) ) {
	if( $_SESSION["currenturl"] != $current_url ) {
		$_SESSION["lasturl"] = $_SESSION["currenturl"];
		$_SESSION["currenturl"] = $current_url; 
	}
}
?>

<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css">
</head>
<body>

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>Acmore</strong> <small>后台管理模板</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <!-- <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li> -->
          <li><a href="<?php echo base_url()?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo base_url()?>index.php/admin"><span class="am-icon-home"></span> 主页</a></li>
        <li><a href="<?php echo base_url()?>index.php/admin/news/add_news"><span class="am-icon-bookmark"></span> 添加新闻</a></li>
        <li><a href="<?php echo base_url()?>index.php/admin/problem_list" class="am-cf"><span class="am-icon-table"></span> 题目列表</a></li>
        <li><a href="<?php echo base_url()?>index.php/admin/problem/add_problem"><span class="am-icon-pencil-square-o"></span> 添加题目</a></li>
        <!--<li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-1'}"><span class="am-icon-th"></span> 题目管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav-1">
            <li><a href="<?php echo base_url()?>index.php/admin/problem_list" class="am-cf"><span class="am-icon-table"></span> 题目列表</a></li>
            <li><a href="<?php echo base_url()?>index.php/admin/add_problem"><span class="am-icon-pencil-square-o"></span> 添加题目</a></li>
          </ul>
        </li>
         <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-2'}"><span class="am-icon-calendar"></span> 竞赛管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav-2">
            <li><a href="<?php echo base_url()?>index.php/admin/contest_list" class="am-cf"><span class="am-icon-table"></span> 竞赛列表</a></li>
            <li><a href="<?php echo base_url()?>index.php/admin/add_contest"><span class="am-icon-pencil-square-o"></span> 添加竞赛</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url()?>index.php/admin/import"><span class="am-icon-puzzle-piece"></span> 题目导入</a></li>
        <li><a href="<?php echo base_url()?>index.php/admin/export"><span class="am-icon-puzzle-piece"></span> 题目导出</a></li>
        <li><a href="<?php echo base_url()?>index.php/admin/privilege"><span class="am-icon-user"></span> 权限管理</a></li> -->
        <li><a href="<?php echo base_url()?>"><span class="am-icon-sign-out"></span> 返回OJ</a></li>
      </ul>
    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">