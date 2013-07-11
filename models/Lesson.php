<?php
class Lesson extends ActiveRecord\Model {

   static $belongs_to = array(
     array('course', 'class_name' => 'Course'),
     array('teacher')
   );
}