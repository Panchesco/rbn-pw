<?php
$id = isset($args["id"]) ? $args["id"] : get_the_ID();
$fields = get_fields(get_the_ID());
$paged = get_query_var("paged") ? get_query_var("paged") : 1;
extract($args);
$target =
  isset($news_link["target"]) && !empty($news_link["target"])
    ? $news_link["target"]
    : "_self";
$link_title =
  isset($news_link["title"]) && !empty($news_link["title"])
    ? $news_link["title"]
    : __("Continue Reading", "rbn-pw");
$url =
  isset($news_link["url"]) && !empty($news_link["url"])
    ? $news_link["url"]
    : false;
?>
<div class="archive-news-wrapper pb-4">
	<time class="p" datetime="<?php echo $datetime; ?>"><?php echo $date; ?></time>
	<h2><?php echo $title; ?></h2>
	<div class="pb-4"><?php echo $excerpt; ?></div>
	<a class="readmore" href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php
echo $link_title;
if (
  $target == "_blank"
): ?> <span class="dashicons dashicons-external"></span><?php endif;
?></a>
</div>
