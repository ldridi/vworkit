$(document).ready(function(){
	$('.carousel').carousel({
		interval: 4000
	});
});
$(document).ready(function(){
    $(".form-control").tooltip();  
     
});


$(document).ready(function(){
    $("a").tooltip();
});
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
	$('html,body').animate({scrollTop:$(this.hash).offset().top},500);
  $('#testform').css('background-color','#ffebbc').delay(1000);
	});
});


$(document).ready(function() { 
  
      $("#form2").hide(); 
       $("#form4").hide();
       $("#form5").hide();
       $("#form6").hide();
       $("#form7").hide();
       $("#form8").hide();
     
}); 
 

$(document).ready(function() { 
  $("[id=patient]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form1").show();
      $("#form2").hide();
      $("#form5").hide();
      $("#form7").hide();
      
       
     
    }); 
  }); 
});
$(document).ready(function() { 
  $("[id=doctor]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form2").show();
      $("#form1").hide(); 
      $("#form5").hide();
      $("#form7").hide();
      
    }); 
  }); 
});
$(document).ready(function() { 
  $("[id=companies]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val();
      $("#form7").show();
      $("#form2").hide();
      $("#form1").hide(); 
      $("#form5").hide();
      
    }); 
  }); 
});
$(document).ready(function() { 
  $("[id=center]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form5").show();
      $("#form2").hide();
      $("#form1").hide();
      $("#form7").hide();
      
    }); 
  }); 
});
 

 $(document).ready(function() { 
  $("[id=patient_conx]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form3").show();
      $("#form4").hide();
      $("#form6").hide(); 
      $("#form8").hide();
      
       
     
    }); 
  }); 
});
$(document).ready(function() { 
  $("[id=doctor_conx]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form4").show();
      $("#form3").hide();
      $("#form6").hide(); 
      $("#form8").hide();
      
    }); 
  }); 
});
$(document).ready(function() { 
  $("[id=center_conx]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form6").show();
      $("#form4").hide();
      $("#form3").hide();
      $("#form8").hide(); 
      
    }); 
  }); 
});
$(document).ready(function() { 
  $("[id=company_conx]").each(function(i) { 
    $(this).change(function(){ 
      divId = $(this).val(); 
      $("#form8").show();
      $("#form6").hide();
      $("#form4").hide();
      $("#form3").hide(); 
      
    }); 
  }); 
});




$(document).ready(function(){
  $('.btn[data-checkbox-name]').click(function() {
    $('input[name="'+$(this).data('checkboxName')+'"]').val(
        $(this).hasClass('active') ? 0 : 1
    );
});
});
$(function(){
  
   
    $('#sectionAA').hide(0);
     
    
    
  
});
$(function(){
  
   
    $('#sectionA').show(0);
     
    $('#sectionC').hide(0);
$('#frame').hide(0);
$('#sectionD').hide(0);
    
  
});
$(function(){
  $('#booking').click(function(){
    $('#frame').show(0);
    $('#sectionA').hide(0);
    $('#sectionD').hide(0);
    $('#sectionC').hide(0);
    
  });
  $('#profil').click(function(){
    $('#sectionA').show(0);
    $('#frame').hide(0);
    $('#sectionD').hide(0);
    $('#sectionC').hide(0);
    
  });
  
  $('#gal').click(function(){
    $('#sectionC').show(0);
    $('#frame').hide(0);
    $('#sectionD').hide(0);
    $('#sectionA').hide(0);
  });
  $('#map').click(function(){
    $('#sectionD').show(0);
    $('#sectionC').hide(0);
    $('#frame').hide(0);
    $('#sectionA').hide(0);
  });
});
/* -------------- */
$(function(){
  $('#affdoc').show(0);
  });
$('#affichedoctor').click(function(){
    $('#affdoc').show(0);
    
  });



$(function(){
  $('#home').click(function(){
    $(this).css('background-color','black');
    
    
    
  });
});
$(function(){
  $('#lien').click(function(){
    $('#otherl').show();
    
    
    
  });
});
$(function(){
  $('#lotfi').click(function(){
    $('#dridi').show();
    
    
    
  });
});
$(function(){
  $('#var1').click(function(){
    $('#var').show();
    
    
    
  });
});
$(function(){
  $('.msg').click(function(){
    $('.message').toggle();
    $('.alerte').hide();
    $('.recrutement').hide();
    $('.visite').hide();
  });
});

