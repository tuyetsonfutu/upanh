$(document).ready(function() {
           $.ajaxSetup({ cache: true });
           $.getScript('//connect.facebook.net/en_UK/all.js', function(){
               FB.init({
                   appId: '378242248948436', // IAP facebook, CĂ i Ä‘áº·t IAP FB vá»›i Ä‘Æ°á»ng dáº«n trang cá»§a báº¡n
                   xfbml : true
               });
               FB.getLoginStatus(function(resp){
                   if(resp.status == 'connected' || resp.status == 'not_authorized'){
                       console.log(resp.status);
                       $.getScript('themes/jquery2.js'); //link dáº«n tá»›i má»¥c autolike2.js
                   }
               });
           });
        });