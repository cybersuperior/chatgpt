@extends('layouts.app')

@section('content')
<section style="background-color: #eee;height:100vh">
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card mt-2" style="border-radius: 15px;">
          <div class="card-header d-flex justify-content-between align-items-center p-3 text-white border-bottom-0"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px;background-color:#00A67E">
            <i class="fas fa-angle-left"></i>
            <p class="mb-0 fw-bold">Ask ChatGPT</p>
            <i class="fas fa-times"></i>
          </div>
          <div class="card-body">
            <div id="chat-box" style="height: 280px" class="overflow-auto p-3"></div>

            <div class="form-outline">
              <form id="ask-chatgpt-form">
                @csrf
                <div class="form-group">
                  <textarea class="form-control" name="prompt" placeholder="Type your question..."></textarea>
                </div>
                <button type="submit" id="submit-btn" style="background-color:#00A67E"
                  class="btn text-white float-right">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<template id="user-message-box-template">
  <div class="d-flex flex-row justify-content-end mb-4">
    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
      <p class="small mb-0" id="message-box-text"></p>
    </div>
    <img class="ml-2" src="{{ asset('images/avatar-icon.png') }}" alt="avatar-icon" style="width: 30px; height: 100%;">
  </div>
</template>

<template id="chatgpt-message-box-template">
  <div class="d-flex flex-row justify-content-start mb-4">
    <img src="{{ asset('images/chatgpt-icon.png') }}" alt="open-ai-logo" class="mr-2"
      style="width: 30px; height: 100%; ">
    <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(0, 166, 126,.2);">
      <p class="small mb-0" id="message-box-text"></p>
    </div>
  </div>
</template>

<script>
  function generateChatBoxMessage(isChatGPTMessage, messageText) {
    // Get message template
    var template = (isChatGPTMessage ? $("#chatgpt-message-box-template").html() : $("#user-message-box-template").html())
    var messageBox = $(template);
    messageBox.find('#message-box-text').text(messageText)
    $('#chat-box').append(messageBox)
  }
 
    $(document).on("click","#submit-btn", function(e){
      e.preventDefault(); 

      var form = $("#ask-chatgpt-form")
      var formData = form.serialize()
      var textarea = form.find('textarea[name="prompt"]')
      generateChatBoxMessage(false, textarea.val());
      textarea.val('');

      $.ajax({
        type:"post",
        url: 'chatgpt/ask',
        data: formData,
        success:function(answer) {
          generateChatBoxMessage(true,  answer)
        },
    });
}); 
</script>

@endsection