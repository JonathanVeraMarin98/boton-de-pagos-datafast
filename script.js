// BUTTON SUBMISSION
$('form').submit(function (e) {
    e.preventDefault();
});


/* Donate Module - Amount Section - Impact Statement */
// Amount Radio Label Button Events
$('.amount label').on('click', function () {
     var dollarAmount = parseInt($(this).text().replace('$', ''), 10);
    var impactAmount = parseInt(dollarAmount / 10, 10);

    // copy to impact statement
    $('.impact-amount').text('$'+ dollarAmount);
    $('.impact-results').text('180 days back to ' + impactAmount + ' girls.');
    // Clear other amount donation, if any
    $('#amount_other').val('');
    // copy to donate button "Donate $50"
    $('button.donate').text('Donate $' + dollarAmount);
});

// Other Donation Amount Events
$('#amount_other').keyup(function () {
    var dollarAmount = $(this).val();
    var impactAmount = parseInt(dollarAmount / 10, 10);

    // copy to impact statement
    $('.impact-amount').text('$'+ dollarAmount);
    $('.impact-results').text('Pago de Curso ' + impactAmount + ' a Enfoque Gerencial.');
    
    $('.amount input[type=radio]').prop('checked', false);

    // copy to donate button "Donate $50"
    $('button.donate').text('Donate $' + dollarAmount);
});


/* Progress bar of the donate module */
$('.step').on('click', function () {
   
    $('.step').removeClass("active");
    $(this).addClass('active');
    if ($('.amount').hasClass('active')) {
        $('.step--active').css('left', '0%');
        $('.donation-module-content-amount').addClass('active').removeClass('next').removeClass('previous');
        if ($('.donation-module-content-name').hasClass('active')) {
            $('.donation-module-content-name').removeClass('active').addClass('previous');

        } else if ($('.donation-module-content-payment').hasClass('active')) {
            $('.donation-module-content-payment').removeClass('active').addClass('previous');
        }
    } else if ($('.name').hasClass('active')) {
        $('.step--active').css('left', '33.333%');
        $('.donation-module-content-name').addClass('active').removeClass('next').removeClass('previous');


        if ($('.donation-module-content-amount').hasClass('active')) {
            $('.donation-module-content-amount').removeClass('active').addClass('next');
        } else if ($('.donation-module-content-payment').hasClass('active')) {
            $('.donation-module-content-payment').removeClass('active').addClass('previous');
        }
    } else if ($('.payment').hasClass('active')) {
        $('.step--active').css('left', '66.666%');
        $('.donation-module-content-payment').addClass('active').removeClass('next').removeClass('previous');
        if ($('.donation-module-content-amount').hasClass('active')) {
            $('.donation-module-content-amount').removeClass('active').addClass('next');
        } else if ($('.donation-module-content-name').hasClass('active')) {
            $('.donation-module-content-name').removeClass('active').addClass('next');

        }
    }
});


$(".donation-module-content-amount button.next").on('click', function () {
    
    $('.step').removeClass("active");
    $('.name').addClass('active');
    $('.step--active').css('left', '33.333%');
    $('.donation-module-content-amount').addClass('next').removeClass('active');
    $('.donation-module-content-name').removeClass('previous').removeClass('next').addClass('active');
});

$(".donation-module-content-name button.next").on('click', function () {
    
    $('.step').removeClass("active");
    $('.payment').addClass('active');
    $('.step--active').css('left', '66.666%');
    $('.donation-module-content-name').addClass('next').removeClass('active');
    $('.donation-module-content-payment').removeClass('previous').removeClass('next').addClass('active');
});