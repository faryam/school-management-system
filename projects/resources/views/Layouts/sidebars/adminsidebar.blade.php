 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{ route('dashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>HOME</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-child"></i>
                          <span>STUDENTS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('students') }}">All Students</a></li>
                          <li><a class="" href="{{ route('addstudent') }}"><span>Add Students</span></a></li>                         
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>CLASSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('classes') }}">All Classes</a></li>
                          <li><a class="" href="{{ route('addclass') }}"><span>Add Class</span></a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-book"></i>
                          <span>COURSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('courses') }}">All Courses</a></li>
                          <li><a class="" href="{{ route('addcourse') }}"><span>Add Course</span></a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">                     
                      <a href="javascript:;" class="">
                          <i class="fa fa-group"></i>
                          <span>TEACHERS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('teachers') }}">All Teachers</a></li>
                          <li><a class="" href="{{ route('addteacher') }}"><span>Add Teacher</span></a></li>
                      </ul>
                                         
                  </li>
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-user"></i>
                          <span>PARENTS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('parents') }}">All Parents</a></li>
                          <li><a class="" href="{{ route('addparent') }}"><span>Add Parent</span></a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-clipboard"></i>
                          <span>EXAMS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{ route('exams') }}">All Exams</a></li>
                          <li><a class="" href="{{ route('addexam') }}"><span>Add Exam</span></a></li>
                           <li><a class="" href="{{ route('examresults') }}"><span>Exam Results</span></a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-money"></i>
                          <span>FEES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('fees') }}">All Fees</a></li>
                          <li><a class="" href="{{ route('addfee') }}"><span>Add Fee</span></a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-usd"></i>
                          <span>FINANCES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('finances') }}">All Finances</a></li>
                          <li><a class="" href="{{ route('addfinance') }}"><span>Add Finance</span></a></li>
                      </ul>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-key"></i>
                          <span>ADMINS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{ route('admins') }}">All Admins</a></li>
                          <li><a class="" href="{{ route('addadmin') }}"><span>Add Admin</span></a></li>
                      </ul>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_genius"></i>
                          <span>REPORTS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{ route('financereport') }}">Finance Report</a></li>
                          <li><a class="" href="{{ route('webreport') }}"><span>Web Report</span></a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->