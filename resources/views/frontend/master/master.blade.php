@include('frontend\layouts\header')
@include('frontend\layouts\top-header')
@include('frontend\layouts\footer_section')
@include('frontend\layouts\footer')



@yield('header')
@yield('top-header')
@yield('home')
@yield('register')
@yield('login_user')
@yield('about')
@yield('contact')
@yield('user')
@yield('profile')
@yield('donor')
@yield('newDonor')
@yield('add_donor')
@yield('show_donor_user')
@yield('services')
@yield('edit-blood-user')
@yield('nearest_donor')
    {{--@yield('questionLogin')--}}
@yield('footer_section')

@yield('footer')
