<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
</head>
<body>
<canvas id="myChart" width="500" height="100"></canvas>

<script type="text/javascript">

var paramCuit = [];
var paramTotal = [];
    $.post("cchartjs/getGrafico",
                            
 function(data){

                 var pe = JSON.parse(data);
                 $.each(pe, function(i, item){
                         
            
                            paramCuit.push(item.proveedor);
                            paramTotal.push(item.total);                    
                
                
                
                 });


                
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: paramCuit,
        datasets: [{
            label: 'Total de compras',
            backgroundColor: 'rgb(255, 99, 132, 0.5)',
            borderColor: 'rgb(255, 99, 132)',
            data: paramTotal
        }]
    },

data: {
        labels: paramCuit,
        datasets: [{
            label: 'Total de compras',
            backgroundColor: 'rgb(255, 99, 132, 0.5)',
            borderColor: 'rgb(255, 99, 132)',
            data: paramTotal
        }]
    },
    // Configuration options go here
    options: {}
});

});
</script>
</body>
</html>