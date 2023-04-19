// = = = = = = = = = = = = = = = = changeImg = = = = = = = = = = = = = = = =

function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            $(input).siblings('.thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//Khi click #thumbnail thì cũng gọi sự kiện click #image
$(document).ready(function () {
    $('.thumbnail').click(function () {
        $(this).siblings('.image').click();
    });
});

click_to_convert.addEventListener('click', function(){
   var speech =true;
   window.SpeechRecognition = window.webkitSpeechRecognition;
   const recognition = new SpeechRecognition();
   recognition.interimResults = true;

   recognition.addEventListener('result', e=>{
       const transcript = Array.from(e.results)
           .map(result => result[0])
           .map(result => result.transcript)

       document.getElementById('convert_text').value = transcript;
   });


   if(speech == true){
       recognition.start();
   }
});

