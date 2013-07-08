<div class="row-fluid">
  <div class="span12">
    <a class="btn pull-right" data-toggle="modal" data-target="#teacherModal">新增教师</a>
  </div>
    <table class="table span12">
      <tr>
        <th class="span2">#</th>
        <th class="span3">姓名</th>
        <th class="span4">学校</th>
        <th class="span3">注册时间</th>
      </tr>
    </table>

</div>

<div id="teacherModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <i class="icon-user"></i>
  </div>
  <div class="modal-body">
    <form class="form-horizontal">
      <div class="control-group">
        <label class="control-label" for="inputName">姓名</label>
        <div class="controls">
          <input type="text" id="inputName" placeholder="姓名"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputSchool">所属学校</label>
        <div class="controls">
          <input type="text" id="inputSchool" placeholder="所属学校"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputRecord">个人履历</label>
        <div class="controls">
          <textarea rows="3" id="inputRecord"></textarea>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    <button class="btn btn-primary" id="add_teacher">增加</button>
  </div>
</div>