<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js" type="text/javascript"></script>
<script>
    anychart.onDocumentLoad(function () {
        // create an instance of a pie chart
        var chart = anychart.pie();
        // set the data
        chart.data([
                @yield('chartData')
        ]);
        // set chart title
        chart.title("Atendimentos");
        // set the container element
        chart.container("chart");
        // initiate chart display
        chart.draw();
    });
</script>