<?php
class Teacher extends ActiveRecord\Model {
	static $belongs_to = array(array('user'));

	static $has_many = array(
	 array('course_plan'),
	 array('course', 'through' => 'course_plan')
	);	
}