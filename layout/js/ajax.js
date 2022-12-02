function fetch_data() {
  $('#data').html("");
    $.ajax({
        url: "main.php",
        method: "POST",
        success: function(data) {
            $('#data').empty().html(data);
        }
    });
}
$(document).ready(function(){
fetch_data();
});
//   // $(document).on('click', '.item_link', function() {
//   //     var item_id = $(this).attr("data-item");
//   //     // var folder = $(this).attr("data-folder");
//   //   $.ajax({
//   //       url: "items.php",
//   //       method: "POST",
//   //       data: {
//   //           id: item_id,
//   //       },
//   //       dataType: "text",
//   //       success: function(data) {
//   //           $('#data').html(data);
//   //
//   //       }
//   //   });
//   //   });
//

$(document).on('click', '.homepage', function() {
  fetch_data();
});
$(document).on('click', '.link', function() {
    var id = $(this).attr("data-id");
    var page = $(this).attr("data-page")+".php";
    if (this.hasAttribute("data-id")) {
  $.ajax({
      url: page,
      method: "POST",
      data: {
          id:id,
      },
      dataType: "text",
      success: function(data) {
          $('#data').empty().html(data);

      }
  });
}else{
  $.ajax({
      url: page,
      method: "POST",
      success: function(data) {
          $('#data').empty().html(data);
      }
  });
}
  });
$(document).on('click', '.search-button', function() {
  // $(".registration").submit(function(){
      var data = new FormData(document.querySelector('.registration'));
       $.ajax({
        url: "registration-insert.php",
        type: 'post',
        data : data,
        processData: false,
        contentType: false,
        dataType : 'html',
        success : function(data)
        {
          $(".registration").prepend("<div class='msg'>Inserted Successfully</div>");
        }
    });
    return false;
  });
$(document).on('click', '.search-button', function() {
    var data = new FormData(document.querySelector('.search-form'));
      // var data = new FormData(document.querySelector('.search-form'));
       $.ajax({
        url: "search.php",
        type: 'post',
        data : data,
        processData: false,
        contentType: false,
        success : function(data)
        {
$('#data').empty().html(data);
        }
    });
    return false;
  });
  $(document).keypress(function(e) {
    var data = new FormData(document.querySelector('.search-form'));
  if(e.which == 13) {
    $.ajax({
     url: "search.php",
     type: 'post',
     data : data,
     processData: false,
     contentType: false,
     success : function(data)
     {
$('#data').empty().html(data);
     }
 });
 return false;
    }
    });
