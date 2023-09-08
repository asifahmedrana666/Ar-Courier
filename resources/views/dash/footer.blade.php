
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            {{-- <div class="text-muted">Copyright &copy; Your Website 2022</div> --}}
            <div>
                {{-- <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a> --}}
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('dash/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('dash/assets/demo/chart-area-demo') }}"></script>

        @php
              $day = Carbon\Carbon::now();
              $to = Carbon\Carbon::today();
              $ys = Carbon\Carbon::yesterday();
              $Day1 = App\Models\order::where('created_at',$day->subDays(3)->toDateString())->count();
              $Day2 = App\Models\order::where('created_at',$day->subDays(2)->toDateString())->count();
              $Day3 = App\Models\order::where('created_at',$day->subDays(1)->toDateString())->count();
              $Day4 = App\Models\order::where('created_at',$day->subDays(0)->toDateString())->count();
              $Day5 = App\Models\order::where('created_at',$day->subDays(-1)->toDateString())->count();
              $Yesterday = App\Models\order::where('created_at',$ys->subDays(-2)->toDateString())->count();
              $Today = App\Models\order::where('created_at',$to->toDateString())->count();
        @endphp
        <script >
            // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Yesterday", "Today",],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [{{$Yesterday}}, {{$Today}}],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

        </script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('dash/js/datatables-simple-demo.js') }}"></script>
</body>
</html>