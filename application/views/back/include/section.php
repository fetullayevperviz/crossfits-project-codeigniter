<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success">
                <div class="card-body">
                	<?php $qeydiyyat_count = qeydiyyat_count();?>
                    <h2 class="text-white"><?=$qeydiyyat_count;?> <i class="ti-user float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Qeydiyyat Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-info">
                <div class="card-body">
                	<?php $message_count = message_count();?>
                    <h2 class="text-white"><?=$message_count;?> <i class="ti-email float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Oxunmamış Mesaj Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $slider_count = slider_count();?>
                    <h2 class="text-white"><?=$slider_count;?> <i class="ti-video-camera float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Slider Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning">
                <div class="card-body">
                	<?php $exercises_count = exercises_count();?>
                    <h2 class="text-white"><?=$exercises_count;?> <i class="ti-image float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Məşq Sayı</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success">
                <div class="card-body">
                	<?php $testimiones_count = testimiones_count();?>
                    <h2 class="text-white"><?=$testimiones_count;?> <i class="ti-user float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Şəhadətnamə Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-info">
                <div class="card-body">
                	<?php $social_media_count = social_media_count();?>
                    <h2 class="text-white"><?=$social_media_count;?> <i class="ti-sharethis float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Sosial Şəbəkə Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
            <div class="card-body">
            	<?php $zulal_count = zulal_count();?>
				<h2 class="text-white"><?=$zulal_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Zülal Protein Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning">
            <div class="card-body">
            	<?php $amin_tursulari_count = amin_tursulari_count();?>
				<h2 class="text-white"><?=$amin_tursulari_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Amin Turşu Protein Sayı</span></div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success">
            <div class="card-body">
            	<?php $yag_yandiranlar_count = yag_yandiranlar_count();?>
				<h2 class="text-white"><?=$yag_yandiranlar_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Yağ Yandıran Protein Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-info">
            <div class="card-body">
            	<?php $vitaminler_count = vitaminler_count();?>
				<h2 class="text-white"><?=$vitaminler_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Vitamin Protein Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
            <div class="card-body">
            	<?php $ceki_hecm_count = ceki_hecm_count();?>
				<h2 class="text-white"><?=$ceki_hecm_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Çəki və Həcm Protein Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning">
            <div class="card-body">
            	<?php $guc_enerji_count = guc_enerji_count();?>
				<h2 class="text-white"><?=$guc_enerji_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Güc Enerji Protein Sayı</span></div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success">
            <div class="card-body">
            	<?php $diger_mehsullar_count = diger_mehsullar_count();?>
				<h2 class="text-white"><?=$diger_mehsullar_count;?> <i class="ti-server float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Digər Məhsulların Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-info">
            <div class="card-body">
            	<?php $programs_count = programs_count();?>
				<h2 class="text-white"><?=$programs_count;?> <i class="ti-desktop float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Ümumi Proqram Sayı Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
            <div class="card-body">
            	<?php $gallery_count = gallery_count();?>
				<h2 class="text-white"><?=$gallery_count;?> <i class="ti-gallery float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Qalereyadakı Şəkil Sayı</span></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning">
            <div class="card-body">
            	<?php $triner_count = triner_count();?>
				<h2 class="text-white"><?=$triner_count;?> <i class="ti-user float-right"></i></h2>
				<div><span class="font-weight-bold text-white">Ümumi Triner Sayı</span></div>
            </div>
            </div>
        </div>
    </div>
</div>