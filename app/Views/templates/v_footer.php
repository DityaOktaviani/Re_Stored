<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

<script src="assets/js/main.js"></script>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js" integrity="sha256-ovnFmAOngtHmlhZzPyGrofexz4Kdik4kEobc8B9r1Yk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js" integrity="sha256-ovnFmAOngtHmlhZzPyGrofexz4Kdik4kEobc8B9r1Yk=" crossorigin="anonymous"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Jurnal', 'Skripsi', 'KTI'],
            datasets: [{
                label: '# of Votes',
                data: [123, 321, 100],
                backgroundColor: [
                    'rgba(46, 204, 113, 1.0)',
                    'rgba(52, 152, 219,1.0)',
                    'rgba(230, 126, 34,1.0)'
                ],
                maxBarThickness: 30,

                borderColor: [
                    'rgba(46, 204, 113, 1.0)',
                    'rgba(52, 152, 219,1.0)',
                    'rgba(230, 126, 34,1.0)'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>

</body>

</html>