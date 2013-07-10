<div class="row-fluid">
  <div class="btn-group span12">
    <a class="btn pull-right" data-toggle="modal" data-target="#courseModal">新增课程</a>
  </div>
  
  <table class="table table-striped">
    <thead>    
    <tr>
      <th class="span2">课程名</th>
      <th class="span2">课程说明</th>
      <th class="span2">用户类型</th>
      <th class="span2">注册时间</th>
      <th class="span2">编辑</th>
    </tr>
    </thead>
    <tbody>
    {foreach $course_list as $r} 
      <tr>
          <td>{$r->name}</td>
          <td>{$r->desc}</td>
          <td></td>
          <td>{$r->created_at->format('Y-m-d H:i')}</td>
          <td></td>
      </tr>
    {/foreach}
    </tbody>
  </table>
</div>

<div id="courseModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <i class="icon-th-list"></i>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" id="form-course">
      <div class="control-group">
        <label class="control-label" for="inputName">课程名称</label>
        <div class="controls">
          <input type="text" id="inputName" placeholder="课程名称"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputTeacher">老师</label>
        <div class="controls">
          <select id="inputTeacher">
            {foreach $teacher_list as $r}
              <option value ="{$r->id}">{$r->name}-{$r->school}</option>
            {/foreach}
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputRecord">课程说明</label>
        <div class="controls">
          <textarea rows="3" id="inputDesc"></textarea>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    <button class="btn btn-primary" id="add_teacher">增加</button>
  </div>
</div>

<script type="text/javascript">
  $('#add_teacher').click(function() {
    var name = $('#inputName').val();
    var teacher  = $('#inputTeacher').val();
    var desc = $('#inputDesc').val();
    $.post("ajax.php?do=course", { name: name ,teacher:teacher,desc:desc,op:'add'},
      function(data){
        if(data.id){
          $('#courseModal').modal('hide')
        }
      }, "json");
  });
</script>