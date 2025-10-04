<?php

namespace MABEL_WOF_LITE\Core\Models
{

	class Checkbox_Option extends Option
	{

		/**
		 * @var boolean checked or not?
		 */
		public $checked;

		/**
		 * @var string label.
		 */
		public $label;

		public function __construct( $id, $title, $label, $checked = false, $extra_info = null, $dependency = null )
		{
			parent::__construct($id, $checked, $title, $extra_info, $dependency );

			$this->checked = $checked;
			$this->label = $label;

			return $this;
		}

	}

}