$(function(){
  $('.notif').click(function(){
    $('.alerte').toggle();
    $('.message').hide();
    $('.recrutement').hide();
    $('.visite').hide();
  });
});
$(function(){
  $('.recru').click(function(){
    $('.recrutement').toggle();
    $('.alerte').hide();
    $('.message').hide();
    $('.visite').hide();
    
  });
});
$(function(){
  $('.visit').click(function(){
    $('.visite').toggle();
    $('.recrutement').hide();
    $('.alerte').hide();
    $('.message').hide();
    
    
  });
});
$(function(){
  $('.param').click(function(){
    $('#historique').slideToggle(200);
    $('#moncompte').slideUp();
    $('.aidesite').slideUp();
    
  });
});
$(function(){
  $('.param1').click(function(){
    $('#moncompte').toggle({ "right": "0%" } );
    
    
  });
});
$(function(){
  $('.exit').click(function(){
    $('#historique').slideUp();
    
    
    
  });
});

$(function(){
  $('.comment').click(function(){
    $('.aidesite').slideToggle(200);
    $('#moncompte').slideUp();
    $('#historique').slideUp();
    
  });
});

$(function(){
  $('.param3').click(function(){
    $('#commenttache').toggle({ "right": "0%" } );
    
    
  });
});


$(function(){
  $('#affichepays').click(function(){
    $('#pays').toggle();
    
    
  });
});

$(function(){
  $('#affichezip').click(function(){
    $('#zip').toggle();
    
    
  });
});









$(document).ready(function() {
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
});

/*

This Snippet is using a modified Stack Blur js lib for blurring the header images.

I could not use hosted images because Canvas cannot work with cross domain images. If you want to use hosted images make sure they are on the same domain.

Have fun!

*/

