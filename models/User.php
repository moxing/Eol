<?php
class User extends ActiveRecord\Model {
  static $has_one = array(
     array('teacher')
  );
}