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
 * @author Jáchym Toušek
 */
class FormValidationPanelExtension extends \Nette\DI\CompilerExtension
{

	public function afterCompile(\Nette\PhpGenerator\ClassType $class)
	{
		$builder = $this->getContainerBuilder();
		if ($builder->parameters['debugMode']) {
			$class->methods['initialize']->addBody('Tracy\Debugger::getBar()->addPanel(new Arachne\FormValidationPanel\FormValidationPanel);');
		}
	}

}
