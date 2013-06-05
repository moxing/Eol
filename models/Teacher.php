<?php
class Teacher extends ActiveRecord\Model {
	static $belongs_to = array(array('user'));
}