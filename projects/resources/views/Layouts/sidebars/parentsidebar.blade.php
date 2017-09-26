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
                          <i class="icon_piechart"></i>
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
                          <li><a class="" href="#">Classes Attendence</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_genius"></i>
                          <span>COURSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="#">All Courses</a></li>
                          <li><a class="" href="#">Children Courses</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">                     
                      <a href="javascript:;" class="">
                          <i class="icon_piechart"></i>
                          <span>TEACHERS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="#">All Teachers</a></li>
                          <li><a class="" href="#"><span>Children Teachers</span></a></li>
                      </ul>
                                         
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>EXAMS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="#">Children Exams</a></li>
                          <li><a class="" href="#"><span>Exams Result</span></a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->