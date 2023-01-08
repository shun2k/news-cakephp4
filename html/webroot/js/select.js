$(function(){
    // $.getJSON(php.str, function(data) {
        // for(var i=1; i<48; i++) {
        //     var code = ('00'+i).slice(-2); // ゼロパディング
        //     $('#select-pref').append('<option value="'+i+'">' + data[i-1][code].pref + '</option>');
        //   }
        // console.log($.type(php.str));
    // });
    if ($.isArray(php.str)) {
        for(var i=1; i<48; i++) {
            var code = ('00'+i).slice(-2); // ゼロパディング
            $('#select-pref').append('<option value="'+php.str[i-1][code].en_pref+'">' + php.str[i-1][code].pref + '</option>');
        }
    }
    // console.log(test);
    // console.log(php.str);
});
$(function() {
    $('#select-pref').on('change', function() {
      $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
        // var select_pref = $('#select-pref option:selected').option.val();
        var index = $(this).prop("selectedIndex");
       
        var select_pref = ('00'+index).slice(-2);  // ここ
        // console.log(index);
        var key = Number(select_pref) - 1;    // Number() 数値変換
        // $.getJSON('pref_city.json', function(data) {
        if ($.isArray(php.str)) {
          for(var i=0; i<php.str[key][select_pref].city.length; i++){
            $('#select-city').append('<option value="'+php.str[key][select_pref].city[i].en_city+'">'+php.str[key][select_pref].city[i].name+'</option>');
          }
        }
    });
});

// 戻るボタンをした時、都道府県市町村を前の設定にするfunc
function init() {
  if (inputData.str['name'] != "") {
    // 都道府県設定
    console.log(inputData.str['prefecture']);
    $('#select-pref option[value='+ inputData.str['prefecture']+']').prop('selected',true).change();
    $('#select-city option[value='+ inputData.str['local']+']').prop('selected',true);
  }
}

// 戻るページでカテゴリ選択のselectを実行する関数
function cat(count) {
  let val = inputData.str[`selectForm${count}`];
  $(function($){
    $(`select#lv${count}.group${count} option[value=${val}]`).prop('selected',true).trigger('change');
    console.log(`cat${count}prop`);
  });
  // return count + 1;
}

// selectを再帰する関数
function recallCat(int) {
  // console.log('最初');
  let nextInt = int + 1;
  if (int > 8 || isNaN(int)) {
    console.log('おわり');
    return 0; 
  }
  // let nextInt = cat(int);
  $(function($) {
    $(`select#lv${int}.group${int}`).change(function(){
      
      recallCat(nextInt);
      console.log(`recallCat${nextInt}回目実行`);

    });
  }); 

  cat(int);
  console.log(`cat${int}回目実行`);
    
    // console.log(`nextInt${nextInt}`);
    // setTimeout(function() {
    //   console.log('recallCat実行');
    //   return recallCat(nextInt);
    // }, 1000);
    
}

jQuery(function() {
  // init();  // 都道府県select
  let count = 1;
  // var funcs = [init(), recallCat(count)];
  
  $(window).on('onshowpage', init());
  // recallCat(count)
  
});
