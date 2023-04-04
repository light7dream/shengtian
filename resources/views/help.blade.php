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
                                                <span> <a href="#" data-toggle="modal" data-target="#modalRelatedContent" onclick="mailTo('{{$help->email}}');">{{$help->description}}</a> </span>
                                                <span>ID #{{$help->id}}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                


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
        <p class="heading"></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
            <form action="/api/mail/send" method="POST" id="mailForm">
                @csrf
            <input class="form-control" type="hidden" placeholder="Email" name="to" required />

            <div class="col-sm-12">
                To : <span style="font-size: 16px;" id="showEmail"></span>
            </div>
            <div class="col-sm-12 mt-20">
                <input class="form-control" placeholder="Enter your email" type="email" name="from" required />
            </div>
            <div class="col-sm-12 mt-10">
                <textarea name="message" class="form-control" rows="5" placeholder="Enter message" required></textarea>
            </div>
            
            <div class="col-sm-12 mt-10">
                <button type="button" class="btn btn-info btn-md" type="submit" id="sendBtn">Send</button>
            </div>
            </form>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalRelatedContent-->
@endsection
    
@section('scripts') 
@parent

<script>
    var mailTo = function(email){
        $('#showEmail').text(email);
        $('input[name="to"]').val(email);
    }
   
   $('#sendBtn').click(function(e){
    e.preventDefault();
    var from = $('input[name="to"]').val();
    var message = $('textarea[name="message"]').val();
    if(from==''||message==''||from==undefined||message==undefined){
        return;
    }
    $('#mailForm').submit();
   })
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