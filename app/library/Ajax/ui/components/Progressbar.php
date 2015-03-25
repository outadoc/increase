<?php
namespace Ajax\ui\Components;
use Ajax\common\SimpleComponent;
use Ajax\JsUtils;

/**
 * Composant JQuery UI Progressbar
 * @author jc
 * @version 1.001
 */
class Progressbar extends SimpleComponent {

	public function __construct(JsUtils $js){
		parent::__construct($js);
		$this->params=array("value"=>50);
		$this->uiName="progressbar";
	}
}