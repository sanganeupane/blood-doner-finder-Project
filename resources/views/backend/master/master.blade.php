@include('backend\layouts\header')
@include('backend\layouts\top-header')
@include('backend.layouts.sideBar')
@include('backend\layouts\footer')


@yield('header')
@yield('top-header')
@yield('sideBar')
@yield('content')
@yield('showBloodUser')
@yield('questionnaire')
@yield('showDonorAdmin')
{{--@yield('add-admin-user')--}}
{{--@yield('show-admin-users')--}}

{{--@yield('about')--}}
{{--@yield('contact')--}}
@yield('footer')
