<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link href="//cdn.bootcss.com/normalize/7.0.0/normalize.css" rel="stylesheet">

    <!-- MDUI -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('vendors/mdui/css/mdui.min.css'); ?>">
    <script src="<?php $this->options->themeUrl('vendors/mdui/js/mdui.min.css'); ?>"></script>

    <!-- VideoJS -->
    <link href="//cdn.bootcss.com/video.js/6.0.1/video-js.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/video.js/6.0.1/video.min.js"></script>
    <script src="//cdn.bootcss.com/videojs-contrib-hls/5.5.0/videojs-contrib-hls.min.js"></script>

    <!--[if lt IE 8]>
    <script src="//cdn.bootcss.com/video.js/6.0.1/ie8/videojs-ie8.min.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- 主题样式 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<!-- 顶部导航 -->
<header>
    <nav class="mdui-toolbar mdui-color-theme">
        <div class="mdui-container">
            <span class="mdui-typo-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></span>
            <li class="mdui-btn <?php if($this->is('index')) echo 'mdui-list-item-active' ?>">
                <a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
            </li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <li class="mdui-btn <?php echo $this->is('page', $pages->slug)?'mdui-list-item-active':'' ?>">
                    <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                </li>
            <?php endwhile; ?>
        </div>
    </nav>
</header>

    
    
