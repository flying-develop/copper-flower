<?php

function generateImage($file, $sizes = '100vw', $lazy = false, $classes = null) {

    if (is_array($file)) {
        $id = $file['id'];
        $title = $file['title'];
        $alt = $file['alt'];
        $url = $file['url'];
    } else {
        $id = $file;
        $title = get_title_no_filters($id);
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        $url = wp_get_attachment_url($id);
    }

    if ($lazy) {
        $classes .= ' lazyload blur-up';
    }

    $html = "<img title='{$title}' alt='{$alt}' sizes='{$sizes}' class='{$classes}'";
        if ($lazy) {
            $html .= 'data-src="' . $url . '" ';
            $html .= 'data-srcset="' . wp_get_attachment_image_srcset($id, 'full') . '" ';
            $html .= 'src="' . wp_get_attachment_image_src($id)[0] . '"';
        } else {
            $html .= 'src="' . $url . '" ';
            $html .= 'srcset="' . wp_get_attachment_image_srcset($id, 'full') . '" ';
        }
    $html .= '/>';

    return $html;
}

function getVideoEmbedUrl($url) {

    if (substr_count(mb_strtolower($url), 'vimeo')) {
        return vimeo_id_from_url($url);
    } else {
        return youtube_id_from_url($url);
    }

}

function youtube_id_from_url($url) {
    preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);
    return 'https://www.youtube.com/embed/' . $results[6] ?? '';
}

function vimeo_id_from_url($url) {

    if (preg_match("/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $id)){
        $video_id = $id[3];
    }

    return $video_id ?? '';

}