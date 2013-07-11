<div class="btn-group" data-toggle="buttons-radio">
  <button class="btn">课程</button>
  <button class="btn">时间</button>
  <button class="btn">热度</button>
</div>

<div>
{foreach $course_list as $r}
	<div class="page-header"><h4>{$r->name}</h4></div>
	{foreach $r->lesson as $lesson}
		{include file="tpl/lesson.tpl" lesson=$lesson}
	{/foreach}
{/foreach}
</div>