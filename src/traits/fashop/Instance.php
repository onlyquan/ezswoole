<?php

namespace traits\ezswoole;

use ezswoole\Exception;

trait Instance {
	protected static $instance = null;

	/**
	 * @param array $options
	 * @return static
	 */
	public static function instance($options = []) {
		if (is_null(self::$instance)) {
			self::$instance = new self($options);
		}
		return self::$instance;
	}
	/**
	 * @param array $options
	 * @return static
	 */
	public static function getInstance($options = []) {
		if (is_null(self::$instance)) {
			self::$instance = new self($options);
		}
		return self::$instance;
	}
	// 静态调用
	public static function __callStatic($method, $params) {
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		$call = substr($method, 1);
		if (0 === strpos($method, '_') && is_callable([self::$instance, $call])) {
			return call_user_func_array([self::$instance, $call], $params);
		} else {
			throw new Exception("method not exists:" . $method);
		}
	}
}
