<script type="text/javascript">
window.fbAsyncInit = function() {
  FB.init({
    appId      : 947921761990783,
    xfbml      : true,
    version    : 'v2.5'
  });
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

</script>


<section id="banner">
  <img src="<?php echo $this->webroot; ?>img/banner.png">
</section>
<section id="index">


  <?php 



  if(empty($passes)){ ?>
    <div id="empty">
      <h1>Come back soon...</h1>
      <p>Sorry, no deals on at the moment. Try again tomorrow.</p>
    </div>
  <?php }else{ ?>


  <?php foreach ($passes as $key => $value) { ?>

  <?php
  if(date('F',strtotime($value['Pass']['end'])) == date('F',strtotime($value['Pass']['start'])))
    $date = date('j',strtotime($value['Pass']['start'])).'-'.date('j',strtotime($value['Pass']['end'])).' '.date('F',strtotime($value['Pass']['end'])).', '.date('Y',strtotime($value['Pass']['end']));
  else
    $date = date('j',strtotime($value['Pass']['start'])).' '.date('F',strtotime($value['Pass']['start'])).' - '.date('j',strtotime($value['Pass']['end'])).' '.date('F',strtotime($value['Pass']['end'])).', '.date('Y',strtotime($value['Pass']['end']));
$code['id'] = "";
$code['code'] = "";
  foreach ($value['Code'] as $codes) {
    if($codes['active'] == 1){
      $code['id'] = $codes['id'];
      $code['code'] = $codes['code'];
      break;
    }
  }
  ?>

    <input id="statusBuyer" value="<?php echo $msj;?>" type="hidden">
    <div class="pass" name="<?php echo ucwords($value['Pass']['name']); ?>" date="<?php echo $date; ?>" old="<?php echo $value['Pass']['old_price']; ?>" new="<?php if($value['Pass']['new_price'] > 0) echo '$'.$value['Pass']['new_price']; else echo "FREE"; ?>" id="<?php echo $code['code']; ?>" idcode="<?php echo $code['id']; ?>" passid="<?php echo $value['Pass']['id']; ?>" left="<?php echo $value['Pass']['top']; ?>">
      <p class="title"><?php echo ucwords($value['Pass']['name']); ?>, <b><?php echo $date; ?></b>
      <?php $sold=0; if($value['Pass']['top']==0){ $sold=1;?>
        <small>SOLD OUT</small>
      <?php }else{ ?>
        <small><span class="number"><?php echo $value['Pass']['top']; ?></span> passes left</small>
      <?php } ?>
      </p>
      <?php if($value['Pass']['top']==0){ ?>
        <small id="small_movil">SOLD OUT</small>
      <?php }else{ ?>
        <small id="small_movil"><span class="number"><?php echo $value['Pass']['top']; ?></span> passes left</small>
      <?php } ?>
      <div class="price">
        <div class="old_price">$<?php echo $value['Pass']['old_price']; ?></div>
        <div class="new_price"><?php if($value['Pass']['new_price'] > 0) echo '$'.$value['Pass']['new_price']; else echo "FREE"; ?></div>
      </div>

      <small>Main Events...</small>

      <div class="view-with-margin">
        <div id="pass_1" class="owl-carousel">
          <?php foreach ($value['Game'] as $key => $value) { ?>
            <div class="item" style="background-image:url('<?php echo $this->webroot; ?>files/<?php echo $value['image']; ?>');">
              <div class="tile_descr"><?php echo ucwords($value['name']); ?></div>
            </div>
          <?php } ?>
        </div>
      </div>

      <?php if($sold==1){ ?>
        <button class="hail_btn grab_deal" style="background-color: gray;" type="button" disabled>GRAB DEAL</button>
      <?php }else{ ?>
        <button class="hail_btn grab_deal" type="button" data-toggle="modal" data-target="#deal_confirmation_modal">GRAB DEAL</button>
      <?php } ?>
    </div>

  <?php } ?>
<?php } ?>


</section>

<div class="modal fade" id="deal_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ex"><img src="<?php echo $this->webroot; ?>img/x.png"></span></button>
      </div>
      <div id="step_1" class="modal-body ">
        <div id="woohoo" class="title_img"></div>
        <p class="modal_title">You have chosen the following:</p>
        <div class="choosen_pass">
          <p id="name_modal" class="title"></p>
          <div class="resume_ticket">
            <div id="old_modal" class="old_price"></div>
            <div id="new_modal" class="new_price"></div>
            <div class="fp"></div>
          </div>
        </div>
        <p class="modal_subtitle">Enter your details to receive a unique code</p>
        <div class="form row">
          <div class="col-md-6">
            <input type="text" class="form-control inputs_hail" placeholder="First Name" id="name">
            <input type="text" class="form-control inputs_hail" placeholder="Last Name" id="last">
            <input type="email" class="form-control inputs_hail" placeholder="Email" id="email">
            <input type="checkbox" id="terms"><label>I agree to the <a href="#">terms</a></label>
          </div>
          <div class="col-md-6">
            <!-- <a target="_blank" href="<?php echo $this->webroot;?>">NEXT</a> -->
            <button id="next_btn" class="hail_btn" type="button">NEXT</button>
          </div>
        </div>
      </div>


      <div id="step_2" class="modal-body hidden">
        <div id="thx" class="title_img"></div>
        <p class="modal_title">Credit/Debit Card Payment</p>
        <div class="form">
          <div class="row">
            <div class="modal_labels"><label>Card Number:*</label></div>
            <div class="modal_inputs"><input type="number" class="form-control inputs_hail" required id="card_number"></div>
          </div>
          <div class="row">
            <div class="modal_labels"><label>Card Holder Name:*</label></div>
            <div class="modal_inputs"><input type="text" class="form-control inputs_hail" required id="card_name"></div>
          </div>
          <div class="row">
            <div class="modal_labels"><label>Expiry Date: (MM/YY)*</label></div>
            <div class="modal_inputs">
              <input type="number" class="form-control small_input inputs_hail" required id="month">
              <input type="number" class="form-control small_input inputs_hail" style="margin-left:10px;" required id="year">
            </div>
          </div>
          <div class="row">
            <div class="modal_labels"><label>Card Security Code:</label></div>
            <div class="modal_inputs">
              <input type="text" class="form-control medium_input inputs_hail" required id="card_name">
              <small><a href="">What's this?</a></small>
            </div>
          </div>
          <div class="row" style="margin-top:60px!important;">
            <div class="modal_labels"><small><a href="" data-dismiss="modal">Cancel Payment</a></small></div>
            <div class="modal_inputs">
              <button id="submit" class="hail_btn" type="button">SUBMIT</button>
            </div>
          </div>
          <div class="payments-container">
            <div id="payment_img"></div>
            <div id="visa_img"></div>
            <small><a href="">Privacy Policy</a></small>
          </div>
        </div>
      </div>

      <div id="step_3" class="modal-body hidden">
        <div id="cheers" class="title_img"></div>
        <p class="modal_title">Your unique code is on it’s way.</p>
        <p class="modal_subtitle" id="client_name"></p>
        <div id="input_tlf">
          <div class="form">
            <input type="numer" class="form-control inputs_hail" placeholder="Enter Phone Number (no spaces)" id="phone">
            <a target="_blank" href="" id="code_btn" class="hail_btn" type="button">SEND CODE</a>
            <div id="check"></div>
          </div>
        </div>
        <div id="social_container">
          <div class="socials" style="margin-bottom: 55px;">
            <div class="social_item_l">
              <div class="social" id="fb"></div>
              <span class="facebook">Share deal on Facebook</span>
            </div>
            <div class="social_item_r">
              <div class="social" id="tw"></div>
              <span><a id="twitter" target="_blank" href="">Share deal on Twitter</a></span>
            </div>
          </div>
          <div class="socials">
            <div class="social_item_l">
              <div class="social" id="apple"></div>
              <span><a target="_blank" href="https://itunes.apple.com/nz/app/fan-pass/id941399309?mt=8">FAN PASS iOS app</a></span>
            </div>
            <div class="social_item_r">
              <div class="social" id="android"></div>
              <span><a target="_blank" href="https://play.google.com/store/apps/details?id=nz.co.skytv.fanpass&hl=es_419">FAN PASS Andriod app</a></span>
            </div>
          </div>
        </div>
        <button id="fp_btn" class="hail_btn" type="button" onclick="window.open('http://fanpass.co.nz','_blank');">GO TO FAN PASS</button>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

var code;
var name;
var date;
var uname;
$(document).ready(function() {

  if ( $('#statusBuyer').val() == 1 ){
    $('.grab_deal').click()
    $('#client_name').html('Thanks <?php echo $this->Session->read("name")?> check your inbox for your code, or if you prefer, we can txt it to your mobile.');
    $('#step_1').addClass('hidden');
    $('#step_3').removeClass('hidden');
  }

  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    responsiveClass:true,
    navText: [
      "<img class='arrow-black' src='<?php echo $this->webroot; ?>img/arrow-left-black.png'>",
      "<img class='arrow-black' src='<?php echo $this->webroot; ?>img/arrow-right-black.png'>"
      ],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
  });
});


