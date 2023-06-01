<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table class="table table-bordered">
      <tbody>
      <tr>
        <td rowspan="2" class="text-center text-uppercase">&aacute;reas</td>
        <td class="text-center text-uppercase">promedio</td>
        <td class="text-center text-uppercase">porcentaje</td>
        <td class="text-center text-uppercase">ponderacion</td>
        <td class="text-center text-uppercase">promedio ponderado</td>
      </tr>
      <tr>
        <td class="text-center">Xa</td>
        <td class="text-center">Pa</td>
        <td class="text-center">Wa</td>
        <td class="text-center">PPa = Pa Wa / 10</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">1. normas jur&iacute;dicas e institucionales</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">2. misi&oacute;n y objetivos</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">3. curriculo</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">4. administraci&oacute;n y gesti&oacute;n acad&eacute;mica</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">5. docentes</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">6. estudiantes</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">7. investigaci&oacute;n e interacci&oacute;n social</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">8. recursos educativos</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">9. administraci&oacute;n financiera</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td scope="row" class="text-capitalize">10. infraestructura</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="invisible">&nbsp;</td>
        <td class="text-uppercase text-center">total</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </tbody>
    </table>
    
    <table class="table table-bordered">
      <tbody>
      <tr>
        <td class="text-uppercase text-center">valor global</td>
        <td class="text-uppercase text-center">valoraci&oacute;n cualitativa</td>
      </tr>
      <tr>
        <td class="text-center">0 a 55</td>
        <td>funcionamiento en condiciones inaceptables</td>
      </tr>
      <tr>
        <td class="text-center">55.1 a 60</td>
        <td>funcionamiento en condiciones de m&iacute;nimo aceptable</td>
      </tr>
      <tr>
        <td class="text-center">60.1 a 70</td>
        <td>funcionamiento en condiciones regulares</td>
      </tr>
      <tr>
        <td class="text-center">70.1 a 80</td>
        <td>funcionamiento en condiciones buenas</td>
      </tr>
      <tr>
        <td class="text-center">80.1 a 90</td>
        <td>funcionamiento en condiciones &oacute;ptimas</td>
      </tr>
      <tr>
        <td class="text-center">90.1 a 100</td>
        <td>funcionamiento en condiciones excepcionales de calidad y excelencia</td>
      </tr>
      </tbody>
    </table>
    
    <div class="row">
      <div class="col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <canvas id="radar">
              <p class="text-muted text-capitalize">grafica no disponible</p>
            </canvas>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <canvas id="bar">
              <p class="text-muted text-capitalize">grafica no disponible</p>
            </canvas>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
      <script>
          new Chart(document.getElementById("radar"), {
              type: 'radar',
              data: {
                  labels: [1,2,3,4,5,6,7,8,9,10],
                  datasets: [
                      {
                          label: "areas",
                          fill: true,
                          backgroundColor: "rgba(54, 162, 235, 0.2)",
                          borderColor: "rgba(54, 162, 235, 1)",
                          pointBorderColor: "#fff",
                          pointBackgroundColor: "rgba(179,181,198,1)",
                          data: [3.50,3.20,3.45,3.74,3.41,3.21,2.64,3.0,3.0,4.10]
                      }
                  ]
              },
              options: {
                  scale: {
                      ticks: {
                          beginAtZero: true,
                          min: 0,
                          max: 5,
                          stepSize: 1
                      },
                      pointLabels: {
                          fontSize: 18
                      }
                  },
                  title: {
                      display: false,
                      text: 'roseta de promedios por area'
                  },
                  legend: { display: false }
              }
          });
      </script>
      <script>
          // Bar chart
          new Chart(document.getElementById("bar"), {
              type: 'bar',
              data: {
                  labels: [1,2,3,4,5,6,7,8,9,10],
                  datasets: [
                      {
                          label: 'promedio ponderado alcanzado',
                          borderColor: "#555",
                          data: [3,5,10,8,15,3,3,5,1,5],
                          type: 'line',
                          fill: false,
                      },
                      {
                          label: "promedio ponderado ideal",
                          backgroundColor: "rgba(54, 162, 235, 0.2)",
                          borderColor: "rgba(54, 162, 235, 1)",
                          borderWidth: 1,
                          data: [5,5,10,15,10,25,5,10,10,5,10],
                      },
                  ]
              },
              options: {
                  legend: {
                      display: true,
                  },
                  title: {
                      display: false,
                      text: 'promedio ponderado por area'
                  },
                  scales: {
                      yAxes: [{
                          scaleLabel: {
                              display: true,
                              labelString: 'PROMEDIO PONDERADO'
                          },
                          ticks: {
                              beginAtZero: true
                          }
                      }],
                      xAxes: [{
                          scaleLabel: {
                              display: true,
                              labelString: 'AREAS'
                          }
                      }]
                  }
              }
          });
      </script>
    
    {{--https://tabletag.net--}}
    {{--https://stackoverflow.com/questions/39634156/create-complex-table-in-html--}}
    
    {{--<script src="{{ asset("vendor/bower_components/jquery/dist/jquery.min.js") }}"></script>--}}
    {{--<script src="{{ asset("vendor/bower_components/bootstrap/js/tooltip.js") }}"></script>--}}
    {{--<script src="{{ asset("vendor/bower_components/bootstrap/js/popover.js") }}"></script>--}}
    {{--<script src="{{ asset("vendor/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>--}}
    </body>
</html>