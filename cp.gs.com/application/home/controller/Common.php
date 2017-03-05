<?php

namespace app\home\controller;

use think\Controller;
use think\Session;

class Common extends Controller {

	function __construct() {

		parent::__construct();
		$this->checkLogin();

	}

	/**
	 * 验证用户是否登录
	 *
	 */
	protected function checkLogin() {

		// 验证是否已经登录
		if (!Session::has('userinfo') || $username = Session::get('userinfo.username')) {
			$this->redirect('login/index');
		}
		// 验证登录是否过期，无操作1h即为过期
		$login_time = Session::get('userinfo.login_time');
		if (time() - $login_time > 3600) {
			Session::clear();
			$this->redirect('login/index');
		}

		// 用户操作，更新用户登录时间
		Session::set('userinfo.login_time', time());

	}

}