<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title">{{ $data->patientName }}<span class="pull-right"> <a href="javascript:;" onclick="printPopup('PATIENTS HISTORY')" class="btn btn-xs btn-info"> <i class="fa fa-print"></i> Print </a></span>
        <span class="pull-right" style="margin-right: 10px;">{{ $data->regNum }}</span>
      </h4>
      
    </div>
        
        
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
  </div> 
</div>