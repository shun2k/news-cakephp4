// パスワード確認
let passwordChecker = false;
let message = '';
$(function() {


  $('#passwordCheck').focusout(function(e) {
    const pass = $('#password').val();
    const check = $('#passwordCheck').val();
    
    if (pass == check) {
      message = 'OK';
      passwordChecker = true;
      $('#passconfirm').html(function() {
        return '';
      });
    } else {
      message = 'パスワードが一致しません';
      passwordChecker = false;
      $('#passconfirm').html(function() {
        return '<br>' + message;
      });
    }
    console.log(message);
  });
});

// フォームバリデーション submit 有効・無効
$(function() {
  $('form').submit(function() {
    if (passwordChecker) {
      // console.log(message);
      return true;
    } else {
      console.log(message);
      return false;
    }
  });
});