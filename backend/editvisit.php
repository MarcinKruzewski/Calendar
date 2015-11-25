<?php
if (!empty($_GET['id']))
{
	$ivent = new extVisit;
	$ivent->open($_GET['id']);
	/*$ivent->setParam('title','działa');*/
	/*$ivent->replace();*/
	$ivent->confirm();
}