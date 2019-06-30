'use strict';
$(document).on('click', '.js-like',function(){
  // console.log('clicked');
  let diaryId = $(this).siblings('.diary-id').val(),
      $clickedBtn = $(this);
  like(diaryId, $clickedBtn);
});
$(document).on('click','.js-dislike',function(){
  let diaryId = $(this).siblings('.diary-id').val(),
      $clickedBtn = $(this);
  dislike(diaryId, $clickedBtn);
})

function like(diaryId, $clickedBtn){
  $.ajax({
    url: 'diary/' + diaryId + '/like',
    type: 'POST',
    dataTyupe: 'json',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  .then(
    function(data){
      changeLikeBtn($clickedBtn);
      let num = Number($clickedBtn.siblings('.js-like-num').text());
      $clickedBtn.siblings('.js-like-num').text(num + 1);
    },
    function(){
      console.log('error');
    }
  )
}
function changeLikeBtn(btn){
  btn.toggleClass('far').toggleClass('fas');
  btn.toggleClass('js-like').toggleClass('js-dislike');
}

function dislike(diaryId, $clickedBtn){
  $.ajax({
    url: 'diary/' + diaryId +'/dislike',
    type: 'POST',
    dataTyupe: 'json',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  .then(
    function(data){
      changeLikeBtn($clickedBtn);
      let num = Number($clickedBtn.siblings('.js-like-num').text());
      $clickedBtn.siblings('.js-like-num').text(num - 1);
    },
    function(){
      console.log('error');
    }
  )
}