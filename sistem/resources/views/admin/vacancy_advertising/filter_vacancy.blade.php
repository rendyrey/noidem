@foreach($iklan as $value)
  <tr>
    <td class="center">
      <div class="action-buttons" id="show_details_id">
        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
          <i class="ace-icon fa fa-angle-double-down"></i>
          <span class="sr-only">Details</span>
        </a>
      </div>
    </td>
    <td>{{$value->advertising_category->kategori}}</td>
    <td>{{$value->advertising_media->media}}</td>
    <td>{{$value->plan_start_date}}</td>
    <td>{{$value->plan_end_date}}</td>
    <td>{{$value->actual_start_date}}</td>
    <td>{{$value->actual_end_date}}</td>
    <td>{{$value->event_code}}</td>
    <td>
      <a href="http://{{$value->domain}}" target="_blank">{{$value->domain}}</a>
    </td>
    <td>
      @if ($value->actual_start_date=='0000-00-00')
        <button class="btn btn-xs btn-danger filter" value="Belum Selesai">Tidak Aktif</button>
      @else
        <button class="btn btn-xs btn-success filter" value="Sudah Selesai">Aktif</button>
      @endif
    </td>
    <td>
      <a class="green" href="vacancy_advertising/{{$value->id}}/edit_iklan">
        <i class="ace-icon fa fa-pencil bigger-130"></i>
      </a>
    </td>
  </tr>
  <tr class="detail-row">
    <td colspan="10">
      <div class="table-detail">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="space visible-xs"></div>
            <table class="table table-sm table-striped table-bordered">
              <?php $lokers = App\Loker::where('id_iklan', $value->id)->get(); ?>

              <tr>
                <!-- <th>Iklan</th> -->
                <th>Budget</th>
                <th>Cost</th>
                <th>Edu Level</th>
                <th>Major Grup</th>
                <th>Major</th>
                <th>No RCR</th>
                <th>Posisi</th>
                <th>Posisi Publish</th>
                <th>Target Fresh</th>
                <th>Target Exp</th>
                <th>Actual Fresh</th>
                <th>Actual Exp</th>
                <th>Target pg Fresh</th>
                <th>Target pg Exp</th>
                <th>Actual pg Fresh</th>
                <th>Actual pg Exp</th>
                <th>awaiting Fresh</th>
                <th>awaiting Exp</th>
                <th>Target pass Fresh</th>
                <th>Target pass Exp</th>
                <th>Actual pass Fresh</th>
                <th>Actual pass Exp</th>
                <th>Index Fresh</th>
                <th>Index Exp</th>
                <th>Aksi</th>

              </tr>
              @foreach($lokers as $values)
                <tr>
                  <!-- <td>{{$values->id_iklan}}</td> -->
                  <td>{{$values->budget}}</td>
                  <td>{{$values->cost}}</td>
                  <td>{{$values->tingkat_pendidikan->tingkat}}</td>
                  <td>{{$values->major_grup->nama_grup}}</td>
                  <td>{{$values->major->major}}</td>
                  <td>{{$values->no_rcr}}</td>
                  <td>{{$values->position_name}}</td>
                  <td>{{$values->position_publish}}</td>
                  <td>{{$values->target_fresh}}</td>
                  <td>{{$values->target_exp}}</td>
                  <td>{{$values->actual_fresh}}</td>
                  <td>{{$values->actual_exp}}</td>
                  <td>{{$values->target_pg_fresh}}</td>
                  <td>{{$values->target_pg_exp}}</td>
                  <td>{{$values->actual_pg_fresh}}</td>
                  <td>{{$values->actual_pg_exp}}</td>
                  <td>{{$values->awaiting_fresh}}</td>
                  <td>{{$values->awaiting_exp}}</td>
                  <td>{{$values->target_pass_fresh}}</td>
                  <td>{{$values->target_pass_exp}}</td>
                  <td>{{$values->actual_pass_fresh}}</td>
                  <td>{{$values->actual_pass_exp}}</td>
                  <td>{{$values->index_adv_media_effect_fresh}}</td>
                  <td>{{$values->index_adv_media_effect_exp}}</td>
                  <td>
                    <a class="green" href="vacancy_advertising/{{$values->id}}/edit_loker">
                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </table>
            <style type="text/css">
            #form {
              {
                $value->id
              }
            }

            {
              display: none;
            }

            button {
              margin-bottom: 10px;
            }
            </style>
            <button id="signup{{$value->id}}" class="btn btn-primary btn-sm">
              <i class="fa fa-plus"></i> Detail</button>
              <div class="space-10"></div>
              <div id="signup{{$value->id}}">
                <form action="tambah/{{$value->id}}/loker" method="POST" id="form{{$value->id}}">
                  <div class="col-xs-12">
                    {!! csrf_field() !!}
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label>No RCR</label>
                        <input name="id_iklan_{{$value->id}}" type="hidden" class="form-control">
                        <input name="no_rcr_{{$value->id}}" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Budget</label>
                        <input name="budget_{{$value->id}}" type="text" class="form-control auto_currency">
                      </div>
                      <div class="form-group">
                        <label>Cost</label>
                        <input name="cost_{{$value->id}}" type="text" class="form-control auto_currency">
                      </div>
                      <div class="form-group">
                        <label>Tingkat Pendidikan</label>
                        <select name='id_tingkat_pendidikan_{{$value->id}}' class='form-control'>
                          @foreach($tingkat_pendidikan as $key1 => $value1)
                            <option value="{{$key1}}">{{$value1}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Major Grup</label>
                        <select name='id_major_grup_{{$value->id}}' class='form-control' id="major_grup_{{$value->id}}">
                          @foreach($major_grup as $key1 => $value1)
                            <option value="{{$key1}}" name="{{$key1}}">{{$value1}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Major</label>
                        <select name='id_major_{{$value->id}}' class='form-control' id="major_{{$value->id}}">
                          @foreach($major as $value1)
                            <option value="{{$value1->id}}" name="{{$value1->id_grup}}">{{$value1->major}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label>Posisi</label>
                        <input name="posisi_{{$value->id}}" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Posisi Publish</label>
                        <input name="posisi_publish_{{$value->id}}" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Target Fresh</label>
                        <input name="target_fresh_{{$value->id}}" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Target Exp</label>
                        <input name="target_exp_{{$value->id}}" type="text" class="form-control">
                      </div>
                      {{--
                      <div class="form-group">
                      <label>Actual Fresh</label>
                      <input name="actual_fresh_{{$value->id}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Actual Exp</label>
                    <input name="actual_exp_{{$value->id}}" type="text" class="form-control">
                  </div> --}}
                  <div class="form-group">
                    <label>Target Pg Fresh</label>
                    <input name="target_pg_fresh_{{$value->id}}" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Target Pg Exp</label>
                    <input name="target_pg_exp_{{$value->id}}" type="text" class="form-control">
                  </div>
                </div>

                <div class="col-xs-3">

                  {{--
                  <div class="form-group">
                  <label>Actual Pg Fresh</label>
                  <input name="actual_pg_fresh_{{$value->id}}" type="text" class="form-control">
                </div>
                <div class="form-group">
                <label>Actual Pg Exp</label>
                <input name="actual_pg_exp_{{$value->id}}" type="text" class="form-control">
              </div> --}}
              <div class="form-group">
                <label>Awaiting Fresh</label>
                <input name="awaiting_fresh_{{$value->id}}" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Awaiting Exp</label>
                <input name="awaiting_exp_{{$value->id}}" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Target Pass Fresh</label>
                <input name="target_pass_fresh_{{$value->id}}" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Target Pass Exp</label>
                <input name="target_pass_exp_{{$value->id}}" type="text" class="form-control">
              </div>
              {{--
              <div class="form-group">
              <label>Actual Pass Fresh</label>
              <input name="actual_pass_fresh_{{$value->id}}" type="text" class="form-control">
            </div>
            <div class="form-group">
            <label>Actual Pass Exp</label>
            <input name="actual_pass_exp_{{$value->id}}" type="text" class="form-control">
          </div> --}}
          <div class="form-group">
            <label>Index Adv Media Effect Fresh</label>
            <input name="index_adv_media_effect_fresh_{{$value->id}}" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Index Adv Media Effect Exp</label>
            <input name="index_adv_media_effect_exp_{{$value->id}}" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Kriteria Syarat</label>
            <select name="kriteria_syarat" class='form-control'>
              @foreach($kriteria_syarat_opt as $value)
                <option value="{{$value->id}}">{{$value->keterangan}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-check"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</td>
</tr>
@endforeach

<script>
/***************/
$('.show-details-btn').on('click', function(e) {
  e.preventDefault();
  $(this).closest('tr').next().toggleClass('open');
  $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
});
$('.auto_currency').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;
  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    ;
  });
});

/***************/
</script>
