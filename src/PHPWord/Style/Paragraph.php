<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */


/**
 * PHPWord_Style_Paragraph
 *
 * @category   PHPWord
 * @package    PHPWord_Style
 * @copyright  Copyright (c) 2011 PHPWord
 */
class PHPWord_Style_Paragraph {
	
	/**
	 * Paragraph alignment
	 * 
	 * @var string
	 */
	private $_align;
	
	/**
	 * Space before Paragraph
	 * 
	 * @var int
	 */
	private $_spaceBefore;
	
	/**
	 * Space after Paragraph
	 * 
	 * @var int
	 */
	private $_spaceAfter;
	
	/**
	 * Spacing between breaks
	 * 
	 * @var int
	 */
	private $_spacing;

    /**
     * Left Margin
     *
     * @var int
     */
	private $_leftMargin;

    /**
     * Right Margin
     *
     * @var int
     */
	private $_rightMargin;
	
	
	/**
	 * Indent by how much
	 * 
	 * @var int
	 */
	private $_indent;
	
	
	/**
	 * Set of Custom Tab Stops
	 *
	 * @var array
	 */
	private $_tabs;
	
	private $_keepNext;
	
	private $_keepLines;
	
	/**
	 * New Paragraph Style
	 */
	public function __construct() {
		$this->_align           = null;
		$this->_spaceBefore     = null;
		$this->_spaceAfter      = null;
		$this->_spacing         = null;
		$this->_indent          = null;
		$this->_leftMargin      = null;
		$this->_rightMargin     = null;
		$this->_tabs            = null;
		$this->_keepNext        = null;
		$this->_keepLines       = null;
	}

	/**
	 * Get left margin
	 * 
	 * @return int
	 */
	public function getLeftMargin() {
		return $this->_leftMargin;
	}

	/**
	 * Set left margin
	 * 
	 * @param int $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setLeftMargin($pValue = null) {
	   $this->_leftMargin = $pValue;
	   return $this;
	}

	/**
	 * Get Right margin
	 * 
	 * @return int
	 */
	public function getRightMargin() {
		return $this->_rightMargin;
	}

	/**
	 * Set right margin
	 * 
	 * @param int $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setRightMargin($pValue = null) {
	   $this->_rightMargin = $pValue;
	   return $this;
	}
	
	/**
	 * Set Style value
	 * 
	 * @param string $key
	 * @param mixed $value
	 */
	public function setStyleValue($key, $value) {
		if($key == '_spacing') {
			$value += 240; // because line height of 1 matches 240 twips
		} else if($key === '_tabs') {
			$value = new PHPWord_Style_Tabs($value);
		}
		if($key == '_indent') {
            $value = (int)$value * 720; // 720 twips per indent
		}
		$this->$key = $value;
	}

	/**
	 * Get Paragraph Alignment
	 * 
	 * @return string
	 */
	public function getAlign() {
		return $this->_align;
	}

	/**
	 * Set Paragraph Alignment
	 * 
	 * @param string $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setAlign($pValue = null) {
		if(strtolower($pValue) == 'justify') {
			// justify becames both
			$pValue = 'both';
		}
		$this->_align = $pValue;
		return $this;
	}

	/**
	 * Get Space before Paragraph
	 * 
	 * @return string
	 */
	public function getSpaceBefore() {
		return $this->_spaceBefore;
	}

	/**
	 * Set Space before Paragraph
	 * 
	 * @param int $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setSpaceBefore($pValue = null) {
	   $this->_spaceBefore = $pValue;
	   return $this;
	}

	/**
	 * Get Space after Paragraph
	 * 
	 * @return string
	 */
	public function getSpaceAfter() {
		return $this->_spaceAfter;
	}

	/**
	 * Set Space after Paragraph
	 * 
	 * @param int $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setSpaceAfter($pValue = null) {
	   $this->_spaceAfter = $pValue;
	   return $this;
	}

	/**
	 * Get Spacing between breaks
	 * 
	 * @return int
	 */
	public function getSpacing() {
		return $this->_spacing;
	}

	/**
	 * Set Spacing between breaks
	 * 
	 * @param int $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setSpacing($pValue = null) {
	   $this->_spacing = $pValue;
	   return $this;
	}

	/**
	 * Get indentation
	 * 
	 * @return int
	 */
	public function getIndent() {
		return $this->_indent;
	}

	/**
	 * Set indentation
	 * 
	 * @param int $pValue
	 * @return PHPWord_Style_Paragraph
	 */
	public function setIndent($pValue = null) {
	   $this->_indent = $pValue;
	   return $this;
	}

	/**
	 *
	 * @return PHPWord_Style_Tabs
	 */
	public function getTabs() {
		return $this->_tabs;
	}

	public function getKeepNext() {
		return $this->_keepNext;
	}

	public function getKeepLines() {
		return $this->_keepLines;
	}
}
?>