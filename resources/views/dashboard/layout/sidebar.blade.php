<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{URL::asset('assets/images/logo-jood.png')}}" class="logo-icon" alt="logo icon" style="width:100%; height:100%;">
				</div>
				<!-- <div>
					<h4 class="logo-text">Rocker</h4>
				</div> -->
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					
					<a href="{{ url('/home') }}" class="">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Tableau de bord</div>
					</a>
					
					
				</li>
				
				<li class="menu-label">Gestion des annoces</li>
				
				<li>
					
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-customize'></i>
						</div>
						<div class="menu-title">Annonces</div>
					</a>
					
					<ul>
						<li> <a href="{{ url('/ajouterBiens')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter annonce</a>
						</li>
						<li> <a href="{{ url('/articles')}}"><i class="bx bx-right-arrow-alt"></i>Tous les annonces</a>
						</li>
						
					</ul>
				</li>


				<li class="menu-label">Nos clients</li>

				<li>
					
					<a href="{{ url('/client') }}" class="">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Clients</div>
					</a>
					
					
				</li>


				<li class="menu-label">Messages reçus</li>

				<li>
					
					<a href="{{ url('/contact') }}" class="">
						<div class="parent-icon"><i class='bx bx-comment-detail'></i>
						</div>
						<div class="menu-title">Contact</div>
					</a>
					
					
				</li>
				
				
				
			</ul>
			<!--end navigation-->
		</div>