<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Library Mangement System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <!-- END META SECTION -->


<link rel="stylesheet" type="text/css" id="theme" href="{{ asset('admin/css/theme-blue.css') }}"/>

{{-- Toastr --}}
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

{{-- Blinker --}}
@include('includes.blinker')

<!-- EOF CSS INCLUDE -->
<style media="screen">
.no-borderd tr td{
    border: 0 solid !important;
}
</style>
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="{{ route('blog') }}">LMS</a>
                    <a href="/" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="" class="profile-mini">
                        <img src="{{ asset('uploads/avatar/'. Auth::user()->avatar) }}" alt="Lol"/>
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="{{ asset('uploads/avatar/'. Auth::user()->avatar) }}" alt="John Doe"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name">{{ Auth::user()->name }}</div>
                        </div>

                    </div>
                </li>
                <li class="xn-title">Navigation</li>
                <li >
                    <a href="{{ route('home') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>


                {{-- User Sidebar --}}
                @if (!Auth::user()->is_admin)
                    <li >
                        <a href="{{ route('user.bookList') }}"><span class="fa fa-book"></span> <span class="xn-text">Book List</span></a>
                    </li>
                    <li >
                        <a href="{{ route('user.issueBooks') }}"><span class="fa fa-thumb-tack"></span> <span class="xn-text">My Issued Books</span></a>
                    </li>
                    <li >
                        <a href="{{ route('user.issueBooksReturned') }}"><span class="fa fa-archive"></span> <span class="xn-text">My Returned Books</span></a>
                    </li>
                    <li >
                        <a href="{{ route('changPass') }}"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
                    </li>
                @endif



                {{-- Admin Sidebar --}}
                @if (Auth::user()->is_admin)
                    <li>
                        <a href="{{ route('users.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Users</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-book"></span> <span class="xn-text">Books</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('books.index') }}"><span class="fa fa-list-alt"></span> <span class="xn-text">Book List</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ route('books.create') }}"><span class="fa fa-plus"></span> <span class="xn-text">Add Books</span></a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="{{ route('category.index') }}"><span class="fa fa-tasks"></span> <span class="xn-text">Department</span></a>
                    </li>
                    <li >
                        <a href="{{ route('sub-category.index') }}"><span class="fa fa-tasks"></span> <span class="xn-text">Subject-wise List</span></a>
                    </li>
                    <li >
                        <a href="{{ route('shelves.index') }}"><span class="fa fa-database"></span> <span class="xn-text">Book Shelves</span></a>
                    </li>
                    <li >
                        <a href="{{ route('issue.index') }}"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Book Issued List</span></a>
                    </li>
                    <li >
                        <a href="{{ route('issue.returned') }}"><span class="fa fa-archive"></span> <span class="xn-text">Book Returned List</span></a>
                    </li>

                    {{-- Blog --}}
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-rss-square"></span> <span class="xn-text">Blog Management</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('notices.index') }}"><span class="fa fa-list-alt"></span> <span class="xn-text">Notices</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ route('policy.edit') }}"><span class="fa fa-bullhorn"></span> <span class="xn-text">Library Policy</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ route('staffs.index') }}"><span class="fa fa-user"></span> <span class="xn-text">Staff</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ route('contact.index') }}"><span class="fa fa-phone-square"></span> <span class="xn-text">Contact</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ route('about.edit') }}"><span class="fa fa-calendar"></span> <span class="xn-text">About</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="glyphicon glyphicon-import"></span> <span class="xn-text">Resources</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('recent.index') }}"><span class="fa fa-tags"></span> <span class="xn-text">Recent Addition</span></a>
                            </li>
                            <li>
                                <a href="{{ route('ebook.index') }}"><span class="fa fa-book"></span> <span class="xn-text">Ebook</span></a>
                            </li>
                        </ul>
                @endif



                {{-- <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
                    <ul>
                        <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li>
                        <li><a href="pages-profile.html"><span class="fa fa-user"></span> Profile</a></li>
                        <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Address Book</a></li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                            <ul>
                                <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                                <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                            <ul>
                                <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                                <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                                <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                            </ul>
                        </li>
                        <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>
                        <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>
                        <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>
                        <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>
                        <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>
                        <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-file"></span> Blog</a>

                            <ul>
                                <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>
                                <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-sign-in"></span> Login</a>
                            <ul>
                                <li><a href="pages-login.html">App Login</a></li>
                                <li><a href="pages-login-website.html">Website Login</a></li>
                                <li><a href="pages-login-website-light.html"> Website Login Light</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-warning"></span> Error Pages</a>
                            <ul>
                                <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>
                                <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>
                                <li><a href="pages-error-500.html"> Error 500</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Layouts</span></a>
                    <ul>
                        <li><a href="layout-boxed.html">Boxed</a></li>
                        <li><a href="layout-nav-toggled.html">Navigation Toggled</a></li>
                        <li><a href="layout-nav-top.html">Navigation Top</a></li>
                        <li><a href="layout-nav-right.html">Navigation Right</a></li>
                        <li><a href="layout-nav-top-fixed.html">Top Navigation Fixed</a></li>
                        <li><a href="layout-nav-custom.html">Custom Navigation</a></li>
                        <li><a href="layout-frame-left.html">Frame Left Column</a></li>
                        <li><a href="layout-frame-right.html">Frame Right Column</a></li>
                        <li><a href="layout-search-left.html">Search Left Side</a></li>
                        <li><a href="blank.html">Blank Page</a></li>
                    </ul>
                </li>
                <li class="xn-title">Components</li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">UI Kits</span></a>
                    <ul>
                        <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> Widgets</a></li>
                        <li><a href="ui-elements.html"><span class="fa fa-cogs"></span> Elements</a></li>
                        <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Buttons</a></li>
                        <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Panels</a></li>
                        <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Icons</a><div class="informer informer-warning">+679</div></li>
                        <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Typography</a></li>
                        <li><a href="ui-portlet.html"><span class="fa fa-th"></span> Portlet</a></li>
                        <li><a href="ui-sliders.html"><span class="fa fa-arrows-h"></span> Sliders</a></li>
                        <li><a href="ui-alerts-popups.html"><span class="fa fa-warning"></span> Alerts & Popups</a></li>
                        <li><a href="ui-lists.html"><span class="fa fa-list-ul"></span> Lists</a></li>
                        <li><a href="ui-tour.html"><span class="fa fa-random"></span> Tour</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Forms</span></a>
                    <ul>
                        <li>
                            <a href="form-layouts-two-column.html"><span class="fa fa-tasks"></span> Form Layouts</a>
                            <div class="informer informer-danger">New</div>
                            <ul>
                                <li><a href="form-layouts-one-column.html"><span class="fa fa-align-justify"></span> One Column</a></li>
                                <li><a href="form-layouts-two-column.html"><span class="fa fa-th-large"></span> Two Column</a></li>
                                <li><a href="form-layouts-tabbed.html"><span class="fa fa-table"></span> Tabbed</a></li>
                                <li><a href="form-layouts-separated.html"><span class="fa fa-th-list"></span> Separated Rows</a></li>
                            </ul>
                        </li>
                        <li><a href="form-elements.html"><span class="fa fa-file-text-o"></span> Elements</a></li>
                        <li><a href="form-validation.html"><span class="fa fa-list-alt"></span> Validation</a></li>
                        <li><a href="form-wizards.html"><span class="fa fa-arrow-right"></span> Wizards</a></li>
                        <li><a href="form-editors.html"><span class="fa fa-text-width"></span> WYSIWYG Editors</a></li>
                        <li><a href="form-file-handling.html"><span class="fa fa-floppy-o"></span> File Handling</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="tables.html"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
                    <ul>
                        <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> Basic</a></li>
                        <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> Data Tables</a></li>
                        <li><a href="table-export.html"><span class="fa fa-download"></span> Export Tables</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Charts</span></a>
                    <ul>
                        <li><a href="charts-morris.html"><span class="xn-text">Morris</span></a></li>
                        <li><a href="charts-nvd3.html"><span class="xn-text">NVD3</span></a></li>
                        <li><a href="charts-rickshaw.html"><span class="xn-text">Rickshaw</span></a></li>
                        <li><a href="charts-other.html"><span class="xn-text">Other</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#">Second Level</a>
                            <ul>
                                <li class="xn-openable">
                                    <a href="#">Third Level</a>
                                    <ul>
                                        <li class="xn-openable">
                                            <a href="#">Fourth Level</a>
                                            <ul>
                                                <li><a href="#">Fifth Leve</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>

                @if (Auth::user()->is_admin)
                    <li class="pull-right ">
                        <a href="{{ route('users.unapproved') }}"
                        {{-- style="padding: 5px;margin-top: 10px;border-radius: 6px; background-color:#007bff" --}}
                        class="fa fa-bell">
                        {{-- New User --}}
                        <span class="badge badge-success">
                            {{ $unapproved_users }}
                        </span>
                    </a>
                </li>
                @endif


            <!-- END TASKS -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->



        <!-- PAGE CONTENT WRAPPER -->
        <div style="padding-top: 10px" class="col-md-12">
            <div class="page-content-wrap">
                @yield('content')
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <form  action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}

                        <input class="btn btn-success btn-lg" type="submit" value="Yes">
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{ asset('admin/js/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/jquery/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='{{ asset('admin/js/plugins/icheck/icheck.min.js') }}'></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/plugins/morris/raphael-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/morris/morris.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/rickshaw/d3.v3.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/rickshaw/rickshaw.min.js') }}"></script>
<script type='text/javascript' src='{{ asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}'></script>
<script type='text/javascript' src='{{ asset('admin/js/plugins/bootstrap/bootstrap-datepicker.js') }}'></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/owl/owl.carousel.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>

{{-- Summernote Package --}}
<script type="text/javascript" src="{{ asset('admin/js/plugins/summernote/summernote.js') }}"></script>

<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{ asset('admin/js/settings.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/actions.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/demo_dashboard.js') }}"></script>
<!-- END TEMPLATE -->

{{-- Toastr --}}
<script src="{{ asset('js/toastr.min.js') }}"></script>
        <script>
            @if(Session::has('success'))

            toastr.success('{{ Session::get('success') }}')

            @endif

            @if(Session::has('info'))

            toastr.info('{{ Session::get('info') }}')

            @endif

            @if(Session::has('fail'))

            toastr.error('{{ Session::get('fail') }}')

            @endif

            @if(Session::has('warning'))

            toastr.warning('{{ Session::get('warning') }}')

            @endif

        </script>


@yield('js')
<!-- END SCRIPTS -->
</body>
</html>
