  $(document).ready(function(){
  $('.fancybox-media').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    helpers : {
      media : {}
    }
  });

  $(".gnss-booking").fancybox({
    minHeight  : '345px',
    maxHeight  : '90%',
    fitToView : false, 
    width   : '315px',
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });


  $("a[href='/booking/#fb']").fancybox({
    minHeight  : '345px',
    maxHeight  : '90%',
    fitToView : false, 
    width   : '315px',
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });

// hmm...


$('.zForm').submit(function() {
  if (!$('.zAgree:checked').length) {
    alert('Необходимо Ваше согласие на публкацию и обработку Ваших данных.');
    console.log('_');
    return false;
  }  
});
  if ($('.scrollable').length > 0) {
    $('.scrollable').scrollable({ circular:true })
                    .navigator()
                    .autoscroll({ interval:5000 });
  }
  if ($('.tabs').length > 0) {
    $('.tabs').tabs('.panes > div');
  }
  // if ($('.photo, .video').length > 0) {
  //  $('.photo > a, .video > a').fancybox();
  // }
  if ($('.fancy-popup').length > 0) {
    $('.fancy-popup').fancybox({
      // autoSize: false,
      // width: 345,
      // heart: "auto"
    }); 
  }
  if ($('.datepicker').length > 0) {
            $.datepicker.regional['ru'] = {
                    closeText: 'Закрыть',
                    prevText: '&#x3c;Пред',
                    nextText: 'След&#x3e;',
                    currentText: 'Сегодня',
                    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                    'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                    'Июл','Авг','Сен','Окт','Ноя','Дек'],
                    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                    weekHeader: 'Не',
                    dateFormat: 'dd.mm.yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''};
            $.datepicker.setDefaults($.datepicker.regional['ru']);
    $('.datepicker').multiDatesPicker({dateFormat: 'yymmdd', altField: '#date', altFormat: 'yymmdd', maxPicks: 2, monthNames: $.datepicker.regional[ "ru" ].monthNamesShort,  onSelect: function() {               
  var dts = $('.datepicker').multiDatesPicker('getDates');
  if (dts.length == 1) {
    $('.mdtip').text('Отметьте конечную дату периода');
  } else if (dts.length == 2) {
    $('.mdtip').text('');
  } else {
    $('.mdtip').text('Отметьте начальную дату периода');
    
  }
 }
  });
  }

$('.ui-datepicker-calendar td a').live('click', function () {
  var dts = $('.datepicker').multiDatesPicker('getDates');
  console.log(dts+'_0');  
});


// $('a').live('click', function () {
//   var dts = $('.datepicker').multiDatesPicker('getDates');
//   console.log(dts+'_7');  
// });

// $('body').live('click', function () {
//   var dts = $('.datepicker').multiDatesPicker('getDates');
//   console.log(dts+'_8');  
// });

// $('html').click( function () {
//   var dts = $('.datepicker').multiDatesPicker('getDates');
//   console.log(dts+'_8');  
// });

  $('#spec-filter').change(function(){
    var spec = $(this).val();
if (parseInt(spec)>0) {
    $('.doctor').hide();
    $('.doctor[data-spec='+spec+']').show();
} else {
$('.doctor').show();
}
  });
})

function nextSlide(num) {
  $('.fancybox-opened').fadeOut("fast",function(){
    $('.slide').hide();
    $('.slide'+num).show();
    $.fancybox.update();
  })
}
