<?php

namespace Entity;

use Nette\Caching\Cache;


/**
 * @property int	$video_id
 * @property string	$title
 * @property string	$text1
 * @property string	$text2
 * @property string	$url
 * @property string	$keywords
 * @property DateTime	$created_at
 * @property int	$user_id
 * @property bool $online
 */
class Advert extends \ORM\EntityUrl
{

}
