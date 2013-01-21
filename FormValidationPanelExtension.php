<?php

namespace Media33\FormValidationPanel;

/**
 * @author Jáchym Toušek
 */
class FormValidationPanelExtension extends \Nette\Config\CompilerExtension
{

	public function afterCompile(\Nette\PhpGenerator\ClassType $class)
	{
		$builder = $this->getContainerBuilder();
		if ($builder->parameters['debugMode']) {
			$class->methods['initialize']->addBody('Nette\Diagnostics\Debugger::$bar->addPanel(new Media33\FormValidationPanel\FormValidationPanel);');
		}
	}

}
