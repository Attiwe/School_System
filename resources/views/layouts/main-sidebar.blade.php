<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
	<div class="main-sidebar-header active">
		<a class="desktop-logo logo-light active" href="{{ url('/' . $page = 'index') }}"><img
				src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
		<a class="desktop-logo logo-dark active" href="{{ url('/' . $page = 'index') }}"><img
				src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
		<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page = 'index') }}"><img
				src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
		<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page = 'index') }}"><img
				src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
	</div>
	<div class="main-sidemenu">
		<div class="app-sidebar__user clearfix">
			<div class="dropdown user-pro-body">
				<div class="">
					<img alt="user-img" class="avatar avatar-xl brround"
						src="{{URL::asset('assets/img/faces/6.jpg')}}"><span
						class="avatar-status profile-status bg-green"></span>
				</div>
				<div class="user-info">
					<h4 class="font-weight-semibold mt-3 mb-0">Petey Cruiser</h4>
					<span class="mb-0 text-muted">Premium Member</span>
				</div>
			</div>
		</div>
		<ul class="side-menu">
			<li class="side-item side-item-category">Main</li>
			<li class="slide">
				<a class="side-menu__item" href="{{ route('dashboard') }}">
					<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
						<path
							d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
					</svg>
					<span class="side-menu__label">لوحه التحكم</span>
					<span class="badge badge-success side-badge">1</span>
				</a>

			</li>



			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
						<path
							d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
					</svg><span class="side-menu__label"> قائمه المراحل الدرسيه </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="{{route('page.index')}}"> المراحل الدرسيه</a></li>

				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3" />
						<path
							d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z" />
					</svg><span class="side-menu__label"> قائمه الصفوف الدوسيه</span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="{{ route('class.index')  }}">الصفوف الدرسيه</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0z" fill="none" />
						<path
							d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 10 6.5 10s1.5.67 1.5 1.5S7.33 13 6.5 13zm3-4C8.67 9 8 8.33 8 7.5S8.67 6 9.5 6s1.5.67 1.5 1.5S10.33 9 9.5 9zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 6 14.5 6s1.5.67 1.5 1.5S15.33 9 14.5 9zm4.5 2.5c0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5.67-1.5 1.5-1.5 1.5.67 1.5 1.5z"
							opacity=".3" />
						<path
							d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10c1.38 0 2.5-1.12 2.5-2.5 0-.61-.23-1.21-.64-1.67-.08-.09-.13-.21-.13-.33 0-.28.22-.5.5-.5H16c3.31 0 6-2.69 6-6 0-4.96-4.49-9-10-9zm4 13h-1.77c-1.38 0-2.5 1.12-2.5 2.5 0 .61.22 1.19.63 1.65.06.07.14.19.14.35 0 .28-.22.5-.5.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.14 8 7c0 2.21-1.79 4-4 4z" />
						<circle cx="6.5" cy="11.5" r="1.5" />
						<circle cx="9.5" cy="7.5" r="1.5" />
						<circle cx="14.5" cy="7.5" r="1.5" />
						<circle cx="17.5" cy="11.5" r="1.5" />
					</svg><span class="side-menu__label"> الاقسام</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href=" {{route('section.index')}}"> قائمة الاقسام
							الدرسيه</a></li>

				</ul>
			</li>

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
						<path
							d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
					</svg><span class="side-menu__label">الطلاب</span><i class="angle fe fe-chevron-down"></i></a>


				<ul class="slide-menu">


					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
							xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">


						</svg><span class="side-menu__label"> <i
								class="fa-solid fa-graduation-cap font-weight-bold text-danger	 "> الطلاب </i> </span>
					</a>
					<li><a class="slide-item text-secondary " href="{{ route('student.show') }}"> قائمة
							الطلاب </a></li>
					<li><a class="slide-item text-secondary " href="{{ route('student.index') }}"> اضاقه
							الطلاب</a></li>


				</ul>

				<ul class="slide-menu">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
							xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						</svg><span class="side-menu__label"> <i class="fa-solid fa-school text-danger "> ترقيه الطلاب
							</i> </span>
					</a>

					<li><a class="slide-item  " href="{{route('promotion.index')}}"> ترقيه الطلاب</a></li>
					<li><a class="slide-item  " href="{{route('promotion.create')}}"> اداره ترقيه
							الطلاب</a></li>
				</ul>
				<ul class="slide-menu">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
							xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						</svg><span class="side-menu__label"> <i class="fa-solid fa-user-graduate text-danger "> الطلاب
								الخرجين </i>
						</span> </a>

					<li><a class="slide-item text-secondary " href="{{route('graduate.index')}}"> الطلاب
							الخرجين </a></li>
					<li><a class="slide-item text-secondary " href="{{route('graduate.create')}}"> قائمة
							الطلاب الخرجين </a></li>

				</ul>

			</li>


			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3" />
						<path
							d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
					</svg><span class="side-menu__label"> المعلمين </span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a wire:nevigate class="slide-item" href="{{ route('teacher.index') }}"> قائمة الدكاتره </a>
					</li>
					<li><a wire:nevigate class="slide-item" href="{{  route('appointments.index') }}"> قائمة المعدين
						</a></li>

				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M5 5h15v3H5zm12 5h3v9h-3zm-7 0h5v9h-5zm-5 0h3v9H5z" opacity=".3" />
						<path
							d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM8 19H5v-9h3v9zm7 0h-5v-9h5v9zm5 0h-3v-9h3v9zm0-11H5V5h15v3z" />
					</svg><span class="side-menu__label"> اولياء الامور </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="{{route('parent_show.index')}}"> اولياء الامور </a>
					</li>
					<li>
						<a class="slide-item" href="{{ route('parent.index') }}">قائمه ولي الأمر</a>
					</li>

				</ul>
			</li>

			<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon text-dark" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect>
            <path stroke="#00008B" d="M12 12h.01"></path>
            <path stroke="#00008B" d="M17 12h.01"></path>
            <path stroke="#00008B" d="M7 12h.01"></path>
        </svg>
        <span class="side-menu__label"> الحسابات </span>
        <i class="angle fe fe-chevron-down"></i>
    </a>
    <ul class="slide-menu">
        <li><a class="slide-item" href="{{route('fees.index') }}"> الرسوم الدراسية </a></li>
        <li><a class="slide-item" href="{{route('feesInvoice.index')}}"> الفواتير </a></li>
        <li><a class="slide-item" href="{{route('receipt.index')}}"> سندات قبض الطالب</a></li>
        <li><a class="slide-item" href="{{route('paymentStudnet.index')}}"> سندات صرف </a></li>
        <li><a class="slide-item" href="{{route('processfees.index')}}"> استبعاد رسوم </a></li>
    </ul>
