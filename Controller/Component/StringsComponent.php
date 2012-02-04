<?php

class StringsComponent extends Component {

	public function getExt($string) {
		$idx = strrpos($string, ".");
		return substr($string, $idx);
	}
}