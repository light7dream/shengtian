@extends('layout.app')

@section('styles')
@parent
<style>
    @media only screen and (max-width: 767px) {
        .main_content_area{margin-top: 30px;padding-top: 0;}
        .dashboard-list{display: inline-block;width: 100%;}
        .dashboard-list li{width: 24%;display: inline-block;}
        .dashboard-list li .nav-link{font-size: 13px;width: 100%;}
}
.tab-content .tab-pane h3{border-left: #012862 solid 5px;padding-left: 15px;margin: 15px 0;}
.tab-content .tab-pane p{text-indent:24px;margin-bottom: 10px!important;}
.post_wrapper a{font-size: 15px;margin-right: 20px;color: black!important;}
.post_wrapper a:hover{color: rgb(3, 83, 148)!important;}
.dashboard_tab_button{text-align: center;}
.error{color:#f00}

.modal-header{
    background-color: rgba(51, 65, 255, 0.6);
    color: #fff;
    border-top-left-radius: 0!important; 
    border-top-right-radius: 0!important;
}
    /* #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
    }

    #popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80vw;
      height: 90vh;
      background-color: white;
      z-index: 1;
    }

    #popup-iframe {
      width: 100%;
      height: 100%;
    } */
</style>
@endsection


@section('content')

    <hr>

    <!-- my account start  -->
    <section class="main_content_area" style="min-height: ;">
    <div class="container">   
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2 ">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#help1" data-toggle="tab" class="nav-link" id="helptab1">关于积分</a></li>
                            <li> <a href="#help2" data-toggle="tab" class="nav-link" id="helptab2">规则条款</a></li>
                            <li><a href="#help3" data-toggle="tab" class="nav-link" id="helptab3">常见疑问</a></li>
                            <li><a href="#help4" data-toggle="tab" class="nav-link" id="helptab4">在线客服</a></li>
                
                        </ul>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show" id="help1">
                          <p id='help_one'></p>
                            <p>还有任何问题？胜天娱乐欢迎您随时联系 <a href="/help?type=4">在线客服</a>
                            </p>
                            
                        </div>
                        <div class="tab-pane fade" id="help2" style="line-height: 30px;">
                            
                            <p id='help_two'></p>
                            <hr>
                            <p>还有任何问题？胜天娱乐欢迎您随时联系 <a href="/help?type=4">在线客服</a>
                            </p>         
                        </div>
                        <div class="tab-pane fade" id="help3">
    
                            <div class="accordion_area">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-12"> 
                                        <div id="accordion" class="card__accordion">
                                            @foreach ($help_three as $key=> $help)
                                            
                                            <div class="card card_dipult">
                                                <div class="card-header card_accor" id="heading{{$key}}">
                                                    <button class="btn btn-link {{$key==0?'':'collapsed'}}" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                                       {{$help->question}}
    
                                                    <i class="fa fa-plus"></i>
                                                    <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <div id="collapse{{$key}}" class="collapse {{$key==0?'show':''}}" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p>{!!$help->answer!!}</p>
                                                </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!--Accordion area end-->
                            <!--faq area end-->
                        </div>
                        <div class="tab-pane" id="help4">
                            
                            <div class="col-lg-6 col-md-12" style="margin-left: 30px;">
                                <div class="blog_sidebar_widget">
                                    
                                    <div class="widget_list comments">
                                        <div class="widget_title">
                                            <h3>在线客服</h3>
                                        </div>
                                        @foreach ($help_four as $help)
                                            
                                        <div class="post_wrapper">
                                            <div class="post_thumb">
                                                <img src="{{url('/storage/uploads/service/'.$help->id.'.png')}}" alt="">
                                            </div>
                                            <div class="post_info">
                                                <span> <a href="https://vm.providesupport.com/{{$help->email}}" target="blank">{{$help->description}}</a> </span>
                                                <!-- data-toggle="modal" data-target="#modalRelatedContent" onclick="mailTo('{{$help->email}}');" -->
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                
                            <!-- <button id="popup-button">Open Popup</button>
                            <div id="overlay"></div>
                            <div id="popup">
                            <iframe src="https://vm.providesupport.com" id="popup-iframe"></iframe>
                            </div>

                            <script>
                            const button = document.getElementById("popup-button");
                            const overlay = document.getElementById("overlay");
                            const popup = document.getElementById("popup");

                            button.addEventListener("click", function () {
                                overlay.style.display = "block";
                                popup.style.display = "block";
                            });

                            overlay.addEventListener("click", function () {
                                overlay.style.display = "none";
                                popup.style.display = "none";
                            });
                            </script> -->

                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>        	
    </section>			
    <!-- my account end   --> 
<!--Modal: modalRelatedContent-->
<div class="modal fade right" id="modalRelatedContent" tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.6)"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="heading">发送邮件</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width:auto; height:auto; color: #fff">
          <span aria-hidden="true" class="white-tex">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
            <form action="/api/mail/send" method="POST" id="mailForm" class="needs-validation" novalidate="novalidate" style="width: 100%">
                @csrf
            <fieldset>
            <input class="form-control" type="hidden" placeholder="电子邮件" name="to" required />

            <div class="col-sm-12">
                To : <span style="font-size: 16px;" id="showEmail"></span>
            </div>
            <div class="col-sm-12 mt-20">
                <input class="form-control" placeholder="输入你的电子邮箱" type="email" name="from" required />
                <label for="name" style="display:none"></label>
            </div>
            <div class="col-sm-12 mt-20">
                <input class="form-control" placeholder="输入主题" type="text" name="title" required />
                <label for="title" style="display:none"></label>
            </div>
            <div class="col-sm-12 mt-10">
                <textarea name="message" class="form-control" rows="5" placeholder="输入内容" required></textarea>
                <label for="message" style="display:none"></label>
            </div>
                </fieldset>
            <div class="row mt-10">
                <button class="btn btn-info btn-md m-auto" type="submit" id="sendBtn">发送</button>
            </div>
            </form>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalRelatedContent-->
@if(Session::has('message'))
<div classs="container p-5" id="alert">
	<div class="row no-gutters">
		<div class="col-lg-6 col-md-12 m-auto">
			<div class="alert alert-success fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="True">&times;</span>
			  	</button>
			 	<h4 class="alert-heading">做得好！</h4>
                
			  	<p>{{Session::get('message')}}</p>
			</div>
		</div>
	</div>
</div>
@endif
@endsection
    
@section('scripts') 
@parent
<script src="{{asset('/plugins/dist/jquery.validate.js')}}"></script>
<script>
@if(Session::has('message'))
setTimeout(() => {
    $('#alert').fadeOut(1000);
}, 2000);   
@endif
    var mailTo = function(email){
        $('#showEmail').text(email);
        $('input[name="to"]').val(email);
    }

    $("#mailForm").validate({
			rules: {
				message: {
                    required: true,
                    minlength: 1
                },
				title: {
                    required: true,
                    minlength: 1
                },
				from: {
					required: true,
					email: true
				}
				
			},
		});
</script>
<script>

    window.onload=function(){
        var purl=document.location.search;
        purl=purl.substring(1,purl.length);
        var ptype=purl.split("=");
        ptype=ptype[1];
        if(ptype=="1"){
            $("#helptab1").addClass("active");
            $("#help1").addClass("active");
           
        }
        else if(ptype=="2")
        {
            $("#helptab2").addClass("active");
            $("#help2").addClass("active");
        }
        else if(ptype=="3")
        {
            $("#helptab3").addClass("active");
            $("#help3").addClass("active");
        }
        else if(ptype=="4")
        {
            $("#helptab4").addClass("active");
            $("#help4").addClass("active");
        }
        else
        {
            $("#helptab1").addClass("active");
            $("#help1").addClass("active");
        }


        var helpOne = '{{$help_one}}';
        $("#help_one").html(helpOne);
         var newHTML1 = $("#help_one").text();
        $("#help_one").html(newHTML1);

        var helpTwo = '{{$help_two}}';
        $("#help_two").html(helpTwo);
         var newHTML2 = $("#help_two").text();
         $("#help_two").html(newHTML2);
    }

   
   
     
</script>

@endsection