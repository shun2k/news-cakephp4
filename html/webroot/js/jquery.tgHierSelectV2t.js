/**
 * jquery.tgHierSelectV2
 * 
 * 【概要】
 * 階層としているプルダウンを選択値により連動させるjQueryプラグインです。
 *  
 * 【親子の関連付け方法】
 * 子のクラス名に、"p'親のvalue'" を付与して下さい。
 *（例：p1)
 * 
 * 【セレクトメニューの命名規則】
 * selectのnameは任意でOK。idは必ず「lv」を接頭語とし、以下数値を付ける形で一意の名称にして下さい。
 * 連動させるセレクトメニューには同じclass名を付けて下さい。
 *（例：<select name="sample1" id="lv1" class="group1"> ）
 * 
 * 【HTMLに記載するオプションの記述方法】
 *  $(document).ready(function(){
 *      $(this).tgHierSelectV2({
 *          group: 'group1',          ←★グループ名
 *          maxLevel: '5',            ←★最下層とするセレクトメニューの階層数。この場合は5階層となる
 *          defaultSelect: '▼選択',  ←★デフォルトのオプション内容
 *      });
 *  });
 * 
 * @Copyright : 2014 toogie | http://wataame.sumomo.ne.jp/archives/5124
 * @Version   : 2.0
 * @Modified  : 2014-04-28
 * 
 */

;(function($){
    $.fn.tgHierSelectV2t = function(options){
        // html 側でしてした、グループ名などのオプション
        var opts = $.extend({}, $.fn.tgHierSelectV2t.defaults, options);
        var cnt;
        var arr = [];       // optionの内容をコピーする配列
        var selectVal = [8]; // 選択したoptionの値を入れる配列

        $('html').find('select.'+opts.group).each( function(){

            // nameのレベル番号取得(id)
            var lvTxt = parseInt($(this).attr('id').replace(/lv/, ""));

            // プルダウンのoption内容をコピー
            arr[lvTxt] = $('#lv'+lvTxt+' option').clone();
            // var returnVal = "";     // 返す値      

            // プルダウン選択時処理
            $('#'+this.id).change( function(){

                // プルダウン選択値
                var pdVal = $(this).val();
                // returnVal += pdVal;     // returnVal に選択値を入れる
                // selectVal.push(pdVal);
                selectVal[lvTxt - 1] = pdVal;

                // レベル文字を取得し数値化
                var currentLvNum = parseInt($(this).attr('id').replace(/lv/, ""));
                var nextLevelNum = currentLvNum+1;

                // プルダウン操作
                $('#lv'+nextLevelNum).removeAttr("disabled");                   // 子プルダウンの"disabled"解除
                // $('#lv'+nextLevelNum+" option").remove();                       // 次のプルダウンのoptionを削除
                // selectValの選択した位置より下の選択肢の値を全て０にする
                for (let i = lvTxt; i < selectVal.length; i++) {
                    selectVal[i] = 0; 
                }

                // 選択したoptionの値にdisabledをつける
                $.each(selectVal,function(index, value) {
                    $('#lv'+nextLevelNum+" option[class = " + String(value) + "]").prop('disabled', true);
                    // console.log(value);
                })
                // 選択していないoptionの値からdisabledを外す　optionのインデックスを取得
                let selectCount = 1;
                while (selectCount < 9) {
                    // selectVal配列に含まれているかを確認するif文
                    if (!selectVal.includes(String(selectCount))) {
                        $('#lv'+nextLevelNum+" option[class = " + String(selectCount) + "]").prop('disabled', false);
                        // console.log( "disabled外す"+selectCount);
                    } 
                    selectCount = selectCount + 1;

                    // console.log(selectVal.includes(String(selectCount)));
                }

                // デフォルトのoptionを先頭に表示
                // for(cnt=nextLevelNum; cnt<=opts.maxLevel; cnt++){
                //     $('#lv'+cnt).prepend('<option value="0" selected="selected">'+opts.defaultSelect+'</option>');
                // }
                // 変更したプルダウン以下の子プルダウンを全てdisabledに
                if((nextLevelNum+1) <= opts.maxLevel+1){
                    for(i=nextLevelNum+1; i<=opts.maxLevel+1; i++){
                        $('#lv'+i).attr("disabled", "disabled");
                        $('#lv'+nextLevelNum+" option[class = 0]").prop('selected', true);
                        // console.log(nextLevelNum);
                    }

                }
                // console.log(`nextlevel${nextLevelNum}`);      // ログ確認用
            });
        });
    }
})(jQuery);