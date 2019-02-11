@extends('admin.layouts.apps')

@section('content')
<script type="text/javascript">

 ExecuteOrDelayUntilScriptLoaded(AMDB, 'sp.ui.pub.ribbon.js');


 function AMDB(){

 var call = $.ajax({
                 url: "https:/mysite/_vti_bin/listdata.svc/AM?$select=Title,Number,Date,Name,Classification/Classification,Class2/Class2,Class3/Class3&$expand=Classification,Class2,Class3",
                 async: "true",
                 type: "GET",
                 dataType: "json",
                 headers: {Accept: "application/json;odata=verbose"}
             });//close ajax call

 call.done(function (data,textStatus, jqXHR){

         myData = data.d.results;
         var dtTable = $('#example').DataTable({
         responsive: true,
         data: myData,
         columns:[
             {data:"Title"},
             {data:"Number"},
             {data:"Date","render": function (data, type, full, meta) {return moment.utc(data, "x").format('l');}},
             {data:"Name","render":function(data, type, full, meta){return'<a href="https:/mysite/AM/'+data+'">Click here</a>';}},
             {data: "Classification.results[, ].Classification"},
             {data: "Class2.results[, ].Class2"},
             {data: "Class3.results[, ].Class2"}
             ],
         stateSave: true

         }); //close DataTable
    </script>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-body">
                <section id="html">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title">HTML (DOM) sourced data</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                  <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="card-content collpase show">
                                <div class="card-body card-dashboard">
                                  <p class="card-text">The foundation for DataTables is progressive enhancement, so
                                    it is very adept at reading table information directly from
                                    the DOM. This example shows how easy it is to add searching,
                                    ordering and paging to your HTML table by simply running DataTables
                                    on it.
                                  </p>
                                  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                                        <thead>
                                            <th>Name</th>
                                            <th>No.</th>
                                            <th>Date</th>
                                            <th>Memo</th>
                                            <th>Classification</th>
                                            <th>Class2</th>
                                            <th>Class3</th>
                                        </thead>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
        </div>
    </div>
</div>
@endsection
