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
                <h3 class="fw-bold">规则条款</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <button id="saveData" class="btn btn-primary fw-bold fs-8 fs-lg-base">
                    <i class="bi bi-save"></i> 节省
                </a>
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            <!--begin::Item-->
            <textarea class="form-control mb-2" placeholder="描述" rows="6" id='editor'></textarea>

            <!--end::Item-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 4-->
</div>
@endsection

@section('drawers')

@endsection
@section('modals')

@endsection

@section('scripts')
@parent
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
	<script>
		CKEDITOR.replace('editor')
		for (var i in CKEDITOR.instances) {
			CKEDITOR.instances[i].on('change', function() { CKEDITOR.instances[i].updateElement() });
        }
        const editor=CKEDITOR.instances.editor;

        $.get('/api/support/rules-clauses')
                .then((function(response){ 
                if(response != null)
                editor.setData(response);
        }));           

        $("#saveData").click(function (){
            var data = editor.getData();
            
            $.post('/api/support/rules-clauses', {_token: '{{csrf_token()}}', content: data})
                .then((function(){ 
                Swal.fire({text:"您已经成功保存了！",
                icon:"success",
                    buttonsStyling:!1,
                    confirmButtonText:"好的，我知道了！",
                    customClass:{confirmButton:"btn fw-bold btn-primary"}
                });
                }))
            })
	
</script>

@endsection