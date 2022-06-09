<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Oct 2021 09:59:20 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{URL::asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{URL::asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{URL::asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{URL::asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
	<title>Espace admin.</title>
</head>

<body oncontextmenu ="return false;">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">

            <div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mt-5">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
                                    <div class="mb-2 text-center">
                                        <img src="{{URL::asset('assets/images/logo-jood.png')}}" class="logo-icon" alt="logo icon" style="width:70%;">
                                        </div>
									</div>

                                    <div class="login-separater text-center mb-4"> <span>ESPACE ADMIN</span>
										<hr/>
									</div>
									
									<div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Mot de passe</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" value="" placeholder="Mot de passe" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
												</div>
											</div>
											
											<div class="col-md-12 text-end">	<a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Connexion</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!-- end wrapper -->
    <!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>

<script>
    document.onkeydown=function(e)
    {
        if(event.KeyCode == 123)
        {
            return false;
        }

        if(e.ctrlKey && e.shiftKey && e.KeyCode == 'I'.charCodeAt(0))
        {
            return false;
        }

        if(e.ctrlKey && e.shiftKey && e.KeyCode == 'J'.charCodeAt(0))
        {
            return false;
        }

        if(e.ctrlKey && e.KeyCode == 'U'.charCodeAt(0))
        {
            return false;
        }
    }
</script>
</body>


<!-- Mirrored from codervent.com/rocker/demo/vertical/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Oct 2021 09:59:20 GMT -->
</html>