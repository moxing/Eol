<?php
	require_once('common.php');
	$does = array('teacher','student','course');
	$do = $_GET['do'];
	if( in_array($do,$does) && identity()==ADMIN ){
		if( $do=='teacher'){
			if($_POST['op']!=null && $_POST['op']==='add'){

				$name=$_POST['name'];
				$school=$_POST['school'];
				$desc=$_POST['desc'];

				$newpwd = mt_rand(10000000,99999999);
				$new_user = new User();
				$new_user->name =$name;
				$new_user->password = $hasher->HashPassword($newpwd);
				$new_user->type = TEACHER;
				$new_user->save();
				$teacher = $new_user->create_teacher(array('ori_pwd'=>$newpwd,'school'=>$school,'name'=>$name,'desc'=>$desc));
				echo $teacher->to_json();
			}else{
				$list = Teacher::find('all',array('order'=>'updated_at DESC'));
				$GLOBALS['smarty']->assign('teacher_list', $list);
				$GLOBALS['smarty']->display('tpl/a_teacher.tpl');
			}
		}
		if( $do=='student'){
			$conditions = "type = ".USER." OR type = ".AUSER;
			$list = User::find('all',array('conditions'=>$conditions,'order'=>'updated_at DESC'));
			$GLOBALS['smarty']->assign('student_list', $list);
			$GLOBALS['smarty']->display('tpl/a_student.tpl');			
		}
		if( $do=='course'){
			if($_POST['op']!=null && $_POST['op']==='add'){
				$name=$_POST['name'];
				$teacher_id=$_POST['teacher'];
				$desc=$_POST['desc'];
				$new_course = new Course();
				$new_course->name =$name;
				$new_course->desc = $desc;
				$new_course->type = TEACHER;
				$new_course->save();
				$new_course_plan = new CoursePlan();
				$new_course_plan->teacher_id = $teacher_id;
				$new_course_plan->course_id = $new_course->id;
				$new_course_plan->save();

				echo $new_course->to_json();
			}else{
				$list = Teacher::find('all',array('order'=>'updated_at DESC'));
				$GLOBALS['smarty']->assign('teacher_list', $list);
				$course_list = Course::find('all',array('order'=>'updated_at DESC'));
				$GLOBALS['smarty']->assign('course_list', $course_list);			
				$GLOBALS['smarty']->display('tpl/a_course.tpl');
			}	
		}
    }