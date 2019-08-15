<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container">
    <div class="mdui-row">
        <!-- 左栏 -->
        <div class="mdui-col-xs-12 mdui-col-md-9">
            <!-- 视频播放器 -->
            <div class="video-player mdui-card">
                <div class="mdui-video-container">
                    <?php if($this->fields->video == "suit") : ?>
                        <video id="mainstream" class="video-js vjs-default-skin vjs-big-play-centered vjs-16-9" controls preload="auto" poster="<?php if(array_key_exists('thumb',unserialize($this->___fields()))){echo $this->fields->thumb;}?>" data-setup="{}">
                            <?php if(array_key_exists('m3u8',unserialize($this->___fields()))): ?>
                                <source src="<?php echo $this->fields->m3u8; ?>" type='application/x-mpegURL'>
                            <?php endif; ?>
                            <?php if(array_key_exists('mp4',unserialize($this->___fields()))): ?>
                                <source src="<?php echo $this->fields->mp4; ?>" type='video/mp4'>
                            <?php endif; ?>
                            <?php if(array_key_exists('flv',unserialize($this->___fields()))): ?>
                                <source src="<?php echo $this->fields->flv; ?>" type='video/x-flv'>
                            <?php endif; ?>
                            <p class='vjs-no-js'>
                                为观看视频，请启用浏览器 Javascript 功能。建议升级至
                                <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\">支持 HTML5 视频的浏览器</a>
                            </p>
                        </video>
                    <?php elseif ($this->fields->video == "iframe"): ?>
                        <iframe src="<?php echo $this->fields->iframe; ?>" frameborder=0 allowfullscreen></iframe>
                    <?php endif; ?>
                </div>
            </div>
            <!-- 视频简介 -->
            <div class="video-info mdui-card">
                <div class="mdui-card-primary-title card-title"><?php $this->title() ?></div>
                <div class="mdui-divider-dark"></div>
                <div class="mdui-card-content">
                    <span class="status-info"></span>
                    <?php $this->content(); ?>
                </div>
            </div>
            <!-- 评论区 -->
            <?php $this->need('comments.php'); ?>
        </div>
        <!-- 右栏 -->
        <div class="mdui-col-md-3 mdui-hidden-xs-down">
            <!-- 分享按钮 -->
            <div class="mdui-card" id="share">
                <div class="mdui-card-primary-subtitle card-title">分享视频</div>
            </div>
            <!-- 随机文章 -->
            <div class="random-video mdui-card">
                <div class="mdui-card-primary-subtitle card-title">您可能还喜欢...</div>
                <div class="mdui-container">
                    <!-- 个体 start -->
                    <div class="mdui-grid-tile">
                        <img src="mdui/img/card.jpg"/>
                        <div class="mdui-grid-tile-actions mdui-grid-tile-actions-gradient">
                            <div class="mdui-grid-tile-title">另一个视频的标题</div>
                        </div>
                    </div>
                    <!-- 个体 end -->
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- end #main-->
<?php $this->need('footer.php'); ?>
