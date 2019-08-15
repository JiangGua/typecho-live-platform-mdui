<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="mdui-color-theme" id="footer" role="contentinfo">
    <div class="mdui-container">
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        <?php if(!empty($this->options->icpNum)): ?>
            <a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $this->options->icpNum; ?></a>
        <?php endif; ?>
    </div>
</footer>
<!-- 底部结束 -->

<?php $this->footer(); ?>
</body>
</html>
