<?php

namespace app\home\controller;

use think\Db;

class Index extends Common {

	protected function _initialize() {

	}

	
	public function index() {


		return $this->fetch();

	}

}