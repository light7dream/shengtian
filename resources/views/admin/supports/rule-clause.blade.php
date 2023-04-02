@extends('admin.layout.app')

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('plugins/ckeditor5-build-classic/sample/css/sample.css')}}" />
@endsection

@section('content')
<div class="col-xl-12">
    <!--begin::List Widget 4-->
    <div class="card card-xl-stretch mb-xl-12">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <div class="card-title">
                <h3 class="fw-bold">Rule Clause</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <button id="saveData" class="btn btn-primary fw-bold fs-8 fs-lg-base">
                    <i class="bi bi-save"></i> Edit
                </a>
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            <!--begin::Item-->
            <div class="border border-dashed border-primary" id="editor"></div>
            <!--end::Item-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 4-->
</div>
@endsection

@section('modals')

@endsection

@section('scripts')
@parent
<script src="{{asset('plugins/ckeditor5-build-classic/ckeditor.js')}}"></script>

<script>
    ClassicEditor
		.create( document.querySelector( '#editor' ), {
		} )
		.then( editor => {
			window.editor = editor;

            $.get('/api/support/rules-clauses')
                  .then((function(response){ 
                    if(response != null)
                    window.editor.setData(response);
            }));           
    
            $("#saveData").click(function (){
                var data = window.editor.getData();
                
                $.post('/api/support/rules-clauses', {_token: '{{csrf_token()}}', content: data})
                  .then((function(){ 
                    Swal.fire({text:"You have successfully saved!",
                    icon:"success",
                        buttonsStyling:!1,
                        confirmButtonText:"Ok, got it!",
                        customClass:{confirmButton:"btn fw-bold btn-primary"}
                    });
                  }))
				})
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

@endsection