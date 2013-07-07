<a class="btn  pull-right" data-toggle="modal" data-target="#teacherModal">新增教师</a>
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
    <button class="btn btn-primary">增加</button>
  </div>
</div>