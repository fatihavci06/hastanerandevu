@extends('layouts.app')

@section('content')
<div id="app">
	<div class="container mb-2">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
		    <button class="nav-link active" id="onaybekleyen-tab" data-bs-toggle="tab" data-bs-target="#onaybekleyen" type="button" role="tab" aria-controls="onaybekleyen" aria-selected="true">Onay Bekleyen Randevular</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Bugün Randevular</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Gelecek Randevular</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Geçmiş Randevular</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="nav-link" id="iptal-tab" data-bs-toggle="tab" data-bs-target="#iptal" type="button" role="tab" aria-controls="iptal" aria-selected="false">İptal Olan Randevular</button>
		  </li>
		</ul>
	</div>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="onaybekleyen" role="tabpanel" aria-labelledby="onaybekleyen-tab">
	  		<adminbekleyenrandevu-component></adminbekleyenrandevu-component>
		</div>
	  	<div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
	  		<adminbugunrandevu-component></adminbugunrandevu-component>
		</div>
	  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  		<admingelecekrandevu-component></admingelecekrandevu-component>
	 	</div>
	  	<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
	  		<adminlastrandevu-component></adminlastrandevu-component>
		</div>
		<div class="tab-pane fade" id="iptal" role="tabpanel" aria-labelledby="iptal-tab">
	  		<adminiptalrandevu-component></adminiptalrandevu-component>
		</div>
	</div>
	


</div>
    

@endsection
