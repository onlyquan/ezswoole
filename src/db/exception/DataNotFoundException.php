<?php

namespace ezswoole\db\exception;

use ezswoole\exception\DbException;

class DataNotFoundException extends DbException
{
	protected $table;

	/**
	 * DbException constructor.
	 * @param string $message
	 * @param string $table
	 * @param array  $config
	 */
	public function __construct( $message, $table = '', array $config = [] )
	{
		parent::__construct( $message,  $config ,null,10500 );
		$this->message = $message;
		$this->table   = $table;
		$this->setData( 'Database Config', $config );
	}

	/**
	 * 获取数据表名
	 * @access public
	 * @return string
	 */
	public function getTable()
	{
		return $this->table;
	}
}
