<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    $navbarColor = new Typecho_Widget_Helper_Form_Element_Text('navbarColor', NULL, NULL, _t('导航栏颜色'), _t('填入颜色代码以定义导航栏颜色'));
    $form->addInput($navbarColor);
    $navbarFontColor = new Typecho_Widget_Helper_Form_Element_Text('navbarFontColor', NULL, NULL, _t('导航栏文字颜色'), _t('填入颜色代码以定义导航栏文字颜色'));
    $form->addInput($navbarFontColor);

    $icpNum = new Typecho_Widget_Helper_Form_Element_Text('icpNum', NULL, NULL, _t('网站备案号'), _t('在这里填入网站备案号'));
    $form->addInput($icpNum);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        array('ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项')),
        array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));

    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

function showThumb($obj, $size = null, $link = false)
{
    preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches);
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1) {
        $thumb = $attach->url;
        if (!empty($options->src_add)) {
            $thumb = str_ireplace($options->src_add, $thumb);
        }
    } elseif (isset($matches[1][0])) {
        $thumb = $matches[1][0];
        if (!empty($options->src_add)) {
            $thumb = str_ireplace($options->src_add, $thumb);
        }
    }
    if (empty($thumb) && empty($options->default_thumb)) {
        return '';
    } else {
        $thumb = empty($thumb) ? $options->default_thumb : $thumb;
    }
    if ($link) {
        return $thumb;
    }
}

function parseFieldsThumb($obj)
{
    $options = Typecho_Widget::widget('Widget_Options');
    if (!empty($options->src_add)) {
        $fieldsThumb = str_ireplace($options->src_add, $obj->fields->thumb);
        echo trim($fieldsThumb);
    } else {
        return $obj->fields->thumb();
    }
}

function get_post_view($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
    }
    echo $row['views'];
}