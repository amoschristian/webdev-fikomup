<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a id="back-to-top-button"></a>

<style>
#back-to-top-button {
  display: inline-block;
  background-color: #f44f00;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}
#back-to-top-button::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}
#back-to-top-button:hover {
  cursor: pointer;
  background-color: #333;
}
#back-to-top-button:active {
  background-color: #555;
}
#back-to-top-button.show {
  opacity: 1;
  visibility: visible;
}
</style>

<script>
$(document).ready(function(){
    var btn = $('#back-to-top-button');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '800');
    });
});

</script>