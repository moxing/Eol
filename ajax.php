<?php
	require_once('common.php');
	$does = array('teacher','student','course','lesson');
	$do = $_GET['do'];
	if(in_array($do,$does)==false){
		exit();
	}
	if( identity()==ADMIN ){
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
			if( $_POST['op']==='add'){
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
			}else if( $_POST['op']==='del'){
				$cid=$_POST['cid'];
				$course = Course::find($cid);
				$conditions = "course_id = {$course->id}";
				$course_plan = CoursePlan::find('first',array('conditions' => $conditions ));
				$course->delete();
				$course_plan->delete();
				echo json_encode(array('result'=>'success'));
			}else{
				$list = Teacher::find('all',array('order'=>'updated_at DESC'));
				$GLOBALS['smarty']->assign('teacher_list', $list);
				$course_list = Course::find('all',array('order'=>'updated_at DESC'));
				$GLOBALS['smarty']->assign('course_list', $course_list);			
				$GLOBALS['smarty']->display('tpl/a_course.tpl');
			}	
		}

    }

    if( identity()==TEACHER ){

		if( $do=='lesson'){
			$course_id = $_GET['cid'];
			if($course_id){
				$course = Course::find($course_id);
				$user_id = $_SESSION['current_user']['id'];
				$user = User::find($user_id);
				$teacher = $user->teacher;
				if(in_array($teacher,$course->teacher)){
					if($_POST['op']==='add'){
						$attr = array();

						$name=$_POST['name'];
						$pub_time=$_POST['pub_time'];
						$desc=$_POST['desc'];

						if($name){
							$attr['name']=$name;
						}
						if($pub_time){
							$attr['pub_time']=new ActiveRecord\DateTime($pub_time);
						}
						if($desc){
							$attr['desc']=$desc;
						}
						$attr['teacher_id']=$teacher->id;
						$lesson = $course->create_lesson($attr);
						echo $lesson->to_json();
					}else if($_POST['op']==='del'){
						$id = $_POST['id'];
						$lesson = Lesson::find($id);
						$lesson->delete();
						echo json_encode(array('result'=>'success'));
					}else{
						$list = $course->lesson;
						$GLOBALS['smarty']->assign('lesson_list', $list);
						$GLOBALS['smarty']->assign('cid', $course->id);
						$GLOBALS['smarty']->display('tpl/a_lesson.tpl');
					}
				}
			}
		}
    }