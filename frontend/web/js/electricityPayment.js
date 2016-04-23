/**
 * Created by Nikita on 18.04.2016.
 */

//document.getElementById('electricityinvoice-dec_counter_current').addEventListener("change", function(){
//    var previous = document.getElementById('electricityinvoice-dec_counter_previous').value;
//    var current = document.getElementById('electricityinvoice-dec_counter_current').value;
//    var substraction = current - previous;
//    document.getElementById('electricityinvoice-dec_substraction').value = substraction;
//});

$(document).ready(function() {
    $('#electricityinvoice-dec_counter_current').change(function() {
        var previous = $('#electricityinvoice-dec_counter_previous').val();
        var current = $('#electricityinvoice-dec_counter_current').val();
        var substraction = 0;
        if((current.indexOf(',') == -1) && !isNaN(parseFloat(current)) && (current !== undefined) && (parseFloat(current) > parseFloat(previous) ))  {
            substraction = current - previous;
            $('#electricityinvoice-dec_substraction').val(substraction);
            var payment1 = calculateBlock1(substraction);
            var payment2 = calculateBlock2(substraction);
            var payment3 = calculateBlock3(substraction);
            var sum = calculateSum(payment1, payment2, payment3);
            var total = calculateTotal(sum);
            $('#electricityinvoice-dec_total').val(total);
        }
    });

    function calculateBlock1(amountAll){
        var rateBlock1 =  parseFloat($('#electricity-rates-block1').text());
        var rateBlock1Limit =  parseFloat($('#electricity-rates-block1-limit').text());
        var count, amountPaid;

        count = (rateBlock1Limit - amountAll < 0) ? (amountPaid = rateBlock1Limit) * rateBlock1 : (amountPaid = amountAll) * rateBlock1;
        $('#electricityinvoice-dec_amount_block1').val(amountPaid);
        $('#electricityinvoice-dec_payment_block1').val(round(count, 2));

        return count;
    }

    function calculateBlock2(amountAll){
        var rateBlock2 =  parseFloat($('#electricity-rates-block2').text());
        var rateBlock1Limit =  parseFloat($('#electricity-rates-block1-limit').text());
        var rateBlock2Limit =  parseFloat($('#electricity-rates-block2-limit').text());
        var count = 0;
        var amountPaid = 0;
        if(amountAll > rateBlock1Limit){
            count = (rateBlock2Limit - amountAll < 0) ? (amountPaid = (rateBlock2Limit - rateBlock1Limit)) * rateBlock2 : (amountPaid = (amountAll - rateBlock1Limit)) * rateBlock2;
            $('#electricityinvoice-dec_amount_block2').val(amountPaid);
            $('#electricityinvoice-dec_payment_block2').val(round(count, 2));
        } else {
            $('#electricityinvoice-dec_amount_block2').val(0);
            $('#electricityinvoice-dec_payment_block2').val(0);
        }
        return count;
    }

    function calculateBlock3(amountAll) {
        var rateBlock3 =  parseFloat($('#electricity-rates-block3').text());
        var rateBlock2Limit =  parseFloat($('#electricity-rates-block2-limit').text());
        //var amountBlock3 = parseFloat($('#electricityinvoice-dec_amount_block3').val());
        var count = 0;
        var amountPaid = 0;
        if(amountAll > rateBlock2Limit) {
            count = round((amountPaid = amountAll - rateBlock2Limit) * rateBlock3, 2);
            $('#electricityinvoice-dec_amount_block3').val(amountPaid);
            $('#electricityinvoice-dec_payment_block3').val(count);
        } else {
            $('#electricityinvoice-dec_amount_block3').val(0);
            $('#electricityinvoice-dec_payment_block3').val(0);
        }
        return count;
    }

    function calculateSum(block1Payment, block2Payment, block3Payment) {
        var sum = block1Payment + block2Payment + block3Payment;
        $('#electricityinvoice-dec_sum').val(round(sum, 2));
        return sum;
    }

    function calculateTotal(sum) {
        var perk = $('#electricityinvoice-dec_electricity_perk').val();
        if(perk > 0) {
            return round(sum - (sum * perk) / 100, 2);
        } else {
            return sum;
        }
    }


    function round(value, ndec){
        var n = 10;
        for(var i = 1; i < ndec; i++){
            n *=10;
        }

        if(!ndec || ndec <= 0)
            return Math.round(value);
        else
            return Math.round(value * n) / n;
    }

    //$('#electricity-select-type-chart').change(function(){
    //    $('#electricity-choose-type-form').submit();
    //});


});




