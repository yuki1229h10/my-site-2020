/**
 * ハンバーガーメニュー
 */
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById("header__hm-btn").addEventListener("click", function () {
    this.classList.toggle("active");
    document.getElementById("header__hm-menu").classList.toggle("active");
  });

});


/**
 * スムーススクロール
 */
const smoothScroll = function () {

  const interval = 10,
    divisor = 10,
    range = 5,
    btn = document.querySelectorAll('a[href^="#"]');

  let count = 0;
  while (count < btn.length) {
    (function (elem) {
      btn[elem].addEventListener('click', function (e) {
        e.preventDefault();
        let toY,
          nowY = window.scrollY || window.pageYOffset;
        const href = btn[elem].getAttribute('href'),
          target = document.querySelector(href),
          targetY = target.getBoundingClientRect().top + nowY;

        (function doScroll() {
          toY = nowY + (targetY - nowY) / divisor;
          window.scrollTo(0, toY);
          nowY = toY;

          if (toY >= targetY + range || toY <= targetY - range) {
            setTimeout(doScroll, interval);
          }
        })();
      }, false);
    })(count);
    count++;
  }

}
smoothScroll();


/**
 * モーダルウィンドウ
 */
$(function () {
  $('.js-modal-open').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});


/**
 * ふわっとアニメーション
 */ 
/* 到達したら要素を表示させる */
function showElementAnimation() {
                    
  var element = document.getElementsByClassName('js-fadein');
  if(!element) return; // 要素がなかったら処理をキャンセル
                      
  var showTiming = window.innerHeight > 850 ? 200 : 80; // 要素が出てくるタイミングはここで調整
  var scrollY = window.pageYOffset; //スクロール量を取得
  var windowH = window.innerHeight; //ブラウザウィンドウのビューポート(viewport)の高さを取得
                    
  for(var i=0;i<element.length;i++) { 
    var elemClientRect = element[i].getBoundingClientRect(); 
    var elemY = scrollY + elemClientRect.top; 
    if(scrollY + windowH - showTiming > elemY) {
      element[i].classList.add('is-show');
    } else if(scrollY + windowH < elemY) {
    // 上にスクロールして再度非表示にする場合はこちらを記述
      element[i].classList.remove('is-show');
    }
  }
}
showElementAnimation();
window.addEventListener('scroll', showElementAnimation);