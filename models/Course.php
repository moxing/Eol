<?php
class Course extends ActiveRecord\Model {
	static $has_many = array(
	 array('course_plan'),
	 array('teacher', 'through' => 'course_plan')
	);
}