$('.grab_deal').click(function(event) {
  name = $(this).parent('.pass').attr('name');
  date = $(this).parent('.pass').attr('date');
  idcode = $(this).parent('.pass').attr('idcode');
  passid = $(this).parent('.pass').attr('passid');
  old = $(this).parent('.pass').attr('old');
  new_ = $(this).parent('.pass').attr('new');
  left = $(this).parent('.pass').attr('left');
  $('#name_modal').html(name+', <b>'+date+'</b>');
  $('#old_modal').html('$'+old);
  $('#new_modal').html(new_);
  code = $(this).parent('.pass').attr('id');
  $('#twitter').attr('href', "https://twitter.com/intent/tweet?original_referer=<?php echo $this->webroot;?>&amp;tw_p=tweetbutton&amp;url=http://www.hailmary.com&amp;text=I just got a "+new_+" deal for Fan Pass - only "+(left-1)+" left - get in there!");
  
});

$('.facebook').on('click', function() {
    FB.ui({
        method: 'share_open_graph',
        action_type: 'og.shares',
        action_properties: JSON.stringify({
            object : {
               'og:url': window.location.href,
               'og:title': 'Hail Mary',
               'og:description': 'I just got a '+new_+' deal for Fan Pass - only '+(left-1)+' left - get in there!',
               'og:og:image:width': '2560',
               'og:image:height': '960',
               'og:image': window.location.href + 'img/logo_fp.png'
            }
        })
    });
  });

