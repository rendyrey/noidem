
                <thead>
                  <tr>
                    <th>No Applicant</th>
                    <th>Nama</th>
                    <th>Tingkat Pendidikan</th>
                    <th>Institusi</th>
                    <th>Adv. Media</th>
                    <th>Status</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pelamar as $value)
                    <tr>
                      <?php
                      $lbl = "";
                      if($value->status_pelamar == "Passed") {
                        $lbl = "label-success";
                      } elseif ($value->status_pelamar == "Awaiting") {
                        $lbl = "label-warning";
                      } else {
                        $lbl = "label-danger";
                      }
                      ?>
                      <td>{{$value->no_applicant}}</td>
                      <td>{{$value->nama}}</td>
                      <td>{{$value->tingkat_pendidikan->tingkat}}</td>
                      <td>{{$value->institusi->nama_institusi}}</td>
                      <td>{{$value->iklan->advertising_media->media}}</td>
                      <td><span class="label label-sm {{$lbl}} arrowed arrowed-righ">{{$value->status_pelamar}}</span></td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-xs btn-success" onclick="window.location.href='pelamar/{{$value->id}}/detail'" title="Detail Pelamar">
                            <i class="fa fa-search bigger-120"></i>
                          </button>

                          <a href="{{url("pelamar/$value->id/edit")}}">
                            <button class="btn btn-xs btn-info btn_edit_pelamar" title="Edit Status Pelamar">
                              <i class="fa fa-pencil bigger-120"></i>
                            </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
      