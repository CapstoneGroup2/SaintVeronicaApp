var url = "{{url('stock/chart')}}";
var Years = new Array();
var Labels = new Array();
var Prices = new Array();

$(document).ready(function(){
  $.get(url, function(response){
    response.forEach(function(data){
        Years.push(data.stockYear);
        Labels.push(data.stockName);
        Prices.push(data.stockPrice);
    });
    var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels:Years,
              datasets: [{
                  label: 'Infosys Price',
                  data: Prices,
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
  });

  $('#dataTable-enrollees tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    $(this).css('font-size', '')
  } );

  // DataTable for Enrollees
  var table = $('#dataTable-enrollees').DataTable({
      initComplete: function () {
          // Apply the search
          this.api().columns().every( function () {
              var that = this;

              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                  if ( that.search() !== this.value ) {
                      that
                          .search( this.value )
                          .draw();
                  }
              } );
          } );
      }
  });
  // DataTable for Payments
  var table = $('#dataTable-payments').DataTable({
      initComplete: function () {
          // Apply the search
          this.api().columns().every( function () {
              var that = this;

              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                  if ( that.search() !== this.value ) {
                      that
                          .search( this.value )
                          .draw();
                  }
              } );
          } );
      }
  });
});