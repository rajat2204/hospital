$('.yesPrint').hide();
function printDiv(valPrint,table) {
    console.log(valPrint,table)
    $('.noPrint').hide();
    $('.yesPrint').show();
    var divToPrint = document.getElementById(table);

    var htmlToPrint = '' +
       '<style type="text/css">table{width:100%;align:center}' +
        'table th, table td {' +
        'border:1px solid #c9c9c9;' +
        'padding:0.5em;' +
        'text-align:left;' +
        'font-size:11px;' +
        '}' +
        'h1, h2, h3, h4 {' +
        'text-align:center;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write('<h2> NewRise Technosys Pvt. Ltd.<br><h3>446, Pacific Business Center, Above D-Mart Shopping Center,<br> Hoshangabad Rd, Bhopal, Madhya Pradesh 462026, India<br>Phone - +91 9752655455, 0755-4285455<h3></h2>');
    newWin.document.write('<h2>'+valPrint+'</h2>');
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
    $('.noPrint').show();
    $('.yesPrint').hide();
}

function printPopup(valPrint,table) {
    $('.noPrint').hide();
    $('.yesPrint').show();
     console.log(valPrint,table)
    var divToPrint = document.getElementById(table);
   console.log(divToPrint);
    var htmlToPrint = '' +
        '<style type="text/css">table{width:100%;align:center}' +
        'table th, table td {' +
        'border:1px solid #c9c9c9;' +
        'padding:0.5em;' +
        'text-align:left;' +
        'font-size:11px;' +
        '}' +
        'h1, h2, h3, h4 {' +
        'text-align:center;' +
        '}' +
        '.text-center {' +
        'text-align:center;' +
        'vertical-align: bottom!important;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write('<h2>NewRise Technosys Pvt. Ltd.<br><h3>446, Pacific Business Center, Above D-Mart Shopping Center,<br> Hoshangabad Rd, Bhopal, Madhya Pradesh 462026, India<br>Phone - +91 9752655455, 0755-4285455<h3></h2></h2>');
    newWin.document.write('<h2>'+valPrint+'</h2>');
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
    $('.noPrint').show();
    $('.yesPrint').hide();
}