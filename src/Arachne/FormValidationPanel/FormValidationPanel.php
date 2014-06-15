<?php

/**
 * This file is part of the Arachne framework
 *
 * Copyright (c) Jáchym Toušek (enumag@gmail.com)
 *
 * For the full copyright and license information, please view the file license.md that was distributed with this source code.
 */

namespace Arachne\FormValidationPanel;

/**
 * @author Jáchym Toušek <enumag@gmail.com>
 */
class FormValidationPanel extends \Nette\Object implements \Tracy\IBarPanel
{

	/**
	 * Html code for DebuggerBar Tab
	 * @return string
	 */
	public function getTab()
	{
		return self::render(__DIR__ . '/templates/tab.phtml', array(
			'src' => function ($file) {
				return \Nette\Templating\Helpers::dataStream(file_get_contents($file));
			},
			'esc' => \Nette\Utils\Callback::closure('Nette\Templating\Helpers::escapeHtml')
		));
	}

	/**
	 * Html code for DebuggerBar Panel
	 * @return string
	 */
	public function getPanel()
	{
		return self::render(__DIR__ . '/templates/panel.phtml');
	}

	/**
	 * @param string $file
	 * @param mixed[] $vars
	 * @return string
	 */
	public static function render($file, $vars = array())
	{
		ob_start();
		foreach ($vars as $__k => $__v) $$__k = $__v;
		unset($__k, $__v);
		include str_replace('/', DIRECTORY_SEPARATOR, $file);
		return ob_get_clean();
	}

}
