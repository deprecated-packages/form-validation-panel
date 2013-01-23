<?php

namespace Arachne\FormValidationPanel;

/**
 * @author Jáchym Toušek <enumag@gmail.com>
 */
class FormValidationPanel extends \Nette\Object implements \Nette\Diagnostics\IBarPanel
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
			'esc' => callback('Nette\Templating\Helpers::escapeHtml')
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
		\Nette\Utils\LimitedScope::load(str_replace('/', DIRECTORY_SEPARATOR, $file), $vars);
		return ob_get_clean();
	}

}
