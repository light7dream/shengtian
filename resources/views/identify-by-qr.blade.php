@extends('layout.app')

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('/plugins/uppy.bundle.css')}}">
<style>
    p{line-height: 18px;}
</style>
@endsection


@section('content')
  
        <div class="container" style="min-height:100%">   
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div style="text-align: center;" class="mt-100">
                        <form action="/api/identify-by-qrcode" method="POST">
                            @csrf
                        <h2>订购者识别!</h2>
                        <p class="mt-30">请输入您的订单编号和二维码文件。</p>
                        
                        <div class="custom-file mb-3">
                            {{-- <div id="reader" width="600px" height="600px"></div> --}}
                            {{-- <label class="custom-file-label" for="customFile">Choose QRCode file</label> --}}
                        </div>
                        <style>.di-img_container {
                            padding: 15px;
                            border-radius: 15px;
                            min-height: 420px;
                            box-shadow: 0 1em 16px #ccc;
                            background-image: linear-gradient(to top,#e9e9e9,#f4f4f8);
                        }
                        .di-img_upload-item{
                            min-height: 370px;
                            border: 1px dashed #9e9e9e;
                            border-radius: 5px;
                            width: 100%;
                            height: 180px;
                            margin-top: 10px;
                            margin-bottom: 10px;
                            position: relative;
                            color: #9e9e9e;
                        }
                        .justify-content-center {
                            justify-content: center!important;
                        }
                        
                        .flex-column {
                            flex-direction: column!important;
                        }
                        .d-flex {
                            display: flex!important;
                        }
                        .di-img_container input {
                            opacity: 0;
                            position: absolute;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            cursor: pointer;
                        }
                        .di-img_img{
                            height: 10em;
                            width: 10em;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: contain;
                        }
                        .qr-upload_buttons-group{
                            margin-top: 15px;
                        }
                        .di-img_caption{
                            margin-top: 5px;
                        }
                        .di-item-clean{
                            z-index: 10;
                        }
                        </style>
                        <div class="di-img_container row" style="display:flex">
                            <div class="di-img_upload-item d-flex flex-column justify-content-center">
                                <div id="upload">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset('admin/assets/media/svg/files/upload.svg')}}" />
                                </div>
                                <h3>Upload QR Code</h3>
                            </div>
                            <div id="uploaded" style="display: none">
                                <div class="d-flex justify-content-center">
                                    <div class="di-img_uploaded-item">
                                        <div class="di-img_img" id="reader"></div>
                                    </div>
                                </div>
                                <div class="di-img_caption d-flex justify-content-center">QR Code.png</div>
                                <div class="qr-upload_buttons-group d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary di-item-clean">Clean</button>
                                </div>
                            </div>
                            <input type="file" class="custom-file-input" id="qr-input-file" accept="image/*">
                        </div>
                        </div>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Open modal
                          </button> --}}
                        {{-- <div class="mt-30 mb-30">
                            <button type="submit" class="btn btn-primary"> 确  认 </button>
                        </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>    

        <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Enter Order ID</h4>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usr">Order ID:</label>
                        <input type="text" class="form-control" id="order_id" name="order_id" required>
                    </div>
                </div>
          
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="confirm" >确  认</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">取 消</button>
                </div>
          
              </div>
            </div>
          </div>
    
@endsection

@section('scripts')
@parent
<script src="{{asset('/plugins/node_modules/html5-qrcode/html5-qrcode.min.js')}}"></script>
{{-- <script src="{{asset('/plugins/uppy.bundle.js')}}"></script> --}}
{{-- <script src="{{asset('/plugins/uppy.js')}}"></script> --}}
<script>
    var qrcode = '';
    const html5QrCode = new Html5Qrcode(/* element id */ "reader");
    // File based scanning
    const fileinput = document.getElementById('qr-input-file');
    fileinput.addEventListener('change', e => {
    if (e.target.files.length == 0) {
        // No file selected, ignore 
        return;
    }

    const imageFile = e.target.files[0];
    // Scan QR Code
    html5QrCode.scanFile(imageFile, true)
    .then(decodedText => {
        // success, use decodedText
        console.log(decodedText);
        qrcode=decodedText;
        $('#myModal').modal()
    })
    .catch(err => {
        // failure, handle it.
        console.log(`Error scanning file. Reason: ${err}`)
    });
    });

</script>
<script>
$('.di-item-clean').click(function(){
$('#uploaded').hide();
$('#upload').show()
$('#qr-input-file').val('');
})

$('#qr-input-file').change(function(e){
    if($(this).val()){
    {
        $('#uploaded').show();
        $('#upload').hide();
$('#qr-input-file').val('');

    }
    }
    else
    {
        $('#upload').show();
        $('#uploaded').hide();
$('#qr-input-file').val('');
    }
})


$('#confirm').click(function(){
    $.post('/api/identify-by-qrcode', {
        _token:'{{csrf_token()}}',
        order: $('#order_id').val(),
        qrtoken: qrcode
    }).done(function(data){
        window.location.href='/invoices/'+data;
    }).fail(function(){
        
        var t =$('#order_id').parent().find('.error').eq(0);
        if(!t)
        {
            $('#order_id').parent().append('<label class="error" style="color:#ff0000">Order is not match</label>')

        }
    });
})
</script>
@endsection