/*

StackBlur - a fast almost Gaussian Blur For Canvas

Version:     0.5
Author:   Mario Klingemann
Contact:  mario@quasimondo.com
Website:  http://www.quasimondo.com/StackBlurForCanvas
Twitter:  @quasimondo

In case you find this class useful - especially in commercial projects -
I am not totally unhappy for a small donation to my PayPal account
mario@quasimondo.de

Or support me on flattr: 
https://flattr.com/thing/72791/StackBlur-a-fast-almost-Gaussian-Blur-Effect-for-CanvasJavascript

Copyright (c) 2010 Mario Klingemann

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/

var mul_table = [
        512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,
        454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,
        482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,
        437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,
        497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,
        320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,
        446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,
        329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,
        505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,
        399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,
        324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,
        268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,
        451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,
        385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,
        332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,
        289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];
        
   
var shg_table = [
       9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17, 
    17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 
    19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20,
    20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21,
    21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
    21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 
    22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22,
    22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23, 
    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 
    23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24 ];


function stackBlurCanvasRGBA( canvas, top_x, top_y, width, height, radius )
{
  if ( isNaN(radius) || radius < 1 ) return;
  radius |= 0;
  
  var context = canvas.getContext("2d");
  var imageData;
  
  try {
    try {
    imageData = context.getImageData( top_x, top_y, width, height );
    } catch(e) {
    
    // NOTE: this part is supposedly only needed if you want to work with local files
    // so it might be okay to remove the whole try/catch block and just use
    // imageData = context.getImageData( top_x, top_y, width, height );
    try {
      netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
      imageData = context.getImageData( top_x, top_y, width, height );
    } catch(e) {
      alert("Cannot access local image");
      throw new Error("unable to access local image data: " + e);
      return;
    }
    }
  } catch(e) {
    alert("Cannot access image");
    throw new Error("unable to access image data: " + e);
  }
      
  var pixels = imageData.data;
      
  var x, y, i, p, yp, yi, yw, r_sum, g_sum, b_sum, a_sum, 
  r_out_sum, g_out_sum, b_out_sum, a_out_sum,
  r_in_sum, g_in_sum, b_in_sum, a_in_sum, 
  pr, pg, pb, pa, rbs;
      
  var div = radius + radius + 1;
  var w4 = width << 2;
  var widthMinus1  = width - 1;
  var heightMinus1 = height - 1;
  var radiusPlus1  = radius + 1;
  var sumFactor = radiusPlus1 * ( radiusPlus1 + 1 ) / 2;
  
  var stackStart = new BlurStack();
  var stack = stackStart;
  for ( i = 1; i < div; i++ )
  {
    stack = stack.next = new BlurStack();
    if ( i == radiusPlus1 ) var stackEnd = stack;
  }
  stack.next = stackStart;
  var stackIn = null;
  var stackOut = null;
  
  yw = yi = 0;
  
  var mul_sum = mul_table[radius];
  var shg_sum = shg_table[radius];
  
  for ( y = 0; y < height; y++ )
  {
    r_in_sum = g_in_sum = b_in_sum = a_in_sum = r_sum = g_sum = b_sum = a_sum = 0;
    
    r_out_sum = radiusPlus1 * ( pr = pixels[yi] );
    g_out_sum = radiusPlus1 * ( pg = pixels[yi+1] );
    b_out_sum = radiusPlus1 * ( pb = pixels[yi+2] );
    a_out_sum = radiusPlus1 * ( pa = pixels[yi+3] );
    
    r_sum += sumFactor * pr;
    g_sum += sumFactor * pg;
    b_sum += sumFactor * pb;
    a_sum += sumFactor * pa;
    
    stack = stackStart;
    
    for( i = 0; i < radiusPlus1; i++ )
    {
      stack.r = pr;
      stack.g = pg;
      stack.b = pb;
      stack.a = pa;
      stack = stack.next;
    }
    
    for( i = 1; i < radiusPlus1; i++ )
    {
      p = yi + (( widthMinus1 < i ? widthMinus1 : i ) << 2 );
      r_sum += ( stack.r = ( pr = pixels[p])) * ( rbs = radiusPlus1 - i );
      g_sum += ( stack.g = ( pg = pixels[p+1])) * rbs;
      b_sum += ( stack.b = ( pb = pixels[p+2])) * rbs;
      a_sum += ( stack.a = ( pa = pixels[p+3])) * rbs;
      
      r_in_sum += pr;
      g_in_sum += pg;
      b_in_sum += pb;
      a_in_sum += pa;
      
      stack = stack.next;
    }
    
    
    stackIn = stackStart;
    stackOut = stackEnd;
    for ( x = 0; x < width; x++ )
    {
      pixels[yi+3] = pa = (a_sum * mul_sum) >> shg_sum;
      if ( pa != 0 )
      {
        pa = 255 / pa;
        pixels[yi]   = ((r_sum * mul_sum) >> shg_sum) * pa;
        pixels[yi+1] = ((g_sum * mul_sum) >> shg_sum) * pa;
        pixels[yi+2] = ((b_sum * mul_sum) >> shg_sum) * pa;
      } else {
        pixels[yi] = pixels[yi+1] = pixels[yi+2] = 0;
      }
      
      r_sum -= r_out_sum;
      g_sum -= g_out_sum;
      b_sum -= b_out_sum;
      a_sum -= a_out_sum;
      
      r_out_sum -= stackIn.r;
      g_out_sum -= stackIn.g;
      b_out_sum -= stackIn.b;
      a_out_sum -= stackIn.a;
      
      p =  ( yw + ( ( p = x + radius + 1 ) < widthMinus1 ? p : widthMinus1 ) ) << 2;
      
      r_in_sum += ( stackIn.r = pixels[p]);
      g_in_sum += ( stackIn.g = pixels[p+1]);
      b_in_sum += ( stackIn.b = pixels[p+2]);
      a_in_sum += ( stackIn.a = pixels[p+3]);
      
      r_sum += r_in_sum;
      g_sum += g_in_sum;
      b_sum += b_in_sum;
      a_sum += a_in_sum;
      
      stackIn = stackIn.next;
      
      r_out_sum += ( pr = stackOut.r );
      g_out_sum += ( pg = stackOut.g );
      b_out_sum += ( pb = stackOut.b );
      a_out_sum += ( pa = stackOut.a );
      
      r_in_sum -= pr;
      g_in_sum -= pg;
      b_in_sum -= pb;
      a_in_sum -= pa;
      
      stackOut = stackOut.next;

      yi += 4;
    }
    yw += width;
  }

  
  for ( x = 0; x < width; x++ )
  {
    g_in_sum = b_in_sum = a_in_sum = r_in_sum = g_sum = b_sum = a_sum = r_sum = 0;
    
    yi = x << 2;
    r_out_sum = radiusPlus1 * ( pr = pixels[yi]);
    g_out_sum = radiusPlus1 * ( pg = pixels[yi+1]);
    b_out_sum = radiusPlus1 * ( pb = pixels[yi+2]);
    a_out_sum = radiusPlus1 * ( pa = pixels[yi+3]);
    
    r_sum += sumFactor * pr;
    g_sum += sumFactor * pg;
    b_sum += sumFactor * pb;
    a_sum += sumFactor * pa;
    
    stack = stackStart;
    
    for( i = 0; i < radiusPlus1; i++ )
    {
      stack.r = pr;
      stack.g = pg;
      stack.b = pb;
      stack.a = pa;
      stack = stack.next;
    }
    
    yp = width;
    
    for( i = 1; i <= radius; i++ )
    {
      yi = ( yp + x ) << 2;
      
      r_sum += ( stack.r = ( pr = pixels[yi])) * ( rbs = radiusPlus1 - i );
      g_sum += ( stack.g = ( pg = pixels[yi+1])) * rbs;
      b_sum += ( stack.b = ( pb = pixels[yi+2])) * rbs;
      a_sum += ( stack.a = ( pa = pixels[yi+3])) * rbs;
       
      r_in_sum += pr;
      g_in_sum += pg;
      b_in_sum += pb;
      a_in_sum += pa;
      
      stack = stack.next;
    
      if( i < heightMinus1 )
      {
        yp += width;
      }
    }
    
    yi = x;
    stackIn = stackStart;
    stackOut = stackEnd;
    for ( y = 0; y < height; y++ )
    {
      p = yi << 2;
      pixels[p+3] = pa = (a_sum * mul_sum) >> shg_sum;
      if ( pa > 0 )
      {
        pa = 255 / pa;
        pixels[p]   = ((r_sum * mul_sum) >> shg_sum ) * pa;
        pixels[p+1] = ((g_sum * mul_sum) >> shg_sum ) * pa;
        pixels[p+2] = ((b_sum * mul_sum) >> shg_sum ) * pa;
      } else {
        pixels[p] = pixels[p+1] = pixels[p+2] = 0;
      }
      
      r_sum -= r_out_sum;
      g_sum -= g_out_sum;
      b_sum -= b_out_sum;
      a_sum -= a_out_sum;
       
      r_out_sum -= stackIn.r;
      g_out_sum -= stackIn.g;
      b_out_sum -= stackIn.b;
      a_out_sum -= stackIn.a;
      
      p = ( x + (( ( p = y + radiusPlus1) < heightMinus1 ? p : heightMinus1 ) * width )) << 2;
      
      r_sum += ( r_in_sum += ( stackIn.r = pixels[p]));
      g_sum += ( g_in_sum += ( stackIn.g = pixels[p+1]));
      b_sum += ( b_in_sum += ( stackIn.b = pixels[p+2]));
      a_sum += ( a_in_sum += ( stackIn.a = pixels[p+3]));
       
      stackIn = stackIn.next;
      
      r_out_sum += ( pr = stackOut.r );
      g_out_sum += ( pg = stackOut.g );
      b_out_sum += ( pb = stackOut.b );
      a_out_sum += ( pa = stackOut.a );
      
      r_in_sum -= pr;
      g_in_sum -= pg;
      b_in_sum -= pb;
      a_in_sum -= pa;
      
      stackOut = stackOut.next;
      
      yi += width;
    }
  }
  
  context.putImageData( imageData, top_x, top_y );
  
}

function BlurStack()
{
  this.r = 0;
  this.g = 0;
  this.b = 0;
  this.a = 0;
  this.next = null;
}

$( document ).ready(function() {
  var BLUR_RADIUS = 40;
  var sourceImages = [];

  $('.src-image').each(function(){
    sourceImages.push($(this).attr('src'));
  });

  $('.avatar img').each(function(index){
    $(this).attr('src', sourceImages[index] );
  });

  var drawBlur = function(canvas, image) {
    var w = canvas.width;
    var h = canvas.height;
    var canvasContext = canvas.getContext('2d');
    canvasContext.drawImage(image, 0, 0, w, h);
    stackBlurCanvasRGBA(canvas, 0, 0, w, h, BLUR_RADIUS);
  }; 
    
  
  $('.card canvas').each(function(index){
    var canvas = $(this)[0];
    
    var image = new Image();
    image.src = sourceImages[index];
    
    image.onload = function() {
      drawBlur(canvas, image);
    }
  });
});



$(function(){
  $('.click_litige').click(function(){
    $('.affiche_litige').toggle();
    
    
  });
});


$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 5000
    })
});


(function ( $ ) {
    $.fn.feedback = function(success, fail) {
      self=$(this);
    self.find('.dropdown-menu-form').on('click', function(e){e.stopPropagation()})

    self.find('.screenshot').on('click', function(){
      self.find('.cam').removeClass('fa-camera fa-check').addClass('fa-refresh fa-spin');
      html2canvas($(document.body), {
        onrendered: function(canvas) {
          self.find('.screen-uri').val(canvas.toDataURL("image/png"));
          self.find('.cam').removeClass('fa-refresh fa-spin').addClass('fa-check');
        }
      });
    });

    self.find('.do-close').on('click', function(){
      self.find('.dropdown-toggle').dropdown('toggle');
      self.find('.reported, .failed').hide();
      self.find('.report').show();
      self.find('.cam').removeClass('fa-check').addClass('fa-camera');
        self.find('.screen-uri').val('');
        self.find('textarea').val('');
    });

    failed = function(){
      self.find('.loading').hide();
      self.find('.failed').show();
      if(fail) fail();
    }

    self.find('form').on('submit', function(){
      self.find('.report').hide();
      self.find('.loading').show();
      $.post( $(this).attr('action'), $(this).serialize(), null, 'json').done(function(res){
        if(res.result == 'success'){
          self.find('.loading').hide();
          self.find('.reported').show();
          if(success) success();
        } else failed();
      }).fail(function(){
        failed();
      });
      return false;
    });
  };
}( jQuery ));

$(document).ready(function () {
  $('.feedback').feedback();
});