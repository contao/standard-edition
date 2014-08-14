<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Interface for listable data containers
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
interface listable
{
	public function delete();
	public function show();
	public function showAll();
	public function undo();
}


/**
 * Interface for editable data containers
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
interface editable
{
	public function create();
	public function cut();
	public function copy();
	public function move();
	public function edit();
}


/**
 * Interface for executable maintenance jobs
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
interface executable
{
	public function run();
	public function isActive();
}


/**
 * Interface for widgets that can upload files
 *
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
interface uploadable {}
