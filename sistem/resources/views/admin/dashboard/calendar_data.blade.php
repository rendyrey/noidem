<div class="row">
  <div class="col-md-6">
    <center><h4>Psychotest</h4></center>
    <table class="table">
      <thead>
        <tr>
          <th>City</th>
          <th>Applicant</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($psychotest as $value)
          <tr>
            <td>{{$value->kota->kota}}</td>
            <td>{{$value->pelamar->count()}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <center><h4>Inproses</h4></center>
    <table class="table">
      <thead>
        <tr>
          <th>Process</th>
          <th>Applicant</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Test Scheduling</td>
          <td></td>
        </tr>
        <tr>
          <td>Psychotest</td>
          <td></td>
        </tr>
        <tr>
          <td>Interview</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
