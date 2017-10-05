 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{ route('studentdashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>HOME</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>CLASSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('studentclasses') }}">Students Classes</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-book"></i>
                          <span>COURSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('studentcourses') }}">Student Courses</a></li>
                          <li><a class="" href="{{ route('studentteachers') }}"><span>Course Teachers</span></a></li>
                      </ul>
                  </li>                                               
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-clipboard"></i>
                          <span>EXAMS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="studentexams">Student Exams</a></li>
                      </ul>
                  </li>

                   <li>
                      <a class="" href="{{ route('studentattendence') }}">
                          <i class="fa fa-calendar"></i>
                          <span>ATTENDENCE</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="{{ route('studentresults') }}">
                          <i class="fa fa-list-alt"></i>
                          <span>RESULT</span>
                          
                      </a>
                                         
                  </li>

                  <li>                     
                      <a class="" href="{{ route('studentfee') }}">
                          <i class="fa fa-money"></i>
                          <span>FEE</span>
                          
                      </a>
                                         
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->