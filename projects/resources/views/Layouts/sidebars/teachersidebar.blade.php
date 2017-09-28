 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{ route('teacherdashboard') }}">
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
                          <li><a class="" href="{{ route('teacherclasses') }}">All Classes</a></li>
                         
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_genius"></i>
                          <span>COURSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('teachercourses') }}">All Courses</a></li>
                          <li><a class="" href="{{ route('teachercoursesstudent') }}"><span>Courses Students</span></a></li>
                          <li><a class="" href="{{ route('teachercoursesexams') }}"><span>Courses Exams</span></a></li>
                          
                      </ul>
                  </li>      
                </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->