function fbs_click(TheImg) {
  u=TheImg.src;
  t=TheImg.getAttribute('alt');
  window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t=I just got a $asd deal for Fan Pass - only asd left - get in there!','sharer','toolbar=0,status=0,width=626,height=436');return false;
}

$('#deal_confirmation_modal').on('hidden.bs.modal', function () {
  $('#step_1').removeClass('hidden');
  $('#step_2').addClass('hidden');
  $('#step_3').addClass('hidden');
  location.reload();
})

$('#next_btn').click(function(event) {
  if( $('#statusBuyer').val() != 1 ){ 
    uname = $('#name').val() +" "+$('#last').val();
    if($('#terms').is(':checked')){
      var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
      if($('#name').val() == "" || $('#last').val() == "" || $('#email').val() == "" ){
        alert('Please, enter all data');
      }else{
        if(!pattern.test($('#email').val())){
          alert('Please, enter correct email');
        }else{
          window.location = '<?php echo $this->webroot; ?>passes/buy/'+uname+'/'+$('#email').val()+'/'+idcode+'/'+passid+'/'+code+'/'+new_;
          // $('#client_name').html('Thanks '+$('#name').val()+' check your inbox for your code, or if you prefer, we can txt it to your mobile.');
          // $('#step_1').addClass('hidden');
          // $('#step_2').removeClass('hidden');
        }
      }
    }else{
      alert('You must agree to the terms');
    }
  }
});

$('#submit').click(function(event) {

  $('#submit').html("Wait...");
  $('#submit').attr('disabled', 'disabled');
  var data = {
    name : name,
    email : $('#email').val(),
    date : date,
    code : code,
    idcode : idcode,
    passid : passid
  };

  $.post(WEBROOT+'pages/sendMail',{data:data},function(data){
    if(data == 1){
      $('#step_2').addClass('hidden');
      $('#step_3').removeClass('hidden');
    }
  },'json');
});

</script>
