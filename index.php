<?php
/**
 * 基于 MDUI 的 Typecho 主题
 * 
 * @package Typecho Theme MDUI
 * @author Jonb
 * @version 1.0.0
 * @link http://jonbgua.com/
 */
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>

<div class="main" id="main" role="main">
    <div class="mdui-container">
        <!-- 文章列表 -->
        <div class="video-list mdui-row">
            <!--文章个体 -->
            <?php while($this->next()): ?>
                <div class="video-item mdui-col-xs-12 mdui-col-sm-8 mdui-col-offset-sm-2 mdui-col-md-6 mdui-col-offset-md-3">
                    <a href="<?php $this->permalink() ?>">
                        <div class="mdui-card">
                            <div class="mdui-card-media">
                                <!-- 卡片背景图 -->
                                <?php if (array_key_exists('thumb',unserialize($this->___fields()))): ?>
                                    <img src="<?php echo $this->fields->thumb; ?>"/>
                                <?php endif; ?>

                                <div class="mdui-card-media-covered">
                                    <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title"><?php $this->title() ?></div>
                                        <div class="mdui-card-primary-subtitle"><i class="mdui-icon material-icons">&#xe417;</i> <?php get_post_view($this) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- 分页导航 -->
        <nav>
            <?php $this->pageNav('&laquo;', '&raquo;'); ?>
        </nav>
        <br/>
    </div>
</div>

</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
