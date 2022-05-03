<?php


namespace Youpi\YoupiNotifications\Contracts;


interface Notification
{
	public static function make(string $title = null, string $subtitle = null);
}
