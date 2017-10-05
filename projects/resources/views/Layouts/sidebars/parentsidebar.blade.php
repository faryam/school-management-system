 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{ route('parentdashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>HOME</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="{{ route('childrenstudents') }}">
                          <i class="fa fa-child"></i>
                          <span>CHILDREN</span>
                          
                      </a>
                                         
                  </li>   
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>CLASSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('childrenstudentsclasses') }}"><span>Children Classes</span></a></li>
                          <li><a class="" href="{{ route('childrenstudentsclassesattendence') }}">Classes Attendence</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-book"></i>
                          <span>COURSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('parentallcourses') }}">All Courses</a></li>
                          <li><a class="" href="{{ route('childrenstudentscourses') }}">Children Courses</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">                     
                      <a href="javascript:;" class="">
                          <i class="fa fa-group"></i>
                          <span>TEACHERS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('parentallteachers') }}">All Teachers</a></li>
                          <li><a class="" href="{{ route('childrenstudentsteachers') }}"><span>Children Teachers</span></a></li>
                      </ul>
                                         
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-clipboard"></i>
                          <span>EXAMS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{ route('childrenstudentsexams') }}">Children Exams</a></li>
                          <li><a class="" href="{{ route('childrenstudentsexamreults') }}"><span>Exams Result</span></a></li>
                      </ul>
                  </li>
                  <li>                     
                      <a class="" href="{{ route('childrenstudentsfees') }}">
                          <i class="fa fa-money"></i>
                          <span>CHILDREN FEE</span>
                          
                      </a>
                                         
                  </li>          
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->