</li>





			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
					<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="30" height="30"
						viewBox="1 1 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<path class="text-primary" d="M5 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0z"></path>
						<path class="text-primary" d="M19 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
						<path class="text-primary" d="M3 21v-2a4 4 0 0 1 4-4h3"></path>
						<path class="text-primary" d="M16 15h3a4 4 0 0 1 4 4v2"></path>
						<path class="text-primary" d="M16 19l2 2 4-4"></path>
					</svg>
					<span class="side-menu__label">الحضور والغياب</span>
					<i class="angle fe fe-chevron-down"></i>
				</a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="{{ route('attendence.index') }}"> الحضور والغياب للطلاب </a></li>
					<li><a class="slide-item" href="{{ route('attendence.showAttendenceStudent') }}"> قائمة الحضور
							والغياب للطلاب </a></li>
				</ul>
			</li>

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3" />
						<path
							d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
					</svg><span class="side-menu__label"> المواد الدراسية </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="{{  route('subjectStudent.index')}}"> قائمة المواد الدراسية </a>
					</li>

				</ul>
			</li>
			<li class="slide ">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path
							d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z"
							opacity=".3" />
						<path
							d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z" />
					</svg><span class="side-menu__label"> الاختبارات </span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href=" {{route('quizze.index')}} "> قائمة الاختبارات </a></li>
					<li><a class="slide-item" href=" {{route('question.index')}} "> قائمة الاسئله </a></li>

					<li><a class="slide-item" href=" {{route('exams.index')}} "> test </a></li>
				</ul>
			</li>

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
					<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
						viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<circle cx="12" cy="12" r="10"></circle>
						<polygon class="text-info" points="10 8 16 12 10 16 10 8"></polygon>
					</svg>
					<span class="side-menu__label">حصص اونلاين</span>
					<i class="angle fe fe-chevron-down"></i>
				</a>
				<ul class="slide-menu">
					<li><a class="slide-item " href="{{ route('onlineClasses.index') }}"> دروس اونلاين </a></li>
					<li><a class="slide-item" href="#"> اتصال مباشر مع زوم </a></li>
				</ul>
			</li>


			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
					<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
						viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<path class="text-success"
							d="M3 4c0-1.1.9-2 2-2h6a2 2 0 0 1 2 2v16a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2V4z"></path>
						<path class="text-success"
							d="M21 4c0-1.1-.9-2-2-2h-6a2 2 0 0 0-2 2v16a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2V4z"></path>
					</svg>
					<span class="side-menu__label">المكتبة</span>
					<i class="angle fe fe-chevron-down"></i>
				</a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="{{ route('library.index') }}"> قائمة الكتب </a></li>
				</ul>
			</li>

			<li class="slide ">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path
							d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z"
							opacity=".3" />
						<path
							d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
					</svg><span class="side-menu__label"> الاعدادات </span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href=" {{ route('setting.index') }} "> الاعدادات</a></li>

				</ul>
			</li>

		</ul>
	</div>
</aside>
<!-- main-sidebar -->