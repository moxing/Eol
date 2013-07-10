<?php
class CoursePlan extends ActiveRecord\Model {
	static $table_name = "course_plan";
	
	static $belongs_to = array(
	     array('teacher'),
	     array('course')
	);
}