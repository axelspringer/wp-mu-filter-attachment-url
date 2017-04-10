<?php
// @codingStandardsIgnoreFile

/**
 * Replace home url with static url / s3 in attachment url
 * @param $url
 * @param $postId
 * @return mixed
 */
function wp_get_attachment_url_static_replace($url, $postId)
{
    return str_replace(WP_HOME, STATIC_URL, $url);
}
add_filter('wp_get_attachment_url', 'wp_get_attachment_url_static_replace', 99, 2);

/**
 * Replace home url with static url / s3 in srcset url array
 *
 * @param $sources
 * @param $size_array
 * @param $image_src
 * @param $image_meta
 * @param $attachment_id
 */
function wp_calculate_image_srcset_static_replace($sources, $size_array, $image_src, $image_meta, $attachment_id)
{
    foreach ($sources as $source) {
        $source['url'] = str_replace(WP_HOME, STATIC_URL, $source['url']);
    }
}

add_filter('wp_calculate_image_srcset', 'wp_calculate_image_srcset_static_replace', 99, 5);
