@extends('backend.master')

@section('title')
    Add Question Category
@endsection

@section('content')
<style>
    .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
    padding: 10px;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 38px;
    position: absolute;
    right: 13px;
    top: 4px;
    width: 42px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 710px;
  overflow-y: auto;
}
</style>
    <div class="content-wrapper" style="font-family: Roboto">
    <h3 class=" text-center">{{ $name->first_name }} {{ $name->last_name }}</h3>
    <div class="mesgs">
          <div id="msg_historyid" class="msg_history" style="overflow:auto">
            
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                <form method="POST" id="message_submit" role="form">
                    @csrf
                    <input type="hidden" name="user" id="user" value="{{ $user_id }}"/>
                    <input type="text" class="write_msg" name="msg_write" id="msg_write" placeholder="Type a message" />
                    <button type="submit" class="msg_send_btn" ><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$( document ).ready(function() {
    
        var user_id = <?php echo($user_id);?>
        
        function showMessage()
        {
            var output = "";
            $.ajax({
                url: 'box/'+user_id,
                method: "get",
                dataType: "json",
                success:function (data) {
                    
                    for(i = 0; i < data.length; i++)
                    {
                      var str = data[i]['created_at'];
                      var datetime = str.split("T")
                        if(data[i]['user_id'] != null && data[i]['user_id2'] == null){
                            output+='<div class="incoming_msg" style="padding: 10px;">'
                            if(data[i]['user']['image']){
                              output += '<div class="incoming_msg_img"> <img style="height: 50px; width: 50px;" src="{{ asset(null) }}'+data[i]['user']['image']+'"> </div>';
                              
                            }else{
                                output += '<div class="incoming_msg_img"> <img style="height: 50px; width: 50px;" src="https://ptetutorials.com/images/user-profile.png" alt="avater"> </div>';
                            }
                            output +='<div class="received_msg">'+
                                '<div class="received_withd_msg">'+
                                '<p>'+ data[i]['message'] +'</p>'+
                                '<span class="time_date">'+new Date(datetime[0])+'</span></div>'+
                            '</div>'+
                            '</div>';

                            $.ajax({
                              url: '/admin/status_update/'+data[i]['id'],
                                method: "post",
                                dataType: "json",
                                data:{"_token": "{{ csrf_token() }}"},
                                success:function (data) {
                                  
                                }
                            })
                        }else{
                            output+='<div class="outgoing_msg">'+
                                '<div class="sent_msg">'+
                                    '<p>'+ data[i]['message'] +'</p>'+
                                    '<span class="time_date">'+new Date(datetime[0])+'</span>'+
                                '</div>'+
                            '</div>';
                        }
                    }
                    document.getElementById("msg_historyid").innerHTML=output;
                    msg_historyid.scrollTop = msg_historyid.scrollHeight;
                    // console.log(data[0]['message']);
                    
                    
                }
            })
        }
        
        
        
        showMessage();

        setInterval(function(){ showMessage(); }, 3000);
        
        
        $('#message_submit').click(function(e) {  
            e.preventDefault();
            var msg_write = $('#msg_write').val();
            var user_id = $('#user').val();
            $.ajax({
                url:"user2",
                method:'POST',
                data:{"_token": "{{ csrf_token() }}", user_id:user_id, msg_write:msg_write},
                dataType: "json",
                success: function(result){
                
                  if(result == 'success'){
                    showMessage();
                    $("#message_submit")[0].reset();
                  }
                            
                    
                }
            })
        });
    });
</script>
    
@endsection

