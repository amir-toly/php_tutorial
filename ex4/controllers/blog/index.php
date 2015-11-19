<?php

include '../../models/blog/index.php';

function display_pagination() {
	global $page, $nb_pages;
	
	echo '<p>Page';
	
	for ($i = 1; $i <= $nb_pages; $i++)
	{
		if ($i !== $page)
			echo ' <a href="index.php?page=' . $i . '">' . $i . '</a>';
		else
			echo ' ' . $i;
	}
	
	echo '</p>';
}

session_start();

$member_nickname = '';
$member_pwd = '';
$connected_member_nickname = '';

if (isset($_COOKIE['member_nickname']))
{
	$member_nickname = $_COOKIE['member_nickname'];
}
if (isset($_COOKIE['member_pwd']))
{
	$member_pwd = $_COOKIE['member_pwd'];
}
if (isset($_SESSION['connected_member_nickname']))
{
	$connected_member_nickname = $_SESSION['connected_member_nickname'];
}

if (
	!$connected_member_nickname &&
	$member_nickname &&
	$member_pwd
)
{
	if (check_cookies($member_nickname, $member_pwd))
	{
		$connected_member_nickname = $_SESSION['connected_member_nickname'] = $member_nickname;
	};
}

define('NB_POSTS_PER_PAGE', 5);

$page = 0;

if (isset($_GET['page']))
{
	$page = (int) $_GET['page'];
}

if ($page === 0)
	$page++;

// Get the number of posts
$nb_posts = get_nb_posts();

// Get the number of pages
$remainder = $nb_posts % NB_POSTS_PER_PAGE;
$nb_pages = intval($nb_posts / NB_POSTS_PER_PAGE) + ($remainder > 0 ? 1 : 0);//TODO(use ceil() instead?)

$offset = ($page - 1) * NB_POSTS_PER_PAGE;

$posts = get_posts($offset);//TODO(add NB_POSTS_PER_PAGE as a parameter)

foreach($posts as $key => $post)
{
	$posts[$key]['title'] = htmlspecialchars($post['title']);
	$posts[$key]['content'] = nl2br(htmlspecialchars($post['content']));
}

include '../../views/blog/index.php';

?>
