@extends('layout.index')
@section('content')
<div class="row">
<div class="col-xs-12">
<div id="user-profile-1" class="user-profile row">
    <div class="col-xs-12 col-sm-12 center">
    <div class="space-16"></div>
        
        <div>
            <span class="profile-picture">
            <ul class="ace-thumbnails clearfix">
        		<li>            
	            @foreach($pelamar as $value)
	                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="../../photos/{{$value->photo}}" />	
	                <?php
	                $tags = "";
	                if ($value->status_pelamar == "Passed") {

	                	$tags = "success";

	                } elseif ($value->status_pelamar == "Awaiting") {

	                	$tags = "warning";

	                } else {

	                	$tags = "danger";
	                }
	                ?>	                           
	            	<div class="tags">
						<span class="label-holder">
							<span class="label label-{{$tags}} arrowed-in">{{$value->status_pelamar}}</span>
						</span>
					</div>					
				</li>
			</ul>
            </span>

            <div class="space-4"></div>

            <div class="width-30 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <span class="white">{{ $value->nama }}</span>
                </div>
            </div>
            @endforeach
        </div>

        
        
    </div>
</div>

<div class="col-xs-12 col-sm-6">
        <div class="space-20"></div>

        <div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-user orange"></i>
					Personal Data
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Nama </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->nama}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Jenis Kelamin </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->jenis_kelamin}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Status </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->status}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Tanggal Lahir </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<?php $tgl_lahir = date('d M Y', strtotime($value->tgl_lahir));?>
						<span class="editable">{{$tgl_lahir}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> E-mail </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->email}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Mobile Phone </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->mobile_phone}}</span>
						@endforeach
					</div>
				</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->

		<div class="space-10"></div>

		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-lightbulb-o orange"></i>
					Educational Background
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Tingkat Pendidikan </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->tingkat_pendidikan->tingkat}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Institusi </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->institusi->nama_institusi}}</span>
						@endforeach
					</div>
				</div>
				
				<div class="profile-info-row">
					<div class="profile-info-name"> Other Institusi </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->other_institusi}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Major </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->major->major}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Other Major </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->other_major}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> GPA </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->gpa}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Start_Year_Education </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->start_year_education}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> End Year Education </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->end_year_education}}</span>
						@endforeach
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->

	<!-- Detail Education -->
	<div class="widget-body" {{$ket}}>
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Tingkat_Pendidikan Lain</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->tingkat_pendidikan1->tingkat}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Institusi</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->institusi1->nama_institusi}}</span>
						@endforeach
					</div>
				</div>
				
				<div class="profile-info-row">
					<div class="profile-info-name"> Other Institusi</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->other_institusi_1}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Major</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->major1->major}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Other Major</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->other_major1}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> GPA</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->gpa_1}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Start Year</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->start_year_1}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> End Year</div>

					<div class="profile-info-value">
						@foreach($detail_edu as $value)
						<span class="editable">{{$value->end_year_1}}</span>
						@endforeach
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->
</div><!-- /.widget-box -->

		<div class="space-10"></div>

		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-bookmark orange"></i>
					Work Experience
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body" {{$we1}}>
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$id_bidang_usaha_1}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Other Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$other_bidang_usaha_1}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Start_Year_Work_Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$start_year_1}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> End Year Work Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$end_year_1}}</span>
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->

	<!-- More Work Experience -->
	<div class="widget-body" {{$we2}}>
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$id_bidang_usaha_2}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Other Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$other_bidang_usaha_2}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Start_Year_Work_Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$start_year_2}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> End Year Work Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$end_year_2}}</span>
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->

	<!-- More Work Experience -->
	<div class="widget-body" {{$we3}}>
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$id_bidang_usaha_3}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Other Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$other_bidang_usaha_3}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Start_Year_Work_Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$start_year_3}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> End Year Work Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$end_year_3}}</span>
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->

	<!-- More Work Experience -->
	<div class="widget-body" {{$we4}}>
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$id_bidang_usaha_4}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Other Bidang Usaha </div>

					<div class="profile-info-value">
						<span class="editable">{{$other_bidang_usaha_4}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Start_Year_Work_Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$start_year_4}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> End Year Work Experience </div>

					<div class="profile-info-value">
						<span class="editable">{{$end_year_4}}</span>
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->
</div><!-- /.widget-box -->

        <div class="space-20"></div>
    </div>

<div class="col-xs-12 col-sm-6">
        <div class="space-20"></div>

        <div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-book orange"></i>
					General Data
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
							<div class="profile-info-name"> No Applicant </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->no_applicant}}</span>
							@endforeach
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Job Interest 1 </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->job_interest_1}} ({{$loker1}})</span>
							@endforeach
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Job Interest 2 </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->job_interest_2}} ({{$loker2}})</span>
							@endforeach
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Job Interest 3 </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->job_interest_3}} ({{$loker3}})</span>
							@endforeach
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Job Interest 4 </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->job_interest_4}} ({{$loker4}})</span>
							@endforeach
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Info Vacancy </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->iklan->advertising_media->media}}</span>
							@endforeach
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Medion_Employee_Name </div>

							<div class="profile-info-value">
							@foreach($pelamar as $value)
								<span class="editable">{{$value->medion_employee_name}}</span>
							@endforeach
							</div>
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->

		<div class="space-10"></div>

		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-check-square-o orange"></i>
					Psychotest Readiness
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
						<div class="profile-info-row">
					<div class="profile-info-name"> Tanggal_Psychotest </div>

					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<?php $tanggal = date('d M Y', strtotime($value->tanggal_psychotest->tanggal));?>
						<span class="editable">{{$tanggal}} ( {{$value->tanggal_psychotest->kota->kota}} )</span>
						@endforeach
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->
</div><!-- /.widget-box -->

		<div class="space-10"></div>

		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-exclamation-circle orange"></i>
					Confirmation
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
				<div class="space-10"></div>
					<div class="profile-user-info profile-user-info-striped">
			
				<div class="profile-info-row">
					<div class="profile-info-name"> Pernah PKL Di Medion </div>
					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->pernah_pkl_dimedion}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Tanggal Mulai PKL </div>
					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->tgl_praktek_start}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Tanggal Selesai PKL </div>
					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->tgl_praktek_end}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Pernah Psychotest Di Medion  </div>
					<div class="profile-info-value">
						@foreach($pelamar as $value)
						<span class="editable">{{$value->pernah_psychotest_dimedion}}</span>
						@endforeach
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Tanggal_Psychotest_Di_Medion  </div>
					<div class="profile-info-value">
						@foreach($pelamar as $value)
						@if($value->tgl_psychotest_dimedion == "")
						<span class="editable"></span>
						@else
						<?php $tgl_psychotest_dimedion = date('d M Y', strtotime($value->tgl_psychotest_dimedion)) ?>
						<span class="editable">{{$tgl_psychotest_dimedion}}</span>
						@endif						
						@endforeach						
					</div>
				</div>
			</div>
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->
</div><!-- /.widget-box -->

        <div class="space-20"></div>
    </div>
</div>
</div>
</div>
</div>

@stop